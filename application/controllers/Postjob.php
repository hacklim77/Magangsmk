<?php
	
	class Postjob extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('Jobmodel');
			$this->load->model('Adminmodel');
			$this->load->model('Industrimodel');
			$this->load->library('form_validation');
			$this->load->helper('date');

			/* if (!$this->session->userdata('email')) {
				redirect('auth');
			} elseif (!$this->session->userdata('username')) {
				redirect('admin');
			}	 */
		}
		
		public function index(){
		
			if ($this->session->userdata('akses') == 1) {
				
				$data['judul'] = 'Admin | Job';
				$data['subjudul'] = 'Job | Tambah Job';
				$data['admin'] = $this->db->get_where('adminsuper',['username' => $this->session->userdata('username')])->row_array();
				$data['postjob'] = $this->Jobmodel->getAllpostjob();
				$this->load->view('admin/templates/header',$data);
				$this->load->view('admin/templates/menu',$data);
				$this->load->view('admin/postjob/index',$data);
				$this->load->view('admin/templates/footer');
			
			}
			
			elseif ($this->session->userdata('akses') == 2) {

				$data['judul'] = 'Admin | Job';
				$data['subjudul'] = 'Job | Tambah Job';
				$data['admin'] = $this->db->get_where('admin',['username' => $this->session->userdata('username')])->row_array();
				$data['postjob'] = $this->Jobmodel->getAllpostjob();
				$this->load->view('admin/templates/header',$data);
				$this->load->view('admin/templates/menu',$data);
				$this->load->view('admin/postjob/index',$data);
				$this->load->view('admin/templates/footer');
			}
			
			else {
				$data['title'] = 'Access Forbidden!';
				$this->load->view('errors/403',$data);
			}

		}

		public function tambah(){
			
			$this->form_validation->set_rules('nama_industri','Nama Industri','required');
			$this->form_validation->set_rules('email_industri','Email Industri','required');
			$this->form_validation->set_rules('posisi','Posisi','required');
			$this->form_validation->set_rules('deskripsi','Deskripsi','required');

			if($this->form_validation->run() == FALSE){
				$data['judul'] = 'Admin | Job';
				$data['subjudul'] = 'Job | Tambah Job';
				$this->load->view('admin/templates/header',$data);
				$this->load->view('admin/templates/menu');
				$this->load->view('admin/postjob/index',$data);
				$this->load->view('admin/templates/footer');	
			} else {

				date_default_timezone_set("ASIA/JAKARTA");
				$data = array(
						'nama_industri' => $this->input->post('nama_industri'),
						'email_industri' => $this->input->post('email_industri'),
						'posisi' => $this->input->post('posisi'),
						'deskripsi' => $this->input->post('deskripsi'),
						'date_post' => date('Y-m-d H:i:s')
					);

					$upload_image = $_FILES['gambar']['name'];
					
					if($upload_image){
						 $config['allowed_types']        = 'gif|jpg|png|jpeg';
						 $config['max_size']             = 4000;
						 $config['upload_path']          = './images/PostJob/';

						 $this->load->library('upload', $config);

						 if ($this->upload->do_upload('gambar')) {
						 	$new_image = $this->upload->data('file_name');
						 	$this->db->set('gambar',$new_image);
						 } else {
						 	echo $this->upload->display_errors();
						 }
					}	


				$this->db->insert('post_job',$data);
				$this->session->set_flashdata('flash','<div class="alert alert-success" role="alert">Data <strong>Berhasil Ditambahkan!</strong></div>');
				//$this->session->set_flashdata('flash',Ditambahkan);
				redirect('postjob');
			}				
		}

		public function daftar(){

			$data['judul'] = 'Admin | Job';
			$data['subjudul'] = 'Job | Daftar Job';			
			$data['postjob'] = $this->Jobmodel->getAllpostjob();
			$this->load->view('admin/templates/header',$data);
			$this->load->view('admin/templates/menu');
			$this->load->view('admin/postjob/daftar',$data);
			$this->load->view('admin/templates/footer');			
		}

		public function detail($id)
		{
				$data['judul'] = 'Admin | Job';
				$data['subjudul'] = 'Job | Detail Job';
				$data['postjob'] = $this->Jobmodel->getPostjobById($id);
				$this->load->view('admin/templates/header',$data);
				$this->load->view('admin/templates/menu');
				$this->load->view('admin/postjob/detail',$data);
				$this->load->view('admin/templates/footer');
		}

		public function detailjob($id)
		{
			if ($this->session->userdata('akses') > 2) {
				$data['judul'] = 'Lowongan | Magang SMK';
				$data['subjudul'] = 'Lowongan | Detail Lowongan';
				$data['siswa'] = $this->db->get_where('siswa',['email' => $this->session->userdata('email')])->row_array();
				$data['postjob'] = $this->Jobmodel->getPostjobById($id);
				$data['otherjob'] = $this->Jobmodel->getAllpostjob();
				$this->load->view('murid/templates/header',$data);
				$this->load->view('murid/templates/menu',$data);
				$this->load->view('murid/postjob/detail',$data);
				$this->load->view('murid/templates/footer');
			} else{
				$data['title'] = 'Access Forbidden!';
				$this->load->view('errors/403',$data);
			}
				
		}

		public function lowongan(){

		if ($this->session->userdata('akses') == 3) {	
			$data['judul'] = 'Lowongan Magang | Magang SMK';			
			$data['postjob'] = $this->Jobmodel->lowonganList(10,0);
			$data['siswa'] = $this->db->get_where('siswa',['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('murid/templates/header',$data);
			$this->load->view('murid/templates/menu',$data);
			$this->load->view('murid/postjob/index',$data);
			$this->load->view('murid/templates/footer');			
			}
		}

		public function ubah($id=null){
			$this->form_validation->set_rules('nama_industri','Nama Industri','required');
			$this->form_validation->set_rules('email_industri','Email Industri','required');
			$this->form_validation->set_rules('posisi','Posisi','required');
			$this->form_validation->set_rules('deskripsi','Deskripsi','required');
			
				$data['judul'] = 'Admin | Job';
				$data['subjudul'] = 'Job | Tambah Job';
				$data['postjob'] = $this->Jobmodel->getPostjobById($id);
			
				if($this->form_validation->run() == FALSE){
				$this->load->view('admin/templates/header',$data);
				$this->load->view('admin/templates/menu');
				$this->load->view('admin/postjob/ubah',$data);
				$this->load->view('admin/templates/footer');	
			} else {
				date_default_timezone_set("ASIA/JAKARTA");
				$data = array(
						'nama_industri' => $this->input->post('nama_industri'),
						'email_industri' => $this->input->post('email_industri'),
						'posisi' => $this->input->post('posisi'),
						'deskripsi' => $this->input->post('deskripsi'),
						'date_post' => date('Y-m-d H:i:s')
					);

					$upload_image = $_FILES['gambar']['name'];
					
					if($upload_image){
						 $config['allowed_types']        = 'gif|jpg|png|jpeg';
						 $config['max_size']             = 4000;
						 $config['upload_path']          = './images/PostJob/';

						 $this->load->library('upload', $config);

						 if ($this->upload->do_upload('gambar')) {

 						 	$old_image = $data['postjob']['gambar'];
						 	if($old_image != 'default.jpg'){
						 		$deleteImage = FCPATH.'images/PostJob/'.$old_image;
						 		unlink(realpath($deleteImage));
						 	}

						 	$new_image = $this->upload->data('file_name');
						 	$this->db->set('gambar',$new_image);
						 } else {
						 	echo $this->upload->display_errors();
						 }
					}
					
					

				$this->db->where('id_job',$this->input->post('id_job'));	
				$this->db->update('post_job',$data);
				$this->session->set_flashdata('flash','<div class="alert alert-success" role="alert">Data <strong>Berhasil Diubah!</strong></div>');
				//$this->session->set_flashdata('flash',Ditambahkan);
				redirect('postjob');
				
				//$this->Jobmodel->ubahPostjob();
				//$this->session->set_flashdata('flash','<div class="alert alert-success" role="alert">Data <strong>Berhasil Diubah!</strong></div>');
				//$this->session->set_flashdata('flash',Ditambahkan);
				//redirect('postjob/daftar');
			}				
		}
		
		public function delete($id){
			$postjob = new Jobmodel;
				if ($postjob->checkJobImage($id)) {
					$data = $postjob->checkJobImage($id);
					//$data->gambar;
					$file = realpath('./images/PostJob/'.$data->gambar);
					if (file_exists($file)) {
						unlink($file);
					}
					$postjob->deletePostjob($id);
					$this->session->set_flashdata('flash','<div class="alert alert-danger" role="alert">Data <strong>Berhasil Dihapus!</strong></div>');
					redirect('postjob');				
				}
		}

	}
