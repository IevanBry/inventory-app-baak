<?php
class HistoryUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('History_model');

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    function index()
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
