<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_konsultasi');
		// if($this->session->userdata('status') != "login"){
		// redirect(base_url("login"));
		// }
		}
	  
// menampilkan list Diagnosa 
public function data_diagnosa()
{
	$data = array(
		'konsultasi' => $this->M_konsultasi->get_konsultasi()
	);
	$this->load->view('diagnosa', $data);
}

// menghapus diagnosa
	public function delete_diagnosa($id)
	{
		// var_dump($id);exit();
		if ($id === null) {
			echo "Data Gagal dihapus";
		} else {
			$request = $this->M_konsultasi->deletediagnosa_model($id);
			echo "<script type='text/javascript'>alert('Berhasil Hapus Data Diagnosa');</script>";
		redirect(base_url('diagnosa/data_diagnosa'), 'refresh');
		}
	}
}