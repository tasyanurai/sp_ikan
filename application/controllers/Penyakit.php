<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_penyakit');
		// if($this->session->userdata('status') != "login"){
		// redirect(base_url("login"));
		// }
		}

	// menamilkan list penyakit 
public function data_penyakit()
{
	$data = array(
		'penyakit' => $this->get_data_penyakit()
	);
	$this->load->view('penyakit', $data);
}

// mengammbil data penyakit dari model
public function get_data_penyakit()
{
	$request = $this->M_penyakit->get_penyakit();
	return $request;
}

public function form_penyakit()
{
	$this->load->view('add_penyakit');
}

//menambahkan data penyakit
public function add_penyakit()
{

			// $id_admin = $this->session->userdata('id_admin');
        	// $admin  = $this->M_penyakit->get_admin($id_admin);
			$id_penyakit = $this->input->post('id_penyakit');
			$nama_penyakit = $this->input->post('nama_penyakit');
			$kd_penyakit = $this->input->post('kd_penyakit');
			$solusi = $this->input->post('solusi');
             $data = [
                // 'gambar_penyakit' => $filename,
				// 'id_admin' => $admin[0]['id_admin'],
				'id_penyakit' => $id_penyakit,
				'nama_penyakit' => $nama_penyakit,
				'kd_penyakit' => $kd_penyakit,
				'solusi' => $solusi
            ];
                $this->M_penyakit->add_data_penyakit($data);
                redirect('penyakit/data_penyakit');

    }

	public function edit_penyakit($id_penyakit)
	{
		$this->load->model('M_penyakit');
		$data_detail = $this->M_penyakit->get_detail($id_penyakit);
		// print_r($data_detail);
		// exit();
		$result = array(
			'data_detail' => $data_detail
		);
		$this->load->view('edit_penyakit', $result);
		// var_dump($data_detail);exit();
	}

// fungsi proses update penyakit yang sudah diedit 	
	public function proses_update()
	{
		$id_penyakit = $this->input->post('id_penyakit');
		$data_post = array(
			'id_penyakit' => $this->input->post('id_penyakit'),
			'kd_penyakit' => $this->input->post('kd_penyakit'),
			'nama_penyakit' => $this->input->post('nama_penyakit'),
			'solusi' => $this->input->post('solusi'),
		);

		$this->load->model('M_penyakit');
		$this->M_penyakit->update_penyakit($id_penyakit, $data_post);
		echo "<script type='text/javascript'>alert('Berhasil Ubah Data Penyakit');</script>";
		redirect(base_url('penyakit/data_penyakit'), 'refresh');
	}

// menghapus pegawai
	public function delete_penyakit($id)
	{
		// var_dump($id);exit();
		if ($id === null) {
			echo "Data Gagal dihapus";
		} else {
			$request = $this->M_penyakit->deletepenyakit_model($id);
			echo "<script type='text/javascript'>alert('Berhasil Hapus Data Penyakit');</script>";
		redirect(base_url('penyakit/data_penyakit'), 'refresh');
		}
	}
        
}

