<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_Login extends CI_Model{

    // fungsi login 
        function login ($table,$where){
            return $this->db->get_where($table,$where);
        }

    //     public function cek_admin($email, $pass_bash)
    // {
    //     $this->db->where('email', $email);
    //     $this->db->where('password', $pass_bash);

    //     $hasil = $this->db->get('user');

    //     return $hasil;
    // }
    }
?>