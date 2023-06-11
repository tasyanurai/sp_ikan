<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct(){
		parent::__construct(); 
		$this->load->model('M_login');
	}	

	public function index()
	{
		$this->load->view('login');
	}

	public function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
		'username' => $username,
		'password' => md5($password)
	   );
	   $cek = $this->M_login->login("admin",$where)->num_rows();
	   if($cek > 0){
	    //  print_r($cek);exit();
	  $data_session = array(
		'nama' => $username,
		'status' => "login"
	   );
	//    var_dump($data_session);exit();
	  $this->session->set_userdata($data_session);
	  redirect(base_url("gejala/data_gejala"));
	  
	  }else{
	   echo "Data Login Salah!";
	  }
	  }

}

