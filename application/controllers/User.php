<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->model('M_gejala');
        $this->load->model('M_penyakit');
		$this->load->model('M_konsultasi');
  
        

		// $this->load->model('M_konsultasi');
	// 	// if($this->session->userdata('status') != "login"){
	// 	// redirect(base_url("login"));
	// 	// }
		}

	public function index()
	{
     
		$waktu=gmdate('H:i',time()+7*3600);
		$t=explode(':',$waktu); 
		$jam=$t[0]; 
		$menit=$t[1];

		if ($jam >= 00 and $jam < 10 ){ 
			if ($menit >00 and $menit<60){ 
				$ucapan='Selamat Pagi'; 
			} 
		}else if ($jam >= 10 and $jam < 15 ){ 
			if ($menit >00 and $menit<60){ 
				$ucapan='Selamat Siang'; 
			} 
		}else if ($jam >= 15 and $jam < 18 ){ 
			if ($menit >00 and $menit<60){ 
				$ucapan='Selamat Sore'; 
			} 
		}else if ($jam >= 18 and $jam <= 24 ){ 
			if ($menit >00 and $menit<60){ 
				$ucapan='Selamat Malam'; 
			} 
		}else { 
			$ucapan='Error';

		}

		$data = [
			'ucapan' => $ucapan
		];
		$this->load->view('user/dashboard', $data);
	}

    public function struktur_ikan()
	{
        $this->load->view('user/struktur_ikan');
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

public function konsultasi()
{
	$this->data['gejala'] = $this->get_data_gejala();
	$this->data['penyakit'] = $this->get_data_penyakit();
	$this->load->view('user/konsultasi',$this->data);
}

public function hasil()
{

        $id_konsultasi = $this->M_konsultasi->getId();
		$konsultasi = $this->M_konsultasi->get_detail($id_konsultasi,);
        $data['konsultasi'] = $konsultasi;

        $data['rule'] = $this->M_penyakit->get_detail($konsultasi['id_penyakit']);

		// var_dump($data); die();
       
    // $konsultasi = $this->M_konsultasi->get_konsultasi();
    // $data = array(
    //     'konsultasi' => $konsultasi
    // );
    $this->load->view('user/hasil',$data);

}

//menambahkan data konsultasi
	public function add_konsultasi()
	{
		$this->data['penyakit'] = $this->M_penyakit->get_penyakit();
		$this->data['gejala'] = $this->get_data_gejala();		
        $this->data['konsultasi'] = $this->M_konsultasi->getId();
		// $id_penyakit = $this->input->post('nama_penyakit');
        // $id_rule = $this->input-post('kode_gejala');
		// $id_gejala = $this->input->post('kd_gejala');	
		// $gejala = $this->M_konsultasi->get_gejala($id_gejala);
		$id_konsultasi = $this->input->post('id_konsultasi');
		$id_rule = $this->input->post('kode_gejala');
        $rule  = $this->M_konsultasi->get_rule($id_rule);
		// $kode = implode(",",$id_rule);
        $nama_user = $this->input->post('nama_user');
        $email = $this->input->post('email');
        $tgl_konsultasi = $this->input->post('tgl_konsultasi');
        $id_konsultasi = $this->input->post('id_konsultasi');
		$data = array(
            // 'id_penyakit' => $id_penyakit,
			'id_konsultasi' => $id_konsultasi,	
			'id_rule' => $rule[0]['id_rule'],
            'nama_user' => $nama_user,
            'email' => $email,
            'tgl_konsultasi' => $tgl_konsultasi
			// 'kode_gejala' =>implode(",", $kode_gejala)
			// 'kode_gejala' => $kode

		);
		// var_dump($data);die();

		if ($data['nama_user'] == null) {
			$this->load->view('user/konsultasi',$this->data);
		} else {
			
			$request = $this->M_konsultasi->add_data_konsultasi($data);
			// var_dump($request);exit();
			if ($request) {
				redirect('user/hasil');
			} else {
				echo "Insert Gagal";
			}
		}
	}

	public function edit_konsultasi($id_konsultasi)
	{
		$this->data['penyakit'] = $this->M_penyakit->get_penyakit();
		$this->data['gejala'] = $this->get_data_gejala();
		$data_detail = $this->M_konsultasi->get_detail($id_konsultasi);
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
		$this->load->view('edit_konsultasi', $result);
		// var_dump($data_detail);exit();
	}

// fungsi proses update gejala yang sudah diedit 	
	public function proses_update()
	{
		$id_konsultasi = $this->input->post('id_konsultasi');
		$kode_gejala = $this->input->post('kode_gejala');
		$kode = implode(",",$kode_gejala);
		$data_post = array(
			'id_konsultasi' => $this->input->post('id_konsultasi'),
			// 'id_gejala' => $this->input->post('id_gejala'),
			'kd_konsultasi' => $this->input->post('kd_konsultasi'),
			'id_penyakit' => $this->input->post('nama_penyakit'),
			'kode_gejala' => $kode
		);

		$this->load->model('M_konsultasi');
		$this->M_konsultasi->update_konsultasi($id_konsultasi, $data_post);
		echo "<script type='text/javascript'>alert('Berhasil Ubah Data');</script>";
		redirect(base_url('konsultasi/data_konsultasi'), 'refresh');
	}

// menghapus pegawai
	public function delete_konsultasi($id)
	{
		// var_dump($id);exit();
		if ($id === null) {
			echo "Data Gagal dihapus";
		} else {
			$request = $this->M_konsultasi->deletekonsultasi_model($id);
			echo "<script type='text/javascript'>alert('Berhasil Hapus Data');</script>";
		redirect(base_url('konsultasi/data_konsultasi'), 'refresh');
		}
	}

}
