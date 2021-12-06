<?php

    class Admin extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->model('Adminmodel');
            $this->load->library('form_validation');
            
        }
 
        public function index(){
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password1','Password','required');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Admin Login | MagangSMK';

                $this->load->view('admin/templates/login-style',$data);
                
            }
                else{
                $this->_islogin();    
            }              
        }

        private function _islogin(){
            $username = $this->input->post('username');
            $password = $this->input->post('password1');
            
            $adminsuper = $this->db->get_where('adminsuper',['username' => $username])->row_array();
            $admin = $this->db->get_where('admin',['username' => $username])->row_array();

            if ($adminsuper OR $admin) {
                if ($adminsuper OR $admin ['aktif'] == 1) {
                    if (password_verify($password, $adminsuper['password'])) {
                        $adminsuper = [
                            'username' => $adminsuper['username'],
                            'akses' => $adminsuper['akses']
                        ];
                        $this->session->set_userdata($adminsuper);
                        redirect('dashboard');
                    }if (password_verify($password, $admin['password'])) {
                        $admin = [
                            'username' => $admin['username'],
                            'akses' => $admin['akses']
                        ];
                        $this->session->set_userdata($admin);
                        redirect('dashboard');
                    }
                     else{
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Password tidak sesuai!
                        </div>');
                        redirect('admin');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Username tidak terdaftar!
                    </div>');
                    redirect('admin');
                } 
            }  
       }

       public function logout()
        {
            $this->session->sess_destroy();
            redirect('admin');
        }

       public function listadmin()
       {
            if ($this->session->userdata('akses') == 1) {

                $data['judul'] = 'Admin | List Admin';
                $data['subjudul'] = 'Daftar Admin';
                $data['listadmin'] = $this->Adminmodel->getallAdmin();
                //$data['admin'] = $this->db->get_where('adminsuper',['username' => $this->session->userdata('username')])->row_array();
                $data['admin'] = $this->db->get_where('adminsuper',['username' => $this->session->userdata('username')])->row_array();    
                $this->load->view('admin/templates/header',$data);
                $this->load->view('admin/templates/menu',$data);
                $this->load->view('admin/daftaradmin/index',$data);
                $this->load->view('admin/templates/footer');  
            }
            elseif ($this->session->userdata('akses') == 2) {
                $data['judul'] = 'Admin | List Admin';
                $data['subjudul'] = 'Daftar Admin';
                $data['listadmin'] = $this->Adminmodel->getallAdmin();
                //$data['admin'] = $this->db->get_where('adminsuper',['username' => $this->session->userdata('username')])->row_array();
                $data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();    
                $this->load->view('admin/templates/header',$data);
                $this->load->view('admin/templates/menu',$data);
                $this->load->view('admin/daftaradmin/index',$data);
                $this->load->view('admin/templates/footer');
            }
            
        }

        public function tambadmins()
       {
        if ($this->session->userdata('akses') <= 2) {

            if ($this->input->post('tambAdmins') === FALSE) {

                $data['judul'] = 'Admin | List Admin';
                $data['subjudul'] = 'Daftar Admin';
                /* if($this->session->userdata('akses') == 1){
                    $data['admin'] = $this->db->get_where('adminsuper',['username' => $this->session->userdata('username')])->row_array();
                } elseif ($this->session->userdata('akses') == 2) {
                    $data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();
                } */
                $this->load->view('admin/templates/header',$data);
                $this->load->view('admin/templates/menu',$data);
                $this->load->view('admin/daftaradmin/index',$data);
                $this->load->view('admin/templates/footer');  
            } else {
                $this->Adminmodel->tambadmins();
                redirect('admin/listadmin');
            }
        }    
            
        }

        public function tambadmin()
       {
                
            if ($this->input->post('tambAdmin') === FALSE) {

                $data['judul'] = 'Admin | List Admin';
                $data['subjudul'] = 'Daftar Admin';
                
                $this->load->view('admin/templates/header',$data);
                $this->load->view('admin/templates/menu',$data);
                $this->load->view('admin/daftaradmin/index',$data);
                $this->load->view('admin/templates/footer');  
            } else {
                $this->Adminmodel->tambadmin();
                redirect('admin/listadmin');
            }
            
        }
}