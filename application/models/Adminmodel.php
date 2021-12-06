<?php

    class Adminmodel extends CI_Model{

        public function tambadmins()
        {
            $data = [
                "username" => $this->input->post('username'),
                "password" => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                "akses" => 1,
                "aktif" => 1
            ];

            $this->db->insert('adminsuper',$data);
        }
        
        public function tambadmin()
        {
            $data = [
                "username" => $this->input->post('username'),
                "password" => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                "akses" => 2,
                "aktif" => 1
            ];

            $this->db->insert('admin',$data);
        }

        public function getallAdmin()
        {
            return $this->db->get('admin')->result_array();
        }

    }