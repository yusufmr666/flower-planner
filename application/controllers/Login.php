<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
        $this->load->view("login");
	
	}

	public function ceklogins()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('model_login');
		$this->model_login->ambillogin($username,$password);

	}

	public function aksi_logout()
    {
        $this->session->sess_destroy();
        redirect("login");
    }

	
}