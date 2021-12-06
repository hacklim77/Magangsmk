<?php
	
	class Workshop extends CI_Controller{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Workshopmodel');
			$this->load->model('Siswamodel');
			$this->load->library('form_validation');

			if (!$this->session->userdata('email')) {
				redirect('auth');
            }
		}

		public function index(){

			if ($this->session->userdata('akses') <= 2) {
				
				$data['judul'] = 'Admin | Workshop Magang SMK';
				$data['subjudul'] = 'Workshop';
				$data['workshop'] = $this->Workshopmodel->getAllworkshop();
				if ($this->session->userdata('akses') == 1) {
					$data['admin'] = $this->db->get_where('adminsuper',['username' => $this->session->userdata('username')])->row_array();
				} elseif ($this->session->userdata('akses') == 2) {
					$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();
				}
				$this->load->view('admin/templates/header',$data);
				$this->load->view('admin/templates/menu');
				$this->load->view('admin/workshop/index',$data);
				$this->load->view('admin/templates/footer');
			}
			
		}

		public function workshoplist(){

		if ($this->session->userdata('akses') == 3) {
			
			$data['judul'] = 'Workshop | Magang SMK';			
			$data['workshop'] = $this->Workshopmodel->getAllworkshop();
			$data['siswa'] = $this->db->get_where('siswa',['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('murid/templates/header',$data);
			$this->load->view('murid/templates/menu',$data);
			$this->load->view('murid/workshop/index',$data);
			$this->load->view('murid/templates/footer');
			}
		}

	
		public function tambah(){

			$this->form_validation->set_rules('nama_workshop','Nama Workshop','required');
			$this->form_validation->set_rules('penyelenggara','Penyelenggara','required');			
			$this->form_validation->set_rules('deskripsi','Deskripsi','required');
			$this->form_validation->set_rules('tanggal','Tanggal','required');

			if($this->form_validation->run()== FALSE){
				$data['judul'] = 'Admin || Workshop Magang SMK';
				$data['subjudul'] = 'Workshop';
				$this->load->view('admin/templates/header',$data);
				$this->load->view('admin/templates/menu');
				$this->load->view('admin/workshop/tambah',$data);
				$this->load->view('admin/templates/footer');	
			} else{

				$this->Workshopmodel->tambahWorkshop();
				$this->session->set_flashdata('flash','<div class="alert alert-success" role="alert">Data <strong>Berhasil Ditambahkan!</strong></div>');
						redirect('workshop');
		}

	}

		public function hapus($id){
			
			$workshop = new Workshopmodel;
				if ($workshop->checkWorkshopImage($id)) {
					$data = $workshop->checkWorkshopImage($id);
					//$data->gambar;
					$file = realpath('./images/Workshop/'.$data->image);
					if (file_exists($file)) {
						unlink($file);
					}
					$workshop->hapusWorkshop($id);
					$this->session->set_flashdata('flash','<div class="alert alert-danger" role="alert">Data <strong>Berhasil Dihapus!</strong></div>');
					redirect('workshop');				
				}
		}

		public function ubah($id=null){

			$this->form_validation->set_rules('nama_workshop','Nama Workshop','required');
			$this->form_validation->set_rules('penyelenggara','Penyelenggara','required');			
			$this->form_validation->set_rules('deskripsi','Deskripsi','required');
			$this->form_validation->set_rules('tanggal','Tanggal','required');

			if($this->form_validation->run()== FALSE){
				
				$data['judul'] = 'Admin || Workshop Magang SMK';
				$data['subjudul'] = 'Workshop';			
				$data['workshop'] = $this->Workshopmodel->getWorkshopById($id);
				$this->load->view('admin/templates/header',$data);
				$this->load->view('admin/templates/menu');
				$this->load->view('admin/workshop/ubah',$data);
				$this->load->view('admin/templates/footer');	
			} else{
				
				if ($data = $this->Workshopmodel->checkWorkshopImage($id)) {

					$old_image = $data['workshop']['image'];
					if($old_image != null){
					$deleteImage = realpath('./images/workshop/'.$old_image);
					unlink($deleteImage);
					}
				}		 	

				$this->Workshopmodel->ubahWorkshop($id);
				$this->session->set_flashdata('flash','<div class="alert alert-success" role="alert">Data <strong>Berhasil Diubah!</strong></div>');
				redirect('workshop');
		}

	}

}	