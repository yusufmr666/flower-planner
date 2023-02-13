<?php

class Model_login extends CI_Model {
    public function __construct()
    {
		parent::__construct();
	}

	public function ambillogin($username,$password)
	{
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get('user');
        if ($query->num_rows()>0){
            foreach ($query->result() as $row){
                $sess = array ('username' => $row->username,
                'password'=>$row->password);
            }
        $this->session->set_userdata($sess);
        redirect('admin/index');
        } else {
        $this->session->set_flashdata( "message", 
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Password salah.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('login');
        }
	}

    public function keamanan(){
        $username = $this->session->userdata('username');
        if(empty($username)){ 
            $this->session->sess_destroy();
            redirect('login');
        }
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

}