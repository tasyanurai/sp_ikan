<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

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
		$this->load->view('dashboard_adm', $data);
	}
}