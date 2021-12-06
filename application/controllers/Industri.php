<?php
	
	class Industri extends CI_Controller{
		
		public function __construct()
        {
            parent::__construct();
            $this->load->model('Industrimodel');
            $this->load->library('form_validation');
            
            if (!$this->session->userdata('email')) {
				redirect('auth');
            }    
        }

		
		public function index(){

		if ($this->session->userdata('akses') == 4) {
			
			$data['judul'] = 'Admin || Dashboard Magang SMK';
			$this->load->view('admin/templates/header',$data);
			$this->load->view('admin/templates/menu');
			$this->load->view('admin/industri/index');
			$this->load->view('admin/templates/footer');
			}
			else {
				$data['title'] = 'Access Forbidden!';
				$this->load->view('errors/403',$data);
			}	
		}

		public function Profil()
		{
			if ($this->session->userdata('akses') == 4) {
				$data['judul'] = 'Admin || Dashboard Magang SMK';
				$this->load->view('admin/templates/header',$data);
				$this->load->view('admin/templates/menu');
				$this->load->view('admin/industri/index');
				$this->load->view('admin/templates/footer');				
			}
		}

	}