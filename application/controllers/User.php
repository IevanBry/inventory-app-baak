<?php


class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('Stock_model');
        $this->load->model('Request_model');
        $this->load->model('History_model');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['icon'] = 'bx bx-home';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $data['user']['id_user'];
        $data['terima'] = $this->History_model->getTotalAcceptedById($user_id);
        $data['proses'] = $this->Request_model->countProsesRequests($user_id);
        $data['tolak'] = $this->History_model->getTotalRejectedById($user_id);
        $data['history'] = $this->History_model->getHistoryRequestUser($user_id);
        $this->load->view("layout/header", $data);
        $this->load->view("User/index");
        $this->load->view("layout/footer");
    }
    public function barang()
    {
        $data['title'] = 'Barang';
        $data['icon'] = 'bx bx-store';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->Stock_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("User/barang");
        $this->load->view("layout/footer");
    }
    public function request()
    {
        $data['title'] = 'Pengajuan';
        $data['icon'] = 'bx bx-chat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->Stock_model->get();
        $user_id = $data['user']['id_user'];
        $data['request'] = $this->Request_model->getForUser($user_id);
        $data['proses'] = $this->Request_model->countProsesRequests($user_id);
        $data['setuju'] = $this->Request_model->countSetuju($user_id);
        $data['tolak'] = $this->Request_model->countTolak($user_id);
        $this->load->view('layout/header', $data);
        $this->load->view('user/request', $data);
        $this->load->view('layout/footer');
    }
    public function history()
    {
        $data['title'] = 'History';
        $data['icon'] = 'bx bx-chat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $data['user']['id_user'];
        $data['history'] = $this->History_model->getHistoryRequestUser($user_id);
        $this->load->view('layout/header', $data);
        $this->load->view('user/history', $data);
        $this->load->view('layout/footer');
    }
}
