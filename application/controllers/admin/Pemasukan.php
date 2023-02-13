<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Pemasukan extends CI_Controller {
    
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('model_login');
        $this->model_login->keamanan();
        $this->load->model('Pemasukan_model','pemasukan_model');
    }
    public function index()
    {
        $data['title'] = 'Pemasukan';
        $data['sumber_masuk'] = $this->pemasukan_model->get_category()->result();
        $data['pemasukan'] = $this->pemasukan_model->get_data('pemasukan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/pemasukan', $data);
        $this->load->view('templates/footer');
    }

   
    function get_sub_category(){
        $category_id = $this->input->post('id',TRUE);
        $data = $this->pemasukan_model->get_sub_category($category_id)->result();
        echo json_encode($data);
    }

    public function tambah_aksi()
    {
            $data = array (
            'category' => $this->input->post('category'),
            'jml_pemasukan' => $this->input->post('jml_pemasukan'),
			'catatan' => $this->input->post('catatan'),
            );

            $this->pemasukan_model->insert_data($data,'pemasukan');
		    
            $this->session->set_flashdata(
                "message", 
                '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    Berhasil menambahkan data!.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            redirect('admin/Pemasukan');
        }
		

        
        function update()
    {
        $id = $this->input->post('id');
        $category = $this->input->post('category');
        $jml_pemasukan = $this->input->post('jml_pemasukan');
		$catatan = $this->input->post('catatan');

 
		$data = array(
			'category' => $category,
            'jml_pemasukan' => $jml_pemasukan,
			'catatan' => $catatan,
			);
        $where = array(
            'id' => $id
        );
     
        $this->pemasukan_model->update_data($where,$data,'pemasukan');
        $this->session->set_flashdata(
            "message", 
            '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                Berhasil mengupdate data!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/Pemasukan');
    }


    
        public function delete($id)
        {
            $where = array('id' => $id);
            $this->pemasukan_model->delete($where,'pemasukan');
            redirect('admin/pemasukan');
    
    
        }

 
}