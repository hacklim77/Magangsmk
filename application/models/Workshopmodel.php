<?php
	
	class Workshopmodel extends CI_Model{

		public function getAllworkshop(){
			return $query=$this->db->get('workshop')->result_array();
		}

		public function getWorkshopById($id)
		{
			return $this->db->get_where('workshop',['id_workshop' => $id])->row_array();
		}

		public function tambahWorkshop(){
			$data = [
				"nama_workshop" => $this->input->post('nama_workshop',true),
				"penyelenggara" => $this->input->post('penyelenggara',true),
				"deskripsi" => $this->input->post('deskripsi',true),
				"tanggal" => $this->input->post('tanggal',true),
				"image" => $this->_uploadImage()
			];

			$this->db->insert('workshop',$data);
		}

		public function checkWorkshopImage($id){
			$query = $this->db->get_where('workshop',['id_workshop' => $id]);
			return $query->row();
		}

		public function hapusWorkshop($id){
			return $this->db->delete('workshop', ['id_workshop' => $id ]);	
		}		

		private function _uploadImage(){
			$config['upload_path']      = './images/Workshop/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['overwrite']		= true;
            $config['max_size']         = 5120;
            $config['file_name']        = 'workshop-'.date('ymd').'-'.substr(md5(rand()),0,10);

			$this->load->library('upload',$config);
			if($this->upload->do_upload('image')){
				return $this->upload->data("file_name");
			}

			//return "default.jpg";
		}

		public function ubahWorkshop($id){
			$data = [
				"nama_workshop" => $this->input->post('nama_workshop',true),
				"penyelenggara" => $this->input->post('penyelenggara',true),
				"deskripsi" => $this->input->post('deskripsi',true),
				"tanggal" => $this->input->post('tanggal',true),
				//"image" => $this->input->post('image',true)
			];
			
			if($this->_uploadImage() != null){
				$data['image'] = $this->_uploadImage();
			}	
					 					  
			$this->db->where('id_workshop',$this->input->post('id_workshop'));
			$this->db->update('workshop',$data);
		}
		
		public function workshopList($limit,$offset){
			$this->db->select('*');
			$this->db->from('workshop');
			$this->db->limit($limit,$offset);
			$this->db->order_by('tanggal','ASC');
			$query = $this->db->get();

			return $query->result_array();
		}

	}