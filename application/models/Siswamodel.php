<?php

    class Siswamodel extends CI_Model{

        public function daftarsiswa(){

            date_default_timezone_set("ASIA/BANGKOK");

            $email = $this->input->post('email',true);

            $siswa=["username" => htmlspecialchars($this->input->post('username',true)),
                "email" => htmlspecialchars($email),
                "password" => password_hash ($this->input->post('password1'), PASSWORD_DEFAULT),
                "image_profil" => 'default.png',
                "akses" => '3',
                "aktif" => '0',
                "tgl_daftar" => date('Y-m-d H:i:s')
            ];

            $token = base64_encode(random_bytes(32));
            $siswa_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];
            
            //$this->db->set("id_siswa",'UUID()',false);
            $this->db->insert('siswa',$siswa);
            
            $this->db->insert('siswa_token',$siswa_token);
            
            $last_id = $this->db->insert_id();

            $profil = [
                "id_siswa" => $last_id,
            ];
            $this->db->insert('profil_siswa',$profil);
            
            $portfolio = [
                "id_siswa" => $last_id,
            ];
            $this->db->insert('port',$portfolio);

        }

        public function jumlahsiswa(){
            return $this->db->count_all('siswa');    
        }

        public function getProfilSiswaById($id){
            $this->db->select('*');
            $this->db->from('siswa AS s');
            $this->db->join('profil_siswa AS p','s.id_siswa = p.id_siswa');
            //$this->db->join('port AS z','s.id_siswa = z.id_siswa');
            if($id != null) {
            $this->db->where('s.id_siswa', $id);
            }
            $query = $this->db->get()->result_array();
            return $query;
        }

        public function Updatesiswa()
        {

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
                'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir',true))
            ];

           //$where = array('id_siswa' => $this->input->get('id_siswa') );

           
           $this->db->where('id_siswa', $this->input->post('id_siswa'));
           $this->db->update('siswa',$siswa);
           $this->db->where('id_siswa', $this->input->post('id_siswa'));
           $this->db->update('profil_siswa',$profil_siswa);
             
            $this->db->trans_complete();

        }

        public function hapus($id)
        {
            $this->db->trans_start();

            $this->db->delete('siswa',['id_siswa' => $id],'8');
           // $this->db->delete('profil_siswa',['id_profil_siswa' => $id],'8');

            $this->db->trans_complete();
        
            if ($this->db->trans_status == false) {
                echo "rollback";
            } else {
                echo "commited";
            }
        }    

        private function uploadPortfolio(){

                $config['upload_path']      = './images/Portfolio/images/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['overwrite']		= true;
                $config['max_size']         = 5120;
                $config['file_name']        = 'portfolio'.substr(md5(rand()),0,10);
    
                $this->load->library('upload',$config);
                if($this->upload->do_upload('file')){
                    return $this->upload->data("file_name");
            }            
        }

        public function updatePort()
        {
            $data = [
                "file" => $this->uploadPortfolio(),
                "deskripsi" => $this->input->post('deskripsi',true)
            ];

            if($this->uploadPortfolio() != "default.jpg"){
				$data['file'] = $this->uploadPortfolio();
			}

            $this->db->where('id_siswa', $this->input->post('id_siswa'));
            $this->db->update('portfolio',$data);
        }

        /* public function getPortfolioById($id)
		{
			return $this->db->get_where('portfolio',['id_port' => $id])->row_array();
		} */

        public function getportbyid($id)
        {
            //return $this->db->get_where('port', ['email' => $email])->row();
            $this->db->select('*');
            $this->db->from('siswa AS x');
            $this->db->join('port AS y','x.id_siswa = y.id_siswa');
            //$this->db->join('port AS z','s.id_siswa = z.id_siswa');
            if($id != null) {
            $this->db->where('x.id_siswa', $id);
            }
            $query = $this->db->get()->result_array();
            return $query;
            
            //return $this->db->get('port');
        }

    }