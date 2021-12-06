<?php

    class Siswa extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Siswamodel');
            $this->load->library('form_validation','encrypt');
            $this->load->helper('url');
    
            if (!$this->session->userdata('email')) {
				redirect('auth');
            }    
        }
        
        public function profil($id = null)
        {
        if($this->session->userdata('akses') == 3){
            
                $data['judul'] = 'Profil | Magang SMK';
                $data['subjudul'] = 'Profil Siswa';
                $data['siswa'] = $this->db->get_where('siswa',['email' => $this->session->userdata('email')])->row_array();
                $data['profilsiswa'] = $this->Siswamodel->getProfilSiswaById($id);
                $data['portfolio']= $this->Siswamodel->getportbyid($id);
                $this->load->view('murid/templates/header',$data);
                $this->load->view('murid/templates/menu',$data); 
                $this->load->view('murid/profil/index',$data);
                $this->load->view('murid/templates/footer',$data);            
            }
            else{

				$data['title'] = 'Access Forbidden!';
				$this->load->view('errors/403',$data);
			}    
        }
        

        public function editprofil($id = null){
    
        if($this->session->userdata('akses') == 3){
        
            $this->form_validation->set_rules('nis','NIS','required');
            /*$this->form_validation->set_rules('fullname','Nama Lengkap','required');
            $this->form_validation->set_rules('sekolah','Sekolah','required');
            $this->form_validation->set_rules('jurusan','Jurusan','required');
            $this->form_validation->set_rules('telepon','Telepon','required');
            $this->form_validation->set_rules('alamat_rumah','Alamat Rumah','required');
            $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');*/
            $data['judul'] = 'Edit Profil | Magang SMK';
            $data['subjudul'] = 'Profil Siswa';
            $data['popheader'] = 'Edit Profil Siswa';
            $data['siswa'] = $this->db->get_where('siswa',['email' => $this->session->userdata('email')])->row_array();
            $data['profilsiswa'] = $this->Siswamodel->getProfilSiswaById($id);
            $data['jurusan'] =  ['Multimedia','Desain Komunikasi Visual (DKV)','Teknik Komputer dan Jaringan (TKJ)','Animasi','Seni Rupa','Tekstil','Kriya Logam','Kriya Kayu','Tata Busana'];
            
            if ($this->form_validation->run('editprofil') === FALSE) {
                //echo '<script>alert(' . validation_errors() . ')</script>';
                $this->load->view('murid/templates/header',$data);
                $this->load->view('murid/templates/menu',$data);
                $this->load->view('murid/profil/editprofil',$data);
                $this->load->view('murid/templates/footer',$data);            
            } else {
                $siswa = [
                'username' => htmlspecialchars($this->input->post('username',true))
	            ];

	            $profil_siswa = [
	                'fullname' => htmlspecialchars($this->input->post('fullname',true)),
	                'nis' => htmlspecialchars($this->input->post('nis',true)),
	                'sekolah' => htmlspecialchars($this->input->post('sekolah',true)),
	                'jurusan' => htmlspecialchars($this->input->post('jurusan',true)),
	                'telepon' => htmlspecialchars($this->input->post('telepon',true)),
	                'alamat_rumah' => htmlspecialchars($this->input->post('alamat_rumah',true)),
	                'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir',true)),
                    'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin',true)),
                    'kemampuan' => htmlspecialchars($this->input->post('kemampuan',true))
	            ];

	           //$where = array('id_siswa' => $this->input->get('id_siswa') );

	           
	           $this->db->where('id_siswa', $this->input->post('id_siswa'));
	           $this->db->update('siswa',$siswa);
	           $this->db->where('id_siswa', $this->input->post('id_siswa'));
	           $this->db->update('profil_siswa',$profil_siswa);
	             
	            //$this->db->trans_complete();
				
                $this->session->set_flashdata('flash','<div class="alert alert-success" role="alert">Data <strong>Berhasil Diubah!</strong></div>');
                
                $url = base_url()."siswa/profil/".$this->session->userdata('id_siswa');
                //redirect("siswa/profil/".$this->session->userdata('id_siswa'),"refresh");
                redirect($url);
 
                }
            }
            else{
				$data['title'] = 'Access Forbidden!';
				$this->load->view('errors/403',$data);
			}    
        }

        public function editfoto($id = null)
        {
            if ($this->session->userdata('akses') == 3) {
                
                $data['judul'] = 'Profil | Magang SMK';
                $data['subjudul'] = 'Profil Siswa';
                $data['siswa'] = $this->db->get_where('siswa',['email' => $this->session->userdata('email')])->row_array();
                $data['profilsiswa'] = $this->Siswamodel->getProfilSiswaById($id);

                if ($this->input->post('editfoto') === FALSE) {
                    //echo '<script>alert(' . validation_errors() . ')</script>';
                    
                    $this->load->view('murid/templates/header',$data);
                    $this->load->view('murid/templates/menu',$data); 
                    $this->load->view('murid/profil/index',$data);
                    $this->load->view('murid/templates/footer',$data);    
                } else{
                    $email = $this->input->post('email');

                    $upload_image = $_FILES['image_profil']['name'];
                    
                    if ($upload_image) {
                        $config['allowed_types']        = 'gif|jpg|png';
                        $config['max_size']             = '2048';
                        $config['upload_path']          = './images/murid/profil/';

                        $this->load->library('upload', $config);

                        if ($this->upload->do_upload('image_profil')) {

                            $old_image = $data['siswa']['image_profil'];

                            if ($old_image != 'default.jpg') {
                                unlink(FCPATH.'images/murid/profil/'.$old_image);
                            }
                            
                            $new_image = $this->upload->data('file_name');
                            $this->db->set('image_profil',$new_image);
 
                        } else{
                            echo $this->upload->display_errors();
                        }
                    }

                    $this->db->where('email',$email);
                    $this->db->update('siswa');
                    $this->session->set_flashdata('foto','<div class="alert alert-success" role="alert">Foto <strong>Berhasil Diubah!</strong></div>');
                    $url = base_url()."siswa/profil/".$this->session->userdata('id_siswa');
                    redirect($url);

                }
            }     
        }

        public function insertPort()
        {
            if ($this->session->userdata('akses') == 3) {
                
                $data['judul'] = 'Profil | Magang SMK';
                $data['subjudul'] = 'Profil Siswa';
                $data['siswa'] = $this->db->get_where('siswa',['email' => $this->session->userdata('email')])->row_array();
                $data['portfolio']= $this->db->get_where('port',array('id_siswa' == $this->session->userdata('id_siswa') ))->row_array();

                if ($this->input->post('insertPort') === false) {
                    $this->load->view('murid/templates/header',$data);
                    $this->load->view('murid/templates/menu',$data); 
                    $this->load->view('murid/profil/index',$data);
                    $this->load->view('murid/templates/footer',$data);
                } else{
                
                date_default_timezone_set("ASIA/JAKARTA");    
                
                $data = [
                    "id_siswa" => $this->input->post('id_siswa'),
                    "tanggal" => date('d-M-Y H:i:s')
                ];
                
                $upload_file = $_FILES['berkas']['name'];
                    
                if ($upload_file) {
                    $config['allowed_types']        = 'jpg|png|pdf|word';
                    $config['max_size']             = '2048';
                    $config['upload_path']          = './images/murid/portfolio/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('berkas')) {
                        
                        $new_file = $this->upload->data('file_name');
                        $this->db->set('berkas',$new_file);

                    } else{
                        echo $this->upload->display_errors();
                    }
                }
                
                $this->db->insert('port',$data);
                $url = base_url()."siswa/profil/".$this->session->userdata('id_siswa');
                redirect($url);
                //redirect('siswa/profil');    
                }
            }
        }

        public function detailpro()
        {
            //$email = $this->db->get_where('siswa',['email' => $this->session->userdata('email')])->row_array();
            //$data = $this->db->query("SELECT * from email = $email")->result();
            $siswa = $this->db->get_where('siswa',['email' => $this->session->userdata('email')])->row_array();
            $profil = $this->Siswamodel->getProfilSiswaById($siswa == $this->session->userdata('email'));

            foreach ($profil as $p) {
                echo $p['email']."<br>";
                echo $p['jurusan'];
            }
        
        }

        
    }