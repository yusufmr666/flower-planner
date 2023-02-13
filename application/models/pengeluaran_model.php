<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Pengeluaran_model extends CI_Model{
     
    function get_category($table){
        $query = $this->db->get($table);
        return $query;  
    }

    public function get_data($table)
    {
        $this->db->order_by('create_at', 'desc');
        return $this->db->get($table); 
    }
 
    public function get_data_category($table)
    {
        $this->db->order_by('category', 'asc');
        return $this->db->get($table); 
    }

    public function get_day_data()
    {
        $query = $this->db->query("SELECT * FROM pengeluaran WHERE date(create_at) = curdate()");
        return $query;
    }

    public function get_month_data()
    {
        return $this->db->query("SELECT * FROM pengeluaran WHERE MONTH(create_at) = MONTH(CURRENT_DATE())");
    }
 
    function get_sub_category($category_id){
        $query = $this->db->get_where('category', array('id_kel' => $category_id));
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

    function filterbytanggal($kategori,$tanggalawal,$tanggalakhir){
        $query = $this->db->query("SELECT *, jml_pengeluaran, jml_pemasukan from pengeluaran 
        where category='$kategori' and create_at between '$tanggalawal' and '$tanggalakhir' order by create_at asc");
       
        return $query;
    }

    function filterbybulan(){
        $query = $this->db->query("SELECT *, sum(jml_pengeluaran) as jumlah, sum(jml_pemasukan) as jumlah_msk from pengeluaran WHERE YEAR(create_at) = YEAR(CURRENT_DATE()) GROUP by month(create_at) asc");
        return $query;
    }


	function ambil_data($kategori,$tanggalawal,$tanggalakhir){
		$this->db->select('*,jml_pengeluaran, jml_pemasukan');
		$this->db->from('pengeluaran');
        $this->db->where("category='$kategori'");
		$this->db->where("create_at BETWEEN '$tanggalawal' AND '$tanggalakhir'");
		return $this->db->get()->result_array();
	}
     
}