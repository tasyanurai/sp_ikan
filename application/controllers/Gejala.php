<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_gejala');
		$this->load->library('session');
		// if($this->session->userdata('status') != "login"){
		// redirect(base_url("login"));
		// }
		}
	  
// menamilkan list gejala 
public function data_gejala()
{
	$data = array(
		'gejala' => $this->get_data_gejala()
	);
	$this->load->view('gejala', $data);
}

// mengammbil data gejala dari model
public function get_data_gejala()
{
	$request = $this->M_gejala->get_gejala();
	return $request;
}

public function get_data_admin()
{
	$request = $this->M_gejala->get_admin();
	return $request;
}

public function form_gejala()
{
	$this->load->view('add_gejala');
}

//menambahkan data gejala
	public function add_gejala()
	{
		// $this->data['admin'] = $this->get_data_admin();
		// $id_admin 	= $this->session->userdata('id_admin');
		// $id_gejala = $this->input->post('id_gejala');
		// $nama_gejala = $this->input->post('nama_gejala');
		// $kd_gejala = $this->input->post('kd_gejala');
		// $data = array(
		// 	'id_admin' => $id_admin,
		// 	'id_gejala' => $id_gejala,
		// 	'nama_gejala' => $nama_gejala,
		// 	'kd_gejala' => $kd_gejala,
		// );
		$id_admin = $this->session->userdata('id_admin');
        $admin  = $this->M_gejala->get_admin($id_admin);
		$id_gejala = $this->input->post('id_gejala');
		$nama_gejala = $this->input->post('nama_gejala');
		$kd_gejala = $this->input->post('kd_gejala');
		$data = array(
			'id_admin' => $admin[0]['id_admin'],
			'id_gejala' => $id_gejala,
			'nama_gejala' => $nama_gejala,
			'kd_gejala' => $kd_gejala,
		);
		// var_dump($data);
		if ($data['nama_gejala'] == null) {
			$this->load->view('gejala/add_gejala');
		} else {
			// var_dump($data);
			$request = $this->M_gejala->add_data_gejala($data);
			// var_dump($request);exit();
			if ($request) {
				redirect('gejala/data_gejala');				
			} else {
				echo "Insert Gagal";
			}
		}
	}

	public function edit_gejala($id_gejala)
	{
		$this->load->model('M_gejala');
		$data_detail = $this->M_gejala->get_detail($id_gejala);
		// print_r($data_detail);
		// exit();
		$result = array(
			'data_detail' => $data_detail
		);
		$this->load->view('edit_gejala', $result);
		// var_dump($data_detail);exit();
	}

// fungsi proses update gejala yang sudah diedit 	
	public function proses_update()
	{
		$id_gejala = $this->input->post('id_gejala');
		$data_post = array(
			'id_gejala' => $this->input->post('id_gejala'),
			'kd_gejala' => $this->input->post('kd_gejala'),
			'nama_gejala' => $this->input->post('nama_gejala'),
		);

		$this->load->model('M_gejala');
		$this->M_gejala->update_gejala($id_gejala, $data_post);
		echo "<script type='text/javascript'>alert('Berhasil Ubah Data Gejala');</script>";
		redirect(base_url('gejala/data_gejala'), 'refresh');
	}

// menghapus pegawai
	public function delete_gejala($id)
	{
		// var_dump($id);exit();
		if ($id === null) {
			echo "Data Gagal dihapus";
		} else {
			$request = $this->M_gejala->deletegejala_model($id);
			echo "<script type='text/javascript'>alert('Berhasil Hapus Data Gejala');</script>";
		redirect(base_url('gejala/data_gejala'), 'refresh');
		}
	}
}