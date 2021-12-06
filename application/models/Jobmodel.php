<?php
	class Jobmodel extends CI_Model{

		public function getAllpostjob(){
			return $query=$this->db->get('post_job')->result_array();
		}

		public function getPostjobById($id){
			return $this->db->get_where('post_job',['id_job' => $id])->row_array();
		}
		
		public function checkJobImage($id){
			$query = $this->db->get_where('post_job',['id_job' => $id]);
			return $query->row();
		}

		public function countPostjob()
		{
			return $this->db->count_all('post_job');
		}

		public function deletePostjob($id){
			return $this->db->delete('post_job',['id_job' => $id]);
		}

		public function lowonganList($limit,$offset){
			$this->db->select('*');
			$this->db->from('post_job');
			$this->db->limit($limit,$offset);
			$this->db->order_by('date_post','DESC');
			$query = $this->db->get();

			return $query->result_array();
		}

	}