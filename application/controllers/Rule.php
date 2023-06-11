<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rule extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_gejala');
		$this->load->model('M_penyakit');
		$this->load->model('M_rule');
	// 	// if($this->session->userdata('status') != "login"){
	// 	// redirect(base_url("login"));
	// 	// }
		}
	  
// menamilkan list rule 
public function data_rule()
{
	$data = array(
		'rule' => $this->get_data_rule()
	);
	$this->load->view('rule', $data);
}

public function get_data_rule()
{
	$request = $this->M_rule->get_rule();
	return $request;
}

// mengammbil data gejala dari model
public function get_data_gejala()
{
	$request = $this->M_gejala->get_gejala();
	return $request;
}

public function get_data_penyakit()
{
	$request = $this->M_penyakit->get_penyakit();
	return $request;
}

public function form_rule()
{
	$this->data['gejala'] = $this->get_data_gejala();
	$this->data['penyakit'] = $this->get_data_penyakit();
	$this->load->view('add_rule',$this->data);
}

//menambahkan data rule
	public function add_rule()
	{
		$this->data['penyakit'] = $this->M_penyakit->get_penyakit();
		$this->data['gejala'] = $this->get_data_gejala();
		$id_admin = $this->session->userdata('id_admin');
        $admin  = $this->M_gejala->get_admin($id_admin);
		$id_penyakit = $this->input->post('nama_penyakit');
		$id_gejala = $this->input->post('kd_gejala');	
		$gejala = $this->M_rule->get_gejala($id_gejala);
		$id_rule = $this->input->post('id_rule');
		$kd_rule = $this->input->post('kd_rule');
		$kode_gejala = $this->input->post('kode_gejala');
		$kode = implode(",",$kode_gejala);
		$data = array(
			'id_admin' => $admin[0]['id_admin'],
			'id_rule' => $id_rule,
			'kd_rule' => $kd_rule,
			'id_penyakit' => $id_penyakit,
			'id_gejala' => $gejala[0]['id_gejala'],
			// 'kode_gejala' =>implode(",", $kode_gejala)
			'kode_gejala' => $kode

		);
		// var_dump($data);die();

		if ($data['kd_rule'] == null) {
			$this->load->view('add_rule',$this->data);
		} else {
			
			$request = $this->M_rule->add_data_rule($data);
			// var_dump($request);exit();
			if ($request) {
				redirect('rule/data_rule');
			} else {
				echo "Insert Gagal";
			}
		}
	}

	public function edit_rule($id_rule)
	{
		$this->data['penyakit'] = $this->M_penyakit->get_penyakit();
		$this->data['gejala'] = $this->get_data_gejala();
		$data_detail = $this->M_rule->get_detail($id_rule);
		$kode_gejala = $data_detail->kode_gejala;
		$kode = explode(",", $kode_gejala);
		$penyakit = $this->M_penyakit->get_penyakit();
		
		// print_r($data_detail);
		// exit();
		$result = array(
			'data_detail' => $data_detail,
			'kode_gejala' => $kode,
			'id_penyakit' => $penyakit
		
		);
		$this->load->view('edit_rule', $result);
		// var_dump($data_detail);exit();
	}

// fungsi proses update gejala yang sudah diedit 	
	public function proses_update()
	{
		$id_rule = $this->input->post('id_rule');
		$kode_gejala = $this->input->post('kode_gejala');
		$kode = implode(",",$kode_gejala);
		$data_post = array(
			'id_rule' => $this->input->post('id_rule'),
			// 'id_gejala' => $this->input->post('id_gejala'),
			'kd_rule' => $this->input->post('kd_rule'),
			'id_penyakit' => $this->input->post('nama_penyakit'),
			'kode_gejala' => $kode
		);

		$this->load->model('M_rule');
		$this->M_rule->update_rule($id_rule, $data_post);
		echo "<script type='text/javascript'>alert('Berhasil Ubah Data');</script>";
		redirect(base_url('rule/data_rule'), 'refresh');
	}

// menghapus pegawai
	public function delete_rule($id)
	{
		// var_dump($id);exit();
		if ($id === null) {
			echo "Data Gagal dihapus";
		} else {
			$request = $this->M_rule->deleterule_model($id);
			echo "<script type='text/javascript'>alert('Berhasil Hapus Data');</script>";
		redirect(base_url('rule/data_rule'), 'refresh');
		}
	}
}