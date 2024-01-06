<?php
class Request extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Stock_model');
        $this->load->model('kategori_model');
        $this->load->model('User_model');
        
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = 'Request';
        $data['icon'] = 'bx bx-chat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/request');
        $this->load->view('layout/footer');
    }

    public function verifikasi()
    {

    }
    public function tambahKeranjang()
    {
        
    }
}
