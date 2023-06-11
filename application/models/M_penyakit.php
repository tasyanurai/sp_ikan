<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_penyakit extends CI_Model{
        
// mengambil data pegawai pada tabel user 	
	function get_penyakit(){
        $this->db->select('*');
        $this->db->from('penyakit');
        $query = $this->db->get();
        // var_dump($query);exit();
        return $query->result_array();
      
    }

// menambahkan data penyakit 
    function add_data_penyakit($data) {
        
        $query = $this->db->insert('penyakit',$data);
        return $query;
    
    }

// get detail di form edit penyakit
    function get_detail($id_penyakit)
	{
		$this->db->select('*');
		$this->db->from('penyakit');
		$this->db->where('id_penyakit', $id_penyakit);
		$hasil = $this->db->get();
		return $hasil->row();
	}

    function get_admin($id_admin){
        $this->db->select('*');
        $this->db->from('admin', $id_admin);
        $query = $this->db->get();
        // var_dump($query);exit();
        return $query->result_array();
    }
    
    function update_penyakit($id_penyakit, $data){
		$this->db->where('id_penyakit',$id_penyakit);
		$query = $this->db->update('penyakit',$data);
		return $query;
	}

    public function cek_kode($kd_penyakit){
        $this->db->select('*');
        $this->db->from('penyakit');
        $this->db->where('kd_penyakit = ',$kd_penyakit);
        $query = $this->db->get();
        return $query;
      }

   // menghapus penyakit 
   function deletepenyakit_model($id){
    $this->db->where('id_penyakit', $id);
    $delete = $this->db->delete('penyakit');
    }
}
?>