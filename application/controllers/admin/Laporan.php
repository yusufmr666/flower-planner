<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Laporan extends CI_Controller {
    
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('model_login');
        $this->model_login->keamanan();
        $this->load->model('Pengeluaran_model','pengeluaran_model');

    }
    public function index()
    {
        $data['title'] = 'Cetak Laporan';
        $data['kategory'] = $this->pengeluaran_model->get_category('kategory')->result();
       
        $kategori = $this->input->post('category');
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');

        $data['pengeluaran'] = $this->pengeluaran_model->ambil_data($kategori, $tanggalawal,$tanggalakhir);

        if(isset($_POST['submit'])){
            $tanggalawal = $this->input->post('tanggalawal');
            $tanggalakhir = $this->input->post('tanggalakhir');
            $kategori = $this->input->post('category');
            $data['title_pdf'] = 'Laporan Transaksi';
            $data['awal'] = $tanggalawal;
            $data['akhir'] = $tanggalakhir;
    
            $data['datafilter'] = $this->pengeluaran_model->filterbytanggal($kategori, $tanggalawal,$tanggalakhir)->result();
            $this->load->library('pdfgenerator');
        
            // title dari pdf
            
            
            // filename dari pdf ketika didownload
            $file_pdf = 'laporan_penjualan_toko_kita';
            // setting paper
            $paper = 'A4';
            //orientasi paper potrait / landscape
            $orientation = "portrait";
            
            $html = $this->load->view('admin/data_laporan', $data , true) ;    
            
            // run dompdf
            $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
            }



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/footer');

    }
        
}