<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_Gejala extends CI_Model{
        
// mengambil data gejala pada tabel user 	
	function get_gejala(){
        $this->db->select('*');
        $this->db->from('gejala');
        $query = $this->db->get();
        // var_dump($query);exit();
        return $query->result_array();
      
    }

    function get_admin($id_admin){
        $this->db->select('*');
        $this->db->from('admin', $id_admin);
        $query = $this->db->get();
        // var_dump($query);exit();
        return $query->result_array();
    }

// menambahkan data gejala 
    function add_data_gejala($data) {
        $query = $this->db->insert('gejala',$data);
        return $query;
    
    }

// get detail di form edit gejala
    function get_detail($id_gejala)
	{
		$this->db->select('*');
		$this->db->from('gejala');
		$this->db->where('id_gejala', $id_gejala);
		$hasil = $this->db->get();
		return $hasil->row();
	}

    function update_gejala($id_gejala, $data){
		$this->db->where('id_gejala',$id_gejala);
		$query = $this->db->update('gejala',$data);
		return $query;
	}

   // menghapus gejala 
   function deletegejala_model($id){
    $this->db->where('id_gejala', $id);
    $delete = $this->db->delete('gejala');
    }
}
?>