<?php

    function logged_in(){

        $ci = get_instance();

        if (!$ci->session->userdata('email')) {
            redirect('auth');
        } else{
            $akses = $ci->session->userdata('akses');
            if ($akses == 3) {
                redirect('home/siswa');
            }elseif ($akses == 4) {
                redirect('home/industri');
            } else{
                echo "Akses Forbidden";
            }
        }
    }

    function logged_admin()
    {
        $data = get_instance();

        if(!$data->session->userdata('username')){
            redirect('');
        } else{
            $akses = $data->session->userdata('akses');
            if ($akses > 3) {
                echo "Access Forbidden";
            } elseif ($akses == 2) {
                redirect('');
            } elseif ($akses == 1) {
                redirect('');
            } else{
                echo "Akses Forbidden";
            }
        }
    }