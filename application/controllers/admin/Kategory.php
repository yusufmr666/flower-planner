<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Kategory extends CI_Controller {
    
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('model_login');
        $this->model_login->keamanan();
        $this->load->model('Pengeluaran_model','pengeluaran_model');

    }
    public function index()
    {
        $data['title'] = 'Kategori';
        $data['kategory'] = $this->pengeluaran_model->get_category('kategory')->result_array();
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/kategory', $data);
        $this->load->view('templates/footer');

    }

    public function tambah_aksi()
    {
        $category = $this->input->post("category");

		$data = [
			"category" => $category,
		];

		$this->db->insert("kategory",$data);
		
		$this->session->set_flashdata(
			"message", 
			'<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
				Berhasil menambahkan data!.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
		);
		redirect('admin/Kategory');
	}

    public function update()
    {
        $id_kel = $this->input->post('id_kel');
        $category = $this->input->post('category');


		$data = array(
			'category' => $category,
        );

        $where = array(
            'id_kel' => $id_kel
        );
     
        $this->pengeluaran_model->update_data($where,$data,'kategory');
        $this->session->set_flashdata(
            "message", 
            '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                Berhasil mengupdate data!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/Kategory');
    }
    

    public function delete($id_kel)
    {
        $where = array('id_kel' => $id_kel);
        $this->pengeluaran_model->delete($where,'kategory');
        redirect('admin/Kategory');


    }

}