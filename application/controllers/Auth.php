<?php

    class Auth extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Siswamodel');
            $this->load->model('Industrimodel');
            $this->load->library('form_validation');   
        }
        
        public function index(){

            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('password1','Password','required');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Login | MagangSMK';

                $this->load->view('auth/templates/auth-header',$data);
                $this->load->view('auth/login');
                $this->load->view('auth/templates/auth-footer');
            }
                else{
                $this->_islogin();    
            }              
        }

        private function _islogin(){
            
            $email = $this->input->post('email');
            $password = $this->input->post('password1');
            
            $siswa = $this->db->get_where('siswa',['email' => $email])->row_array();
            $industri = $this->db->get_where('industri',['email' => $email])->row_array();

            if($siswa['aktif'] == 1){
                if (password_verify($password, $siswa['password'])) {
                   $data = [
                        'email' => $siswa['email'],
                        'akses' => $siswa['akses']
                    ];
                    $this->session->set_userdata($siswa,$data);
                    redirect('home');
                } else{
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password tidak sesuai!
                    </div>');
                    redirect('auth');
                } 
            }
            else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Email belum divalidasi!
                    </div>');
                    redirect('auth');
            }

            if($industri['aktif'] == 1){
                if (password_verify($password, $industri['password'])) {
                   $data = [
                        'email' => $industri['email'],
                        'akses' => $industri['akses']
                    ];
                    $this->session->set_userdata($industri,$data);
                    redirect('home');
                } else{
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password tidak sesuai!
                    </div>');
                    redirect('auth');
                } 
            }
            else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Email belum divalidasi!
                    </div>');
                    redirect('auth');
            }  
        }
 
        public function logout()
        {
            $this->session->sess_destroy();
            redirect('auth');
        }

        public function daftar(){

            $data['title'] = 'Daftar | MagangSMK';

            $this->load->view('auth/templates/auth-header',$data);
            $this->load->view('auth/daftar');
            $this->load->view('auth/templates/auth-footer');    

        }

        public function daftarsiswa(){

            $this->form_validation->set_rules('username','Username','trim|required');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[siswa.email]',
            ['valid_email' => 'input bukan merupakan email',
             'is_unique' => 'email sudah terdaftar'    
            ]);
            $this->form_validation->set_rules('password1','Password','trim|required|min_length[3]|matches[password2]',
            ['min_length' => 'password terlalu pendek']);
            $this->form_validation->set_rules('password2','Password','trim|required|matches[password1]');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Daftar Siswa | MagangSMK';
                $this->load->view('auth/templates/auth-header',$data);
                $this->load->view('auth/siswa/daftar-siswa');
                $this->load->view('auth/templates/auth-footer');    
            } else{
                date_default_timezone_set("ASIA/BANGKOK");

                $email = $this->input->post('email',true);

                $siswa=['username' => htmlspecialchars($this->input->post('username',true)),
                    'email' => htmlspecialchars($email),
                    'password' => password_hash ($this->input->post('password1'), PASSWORD_DEFAULT),
                    'image_profil' => 'default.png',
                    'akses' => 3,
                    'aktif' => 0,
                    'tgl_daftar' => date('Y-m-d H:i:s')
                ];
                
                //$this->db->set("id_siswa",'UUID()',false);
                $this->db->insert('siswa',$siswa);
                
                $last_id = $this->db->insert_id();

                $profil = [
                    "id_siswa" => $last_id,
                ];
                $this->db->insert('profil_siswa',$profil);
                
                $portfolio = [
                    "id_siswa" => $last_id,
                ];
                $this->db->insert('port',$portfolio);
                
                $token = base64_encode(random_bytes(32));
                $siswa_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('siswa_token',$siswa_token);
                //$this->Siswamodel->daftarsiswa();

                $this->_sendEmail($token,'verify');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Silahkan validasi emailmu dan aktifkan akunmu!
                </div>');
                redirect('auth');
            }
            
        }
        
        public function daftarindustri(){

            $this->form_validation->set_rules('email','Email','trim|required|valid_email',
            ['valid_email' => 'bukan merupakan email']);
            $this->form_validation->set_rules('password1','Password','trim|required|min_length[3]|matches[password2]',
            ['min_length' => 'password terlalu pendek']);
            $this->form_validation->set_rules('password2','Password','trim|required|matches[password1]');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Daftar Industri | MagangSMK';

                $this->load->view('auth/templates/auth-header',$data);
                $this->load->view('auth/industri/daftar-industri');
                $this->load->view('auth/templates/auth-footer');    
            }
            else {
                $this->Industrimodel->daftarindustri();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Selamat! Akunmu sudah terdaftar dan tervalidasi. Silahkan Login!
                </div>');
                redirect('auth');
            }    

        }

        private function _sendEmail($token,$type)
        {
            $config = [
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'pinteerindo@gmail.com',
                'smtp_pass' => 'akunpintar',
                'smtp_port' => 465,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n"
            ];

            $this->load->library('email',$config);
            $this->email->initialize($config); 

            $this->email->from('pinteerindo@gmail.com');
            $this->email->to($this->input->post('email'));

            if($type == 'verify'){

                $this->email->subject('Account Verification');
                $this->email->message('Click this link activate your account: <a href="'.base_url().'auth/verify?email='.$this->input->post('email').'&token='.urlencode($token). '">Activate</a>');
            }

            if ($this->email->send()) {
                return true;
            } else{
                echo $this->email->print_debugger();
                die;
            }
            

        }

        public function verify()
        {
            $email = $this->input->get('email');
            $token = $this->input->get('token');

            $siswa = $this->db->get_where('siswa',['email' => $email])->row_array();

            if($siswa){
                $siswa_token = $this->db->get_where('siswa_token',['token' => $token])->row_array();

                if ($siswa_token) {
                    if (time() - $siswa_token['date_created'] < (60*60*24)) {
                        
                        $this->db->set('aktif',1);
                        $this->db->where('email',$email);
                        $this->db->update('siswa');

                        $this->db->delete('siswa_token',['email'=>$email]);

                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Selamat! '.$email.' sudah tervalidasi dan aktif. Silahkan Login!
                        </div>');
                        redirect('auth');

                    } else{

                        $this->db->delete('siswa',['email'=>$email]);
                        $this->db->delete('siswa_token',['token'=>$token]);

                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Akun tidak tervalidasi. Token sudah expired!
                        </div>');
                        redirect('auth');    
                    }
                    
                } else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Akun tidak tervalidasi. Token tidak benar!
                    </div>');
                    redirect('auth');    
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Akun tidak tervalidasi. Email Salah!
                </div>');
                redirect('auth');    
            }
        }

    }