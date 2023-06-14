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

public function konsultasi()
{
	$this->data['gejala'] = $this->M_gejala->get_gejala();
	$this->load->view('user/konsultasi',$this->data);
}

public function hasil($id_konsultasi)
{
		$konsultasi = $this->M_konsultasi->get_detail($id_konsultasi);
		$rules = $this->M_konsultasi->get_rule_penyakit($konsultasi['id_penyakit']);

		$data = [];
        $data['konsultasi'] = $konsultasi;
		$data['kode_gejala'] = join(', ', array_map(function($item) {
			return $item['nama_gejala'];
		}, $rules));
        $data['penyakit'] = $this->M_penyakit->get_detail($konsultasi['id_penyakit']);
		// var_dump($data); die();
    	$this->load->view('user/hasil',$data);

}

//menambahkan data konsultasi
	public function add_konsultasi()
	{
		$this->data['penyakit'] = $this->M_penyakit->get_penyakit();
		$this->data['gejala'] = $this->M_gejala->get_gejala();	
        $this->data['konsultasi'] = $this->M_konsultasi->getId();
		$id_konsultasi = $this->input->post('id_konsultasi');
		$id_rule = $this->input->post('kode_gejala');
        $rule  = $this->M_konsultasi->get_calculated_rule($id_rule);
        $nama_user = $this->input->post('nama_user');
        $email = $this->input->post('email');
        $tgl_konsultasi = $this->input->post('tgl_konsultasi');
		$data = array(
			'id_penyakit' => $rule[0]['id_penyakit'],
            'nama_user' => $nama_user,
            'email' => $email,
            'tgl_konsultasi' => $tgl_konsultasi
		);
		// var_dump($data);die();

		if ($data['nama_user'] == null) {
			$this->load->view('user/konsultasi',$this->data);
		} else {
			
			$request = $this->M_konsultasi->add_data_konsultasi($data);
			// var_dump($request);exit();
			if ($request) {
				redirect('user/hasil/'.$this->db->insert_id());
			} else {
				echo "Insert Gagal";
			}
		}
	}

}
