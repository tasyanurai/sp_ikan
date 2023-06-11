<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_konsultasi extends CI_Model{
        
// mengambil data pegawai pada tabel user 	
	function get_konsultasi(){
        $this->db->select('*');
		$this->db->from('konsultasi k');
		$this->db->join('rule r','k.id_rule = r.id_rule');

		$query = $this->db->get();
		return $query->result_array();
      
    }

// menambahkan data rule 
    function add_data_konsultasi($data) {
        
        $query = $this->db->insert('konsultasi',$data);
        return $query;
    
    }

    function get_rule($id_rule){
        $this->db->select('*');
        $this->db->from('rule', $id_rule);
        $query = $this->db->get();
        // var_dump($query);exit();
        return $query->result_array();
    }

// get detail di form edit rule
    function get_detail($id_konsultasi)
	{
		$this->db->select('k.*');
		$this->db->select('r.*');
		$this->db->from('konsultasi k');
		$this->db->join('rule r','r.id_rule = k.id_rule');
		$this->db->where('id_konsultasi', $id_konsultasi);
		$hasil = $this->db->get();
		return $hasil->row_array();
	}

    public function getId()
    {
        $this->db->select_max('id_konsultasi', 'id_konsultasi');
        $query = $this->db->get('konsultasi')->row_array();

        $id = $query['id_konsultasi'];
        // $kode = (int) substr($id, 0);
        // $kode++;

        return $id;
    }

//     function get_gejala($id_gejala){
//         $this->db->select('*');
//         $this->db->from('gejala', $id_gejala);
//         $query = $this->db->get();
//         // var_dump($query);exit();
//         return $query->result_array();
//     }

//     function get_penyakit($id_penyakit){
//         $this->db->select('*');
//         $this->db->from('penyakit', $id_penyakit);
//         $query = $this->db->get();
//         // var_dump($query);exit();
//         return $query->result_array();
//     }
    
//     function update_rule($id_rule, $data){
// 		$this->db->where('id_rule',$id_rule);
// 		$query = $this->db->update('rule',$data);
// 		return $query;
// 	}

//     public function cek_kode($kd_rule){
//         $this->db->select('*');
//         $this->db->from('rule');
//         $this->db->where('kd_rule = ',$kd_rule);
//         $query = $this->db->get();
//         return $query;
//       }

//    // menghapus rule 
//    function deleterule_model($id){
//     $this->db->where('id_rule', $id);
//     $delete = $this->db->delete('rule');
//     }
}
?>