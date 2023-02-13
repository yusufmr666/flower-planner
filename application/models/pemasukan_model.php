<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pemasukan_model extends CI_Model{
     
    function get_category(){
        $query = $this->db->get('sumber_masuk');
        return $query;  
    }

    public function get_data($table)
    {
        return $this->db->get($table); 
    }
 
    function get_sub_category($category_id){
        $query = $this->db->get_where('category', array('id' => $category_id));
        return $query;
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}
 

    function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	   

    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function filterbytanggal($tanggalawal,$tanggalakhir){
        $query = $this->db->query("SELECT *, jml_pemasukan as jumlah from pemasukan 
        where create_at between '$tanggalawal' and '$tanggalakhir' order by create_at asc");
       
        return $query->result();
    }

    function filterbybulan($tahun,$bulanawal,$bulanakhir){
        $query = $this->db->query("SELECT *, sum(jml_pemasukan) as jumlah from pemasukan where YEAR(create_at) = '$tahun' and MONTH(create_at) between $bulanawal and $bulanakhir GROUP by month(create_at) asc");
        return $query;
    }



     
}