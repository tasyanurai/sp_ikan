<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_rule extends CI_Model{
        
// mengambil data rule 
	function get_rule(){
        $this->db->select('*');
		$this->db->from('rule r');
		$this->db->join('gejala g','r.id_gejala = g.id_gejala');
		$this->db->join('penyakit p','r.id_penyakit = p.id_penyakit');

		$query = $this->db->get();
		return $query->result_array();
      
    }

// menambahkan data rule 
    function add_data_rule($data) {
        
        $query = $this->db->insert('rule',$data);
        return $query;
    
    }

// menambahkan data rule 
    function create_rule($data_gejala) {
        $rule = $this->db->insert('rule',$data);
        foreach($data_gejala as $key => $id_gejala) {
            $dataToSave[] = array(
                'id_gejala' => $id_gejala,
                'id_rule' => $rule->insert_id()
            );
        }
        var_dump($dataToSave); die();
        return $query;
    }

// get detail di form edit rule
    function get_detail($id_rule)
	{
		$this->db->select('r.*');
		$this->db->select('g.*');
        $this->db->select('p.*');
		$this->db->from('rule r');
		$this->db->join('gejala g','r.id_gejala = g.id_gejala');
		$this->db->join('penyakit p','r.id_penyakit = p.id_penyakit');
		$this->db->where('id_rule', $id_rule);
		$hasil = $this->db->get();
		return $hasil->row();
	}

    function get_gejala($id_gejala){
        $this->db->select('*');
        $this->db->from('gejala', $id_gejala);
        $query = $this->db->get();
        // var_dump($query);exit();
        return $query->result_array();
    }

    function get_penyakit($id_penyakit){
        $this->db->select('*');
        $this->db->from('penyakit', $id_penyakit);
        $query = $this->db->get();
        // var_dump($query);exit();
        return $query->result_array();
    }
    
    function update_rule($id_rule, $data){
		$this->db->where('id_rule',$id_rule);
		$query = $this->db->update('rule',$data);
		return $query;
	}

    public function cek_kode($kd_rule){
        $this->db->select('*');
        $this->db->from('rule');
        $this->db->where('kd_rule = ',$kd_rule);
        $query = $this->db->get();
        return $query;
      }

   // menghapus rule 
   function deleterule_model($id){
    $this->db->where('id_rule', $id);
    $delete = $this->db->delete('rule');
    }
}
?>