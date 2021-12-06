<?php
    class Kontak extends CI_Controller{

        public function __construct()
		{
			parent::__construct();
			$this->load->model('Jobmodel');
			$this->load->model('Workshopmodel');
			$this->load->model('Siswamodel');
			$this->load->model('Industrimodel');
			//$this->load->helper('magangsmk');
			$this->load->library('form_validation');

			if (!$this->session->userdata('email')) {
				redirect('auth');
			}

		}

        public function index()
        {
            if($this->session->userdata('akses') == 3){
				$data['judul'] = 'Kontak Kami | Magang SMK';
				$data['siswa'] = $this->db->get_where('siswa',['email' => $this->session->userdata('email')])->row_array();
				
				$this->load->view('murid/templates/header',$data);
				$this->load->view('murid/templates/menu',$data);
				$this->load->view('murid/kontak/index',$data);
				$this->load->view('murid/templates/footer');
			} elseif ($this->session->userdata('akses') == 4) {
				$data['judul'] = 'Kontak Kami | Magang SMK';
				$data['industri'] = $this->db->get_where('industri',['email' => $this->session->userdata('email')])->row_array();
				
				$this->load->view('industri/templates/header',$data);
				$this->load->view('industri/templates/menu',$data);
				$this->load->view('industri/kontak/index',$data);
				$this->load->view('industri/templates/footer');			
			} else{
				$data['title'] = 'Access Forbidden!';
				$this->load->view('errors/403',$data);
			}   
        }

		public function sendMsg()
		{
			if($this->session->userdata('akses') == 3){
				
				if($this->input->post('sendMsg') === FALSE){
					$data['judul'] = 'Kontak Kami | Magang SMK';
					$data['siswa'] = $this->db->get_where('siswa',['email' => $this->session->userdata('email')])->row_array();
					$this->load->view('murid/templates/header',$data);
					$this->load->view('murid/templates/menu',$data);
					$this->load->view('murid/kontak/index',$data);
					$this->load->view('murid/templates/footer');
				} else {
					date_default_timezone_set("ASIA/JAKARTA");
					$data = [
						"email" => $this->input->post('email'),
						"pesan" => $this->input->post('pesan'),
						"tanggal" => date('Y-m-d H:i:s')
					];
					
					$this->db->insert('kontak',$data);
					$this->session->set_flashdata('Msg','<div class="alert alert-success" role="alert">Pesan <strong>Berhasil Dikirim!</strong></div>');
					redirect('kontak');
				}									
			}

		}

    }