<?php

    class Industrimodel extends CI_Model
    {
        public function daftarindustri(){
        
        $data = ["email" => htmlspecialchars($this->input->post('email')),
        "password" => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
        "image_profile" => 'default.png',
        "akses" => '4',
        "aktif" => '1',
        "tgl_daftar" => date('d-m-Y H:i:s')
        ];    
        
        $this->db->insert('industri',$data);

        }
    }
    