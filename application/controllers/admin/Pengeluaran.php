<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Pengeluaran extends CI_Controller {
    
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('model_login');
        $this->model_login->keamanan();
        $this->load->model('Pengeluaran_model','pengeluaran_model');
    }
    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['kategory'] = $this->pengeluaran_model->get_data_category('kategory')->result();
        $data['pengeluaran'] = $this->pengeluaran_model->get_data('pengeluaran')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/pengeluaran', $data);
        $this->load->view('templates/footer');

    }

    
    function get_sub_category(){
        $category_id = $this->input->post('id_kel',TRUE);
        $data = $this->pengeluaran_model->get_sub_category($category_id)->result();
        echo json_encode($data);
    }

    public function tambah_aksi()
    {
        $data_pem = "0";
        $data_peng = "0";
        $coba =  $this->input->post('tes');
        $jml_pengeluaran = $this->input->post('jml_pengeluara');

        if($coba === "1"){
            $data_peng = $jml_pengeluaran;            
        }else {
            $data_pem = $jml_pengeluaran;
        }

            $data = array (
            'category' => $this->input->post('category'),
            'jml_pengeluaran' => $data_peng,
            'jml_pemasukan' => $data_pem,
			'catatan' => $this->input->post('catatan'),
            'create_at' => $this->input->post('tanggal'),
            'id_jenis' => $coba
            );

            $this->pengeluaran_model->insert_data($data,'pengeluaran');
		    
            $this->session->set_flashdata(
                "message", 
                '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    Berhasil menambahkan data!.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('admin/Pengeluaran');
        }
		

        function update()
    {

        $data_pem = "0";
        $data_peng = "0";
        $coba =  $this->input->post('tes');
        $jml_pengeluaran = $this->input->post('jml_pengeluaran');

        if($coba === "1"){
            $data_peng = $jml_pengeluaran;            
        }else {
            $data_pem = $jml_pengeluaran;
        }

        $id = $this->input->post('id');
        $category = $this->input->post('category');
		$catatan = $this->input->post('catatan');
        $create_at = $this->input->post('tanggal');

 
		$data = array(
			'category' => $category,
            'jml_pengeluaran' =>  $data_peng,
            'jml_pemasukan' => $data_pem,
			'catatan' => $catatan,
			'create_at' => $create_at,
			);
        $where = array(
            'id' => $id
        );
     
        $this->pengeluaran_model->update_data($where,$data,'pengeluaran');
        $this->session->set_flashdata(
            "message", 
            '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                Berhasil mengupdate data!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/Pengeluaran');
    }
    
        public function delete($id)
        {
            $where = array('id' => $id);
            $this->pengeluaran_model->delete($where,'pengeluaran');
            redirect('admin/pengeluaran');
    
    
        }

        

}