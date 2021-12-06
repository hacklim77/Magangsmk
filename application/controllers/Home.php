<?php
	
	class Home extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('Jobmodel');
			$this->load->model('Workshopmodel');
			$this->load->model('Siswamodel');
			$this->load->model('Industrimodel');
			//$this->load->helper('magangsmk');

			if (!$this->session->userdata('email')) {
				redirect('auth');
			}

		}

		public function Index(){
			if($this->session->userdata('akses') == 3){
				$data['judul'] = 'Beranda | Magang SMK';
				$data['siswa'] = $this->db->get_where('siswa',['email' => $this->session->userdata('email')])->row_array();
				$data['postjob'] = $this->Jobmodel->lowonganList(3,0);
				$data['workshop'] = $this->Workshopmodel->workshopList(3,0);
				$this->load->view('murid/templates/header',$data);
				$this->load->view('murid/templates/menu',$data);
				$this->load->view('murid/home/index',$data);
				$this->load->view('murid/templates/footer');
			} elseif ($this->session->userdata('akses') == 4) {
				$data['judul'] = 'Beranda | Magang SMK';
				$data['industri'] = $this->db->get_where('industri',['email' => $this->session->userdata('email')])->row_array();
				$data['postjob'] = $this->Jobmodel->lowonganList(3,0);
				$data['workshop'] = $this->Workshopmodel->workshopList(3,0); 
				$this->load->view('industri/templates/header',$data);
				$this->load->view('industri/templates/menu',$data);
				$this->load->view('industri/home/index',$data);
				$this->load->view('industri/templates/footer');			
			} else{
				$data['title'] = 'Access Forbidden!';
				$this->load->view('errors/403',$data);
			}
		}
}