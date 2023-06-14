<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_konsultasi extends CI_Model{
        
// mengambil data pegawai pada tabel user 	
	function get_konsultasi(){
        $this->db->select('*');
		$this->db->from('konsultasi k');
		$this->db->join('penyakit p','k.id_penyakit = p.id_penyakit');

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
        $this->db->from('rule');
        $this->db->where_in('id_gejala', $id_rule);
        $query = $this->db->get();
        // var_dump($query);exit();
        return $query->result_array();
    }

    function get_rule_penyakit($id_penyakit){
        // SELECT r.*, g.* FROM rule r JOIN gejala g ON r.id_gejala = g.id_gejala;
		$this->db->select('r.*, g.*');
		$this->db->from('rule r');
		$this->db->join('gejala g','r.id_gejala = g.id_gejala');
		$this->db->where('r.id_penyakit', $id_penyakit);
		$hasil = $this->db->get();
		return $hasil->result_array();
    }

    function get_calculated_rule($id_rule){
        $this->db->select('SUM(bobot) total_bobot, p.*');
        $this->db->from('rule r');
        $this->db->join('penyakit p', 'p.id_penyakit = r.id_penyakit');
        $this->db->where_in('r.id_gejala', $id_rule);
        $this->db->group_by("p.id_penyakit");
        $this->db->order_by("total_bobot DESC");
        $query = $this->db->get();
        // var_dump($query);exit();
        return $query->result_array();
    }

// get detail di form edit rule
    function get_detail($id_konsultasi)
	{
		$this->db->select('k.*');
		$this->db->select('p.*');
		$this->db->from('konsultasi k');
		$this->db->join('penyakit p','p.id_penyakit = k.id_penyakit');
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

   // menghapus rule 
   function deletediagnosa_model($id){
    $this->db->where('id_konsultasi', $id);
    $delete = $this->db->delete('konsultasi');
    }
}
?>