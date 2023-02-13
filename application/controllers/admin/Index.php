<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Index extends CI_Controller {
    
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('model_login');
        $this->model_login->keamanan();
        $this->load->model('Pengeluaran_model','pengeluaran_model');
		
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['hari'] = $this->pengeluaran_model->get_day_data()->result();
        $data['bulan'] = $this->pengeluaran_model->get_month_data()->result();
        $data['total'] = $this->pengeluaran_model->get_data('pengeluaran')->result();
        $data['datafiltermsk'] = $this->pengeluaran_model->filterbybulan()->result();

      
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');

    }

    public function filtermsk(){

        $tahun = $this->input->post('tahun');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');

        $data['titlee'] = 'Laporan Pengeluaran';
        $data['titlelapp'] = ' Grafik Bulanan Data Pengeluaran Tahun <b>'.$tahun.'</b>';
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/lap_grafik', $data);
        $this->load->view('templates/footer');
    }
}