<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rule extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_gejala');
		$this->load->model('M_penyakit');
		$this->load->model('M_rule');
		// $this->load->model('M_login');
	// 	// if($this->session->userdata('status') != "login"){
	// 	// redirect(base_url("login"));
	// 	// }
		}
	  
// menampilkan list rule 
public function data_rule()
{
	$data = array(
		'rule' => $this->M_penyakit->get_rule_penyakit()
	);
	// var_dump($data); die();
	$this->load->view('rule', $data);
}

public function form_rule()
{
	$this->data['gejala'] = $this->M_gejala->get_gejala();
	$this->data['penyakit'] = $this->M_penyakit->get_penyakit();
	$this->load->view('add_rule',$this->data);
}

//menambahkan data rule
	// public function add_rule()
	// {
	// 	$this->data['penyakit'] = $this->M_penyakit->get_penyakit();
	// 	$this->data['gejala'] = $this->M_gejala->get_gejala();
	// 	// $id_admin = $this->session->userdata('id_admin');
    //     // $admin  = $this->M_gejala->get_admin($id_admin);
	// 	$id_penyakit = $this->input->post('nama_penyakit');
	// 	$id_gejala = $this->input->post('kd_gejala');	
	// 	$gejala = $this->M_rule->get_gejala($id_gejala);
	// 	$id_rule = $this->input->post('id_rule');
	// 	$kd_rule = $this->input->post('kd_rule');
	// 	$kode_gejala = $this->input->post('kode_gejala');
	// 	$kode = implode(",",$kode_gejala);
	// 	$data = array(
	// 		// 'id_admin' => $admin[0]['id_admin'],
	// 		'id_rule' => $id_rule,
	// 		'kd_rule' => $kd_rule,
	// 		'id_penyakit' => $id_penyakit,
	// 		'id_gejala' => $gejala[0]['id_gejala'],
	// 		// 'kode_gejala' =>implode(",", $kode_gejala)
	// 		'kode_gejala' => $kode

	// 	);
	// 	// var_dump($data);die();

	// 	if ($data['kd_rule'] == null) {
	// 		$this->load->view('add_rule',$this->data);
	// 	} else {
			
	// 		$request = $this->M_rule->add_data_rule($data);
	// 		// var_dump($request);exit();
	// 		if ($request) {
	// 			redirect('rule/data_rule');
	// 		} else {
	// 			echo "Insert Gagal";
	// 		}
	// 	}
	// }

	public function edit_rule($id_rule)
	{
		$rules = $this->M_penyakit->get_gejala_rule($id_rule);
		$result = array(
			'penyakit' => $this->M_penyakit->get_detail($id_rule),
			'gejala' => $this->M_gejala->get_gejala(),
			'rule_penyakit' => $rules,
			'rule_ids' => array_map(function($rule){
				return $rule['id_gejala'];
			}, $rules)
		);
		// var_dump($result);exit();

		$this->load->view('edit_rule', $result);
		// var_dump($data_detail);exit();
	}

	public function detail_rule($id_rule)
	{
		$rules = $this->M_penyakit->get_gejala_rule($id_rule);
		$result = array(
			'penyakit' => $this->M_penyakit->get_detail($id_rule),
			'gejala' => $this->get_data_gejala(),
			'rule_penyakit' => $rules,
			'rule_ids' => array_map(function($rule){
				return $rule['id_gejala'];
			}, $rules)
		);
		// var_dump($result);exit();
		$this->load->view('detail_rule', $result);
	}

// fungsi proses update rule yang sudah diedit 	
	public function proses_update()
	{
		// $username_admin = $this->session->userdata('nama');
        // $admin  = $this->M_login->get_admin($username_admin);
		$id_penyakit = $this->input->post('id_rule');
		$kode_gejala = $this->input->post('kode_gejala');

		$this->M_penyakit->delete_rule($id_penyakit);
		$this->M_penyakit->insert_rule($id_penyakit, $kode_gejala);

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
			$this->M_penyakit->delete_rule($id);
			echo "<script type='text/javascript'>alert('Berhasil Hapus Data');</script>";
		redirect(base_url('rule/data_rule'), 'refresh');
		}
	}
}