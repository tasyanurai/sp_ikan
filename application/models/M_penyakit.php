<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_penyakit extends CI_Model{
        
// mengambil data penyakit 	
	function get_penyakit(){
        $this->db->select('*');
        $this->db->from('penyakit');
        $query = $this->db->get();
        // var_dump($query);exit();
        return $query->result_array();
      
    }

// mengambil data penyakit di tabel rule 
    function get_rule_penyakit() {
        $this->db->select('GROUP_CONCAT(g.kd_gejala SEPARATOR ", ") kd_rule_p, p.*');
        $this->db->from('penyakit p');
        $this->db->join('rule r', 'r.id_penyakit = p.id_penyakit', 'left');
        $this->db->join('gejala g', 'g.id_gejala = r.id_gejala', 'left');
        $this->db->group_by("p.id_penyakit");
        $query = $this->db->get();
        
        return $query->result_array();
    }

// mengambil data gejala di tabel rule 
	function get_gejala_rule($id_penyakit){
        $this->db->select('g.*, r.*');
        $this->db->from('rule r');
        $this->db->join('gejala g', 'g.id_gejala = r.id_gejala ');
		$this->db->where('r.id_penyakit', $id_penyakit);
        $query = $this->db->get();
        
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
        $this->db->select('GROUP_CONCAT(g.kd_gejala SEPARATOR ", ") kd_rule_p, p.*');
        $this->db->from('penyakit p');
        $this->db->join('rule r', 'r.id_penyakit = p.id_penyakit');
        $this->db->join('gejala g', 'g.id_gejala = r.id_gejala');
		$this->db->where('p.id_penyakit', $id_penyakit);
		$hasil = $this->db->get();
		return $hasil->row();
	}

    function delete_rule($id_penyakit) {
        $this->db->where('id_penyakit', $id_penyakit);
        $this->db->delete('rule');
    }

    function insert_rule($id_penyakit, $rule_ids) {
        $this->db->insert_batch('rule', array_map(function ($rule_id) use ($id_penyakit) {
            return [
                'id_penyakit' => $id_penyakit,
                'id_gejala' => $rule_id,
            ];
        }, $rule_ids));
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