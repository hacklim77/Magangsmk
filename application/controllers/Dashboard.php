<?php
	
	class Dashboard extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('Siswamodel');
			$this->load->model('Jobmodel');
			$this->load->model('Adminmodel');
			
			if (!$this->session->userdata('username')) {
				redirect('admin');
			}
		}

		public function index(){

			if($this->session->userdata('akses') == 1){

				$data['judul'] = 'Admin | Dashboard';
				$data['subjudul'] = 'Dashboard';			
				$data['admin'] = $this->db->get_where('adminsuper',['username' => $this->session->userdata('username')])->row_array();
				$data['jumlahsiswa'] = $this->Siswamodel->jumlahsiswa();
				$data['countpostjob'] = $this->Jobmodel->countPostjob();
				$this->load->view('admin/templates/header',$data);
				$this->load->view('admin/templates/menu',$data);
				$this->load->view('admin/dashboard/index',$data);
				$this->load->view('admin/templates/footer');	
			} 
			elseif ($this->session->userdata('akses') == 2) 
			{
				$data['judul'] = 'Admin | Dashboard';
				$data['subjudul'] = 'Dashboard';			
				$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();
				$data['jumlahsiswa'] = $this->Siswamodel->jumlahsiswa();
				$data['countpostjob'] = $this->Jobmodel->countPostjob();
				$this->load->view('admin/templates/header',$data);
				$this->load->view('admin/templates/menu',$data);
				$this->load->view('admin/dashboard/index',$data);
				$this->load->view('admin/templates/footer');
			}
	}
}	