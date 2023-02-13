<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Karyawan extends CI_Controller {
    
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('model_login');
        $this->model_login->keamanan();
        $this->load->model('Pemasukan_model','pemasukan_model');
        $this->load->model('Pengeluaran_model','pengeluaran_model');


    }
    public function index()
    {
        $data['title'] = 'Karyawan';
        $data['karyawan'] = $this->pemasukan_model->get_data('karyawan')->result_array();
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/karyawan', $data);
        $this->load->view('templates/footer');

    }

    public function tambah_aksi()
    {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$posisi = $this->input->post('posisi');
	

		$data = array(
			'nama' => $nama,
            'alamat' => $alamat,
			'no_telp' => $no_telp,
			'posisi' => $posisi,
        );

		$this->db->insert('karyawan',$data);
		
		$this->session->set_flashdata(
			"message", 
			'<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
				Berhasil menambahkan data!.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>'
		);
		redirect('admin/Karyawan');
	}

    function edit()
    {
        $id_kar = $this->input->post('id_kar');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$posisi = $this->input->post('posisi');
	

		$data = array(
			'nama' => $nama,
            'alamat' => $alamat,
			'no_telp' => $no_telp,
			'posisi' => $posisi,
        );

        $where = array(
            'id_kar' => $id_kar
        );
     
        $this->pemasukan_model->update_data($where,$data,'karyawan');
        $this->session->set_flashdata(
            "message", 
            '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                Berhasil mengupdate data!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
        );
        redirect('admin/Karyawan');
    }
    

    public function delete($id_kar)
    {
        $where = array('id_kar' => $id_kar);
        $this->pemasukan_model->delete($where,'karyawan');
        redirect('admin/karyawan');


    }

}