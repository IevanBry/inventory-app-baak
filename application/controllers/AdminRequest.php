<?php
class Request extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Stock_model');
        $this->load->model('User_model');
        $this->load->model('Request_model');


        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = 'Request';
        $data['icon'] = 'bx bx-chat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['request'] = $this->Request_model->getRequest();
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/request', $data);
        $this->load->view('layout/footer');
    }
    public function deleteRequest()
    {
        $id_request = $this->input->post('id_request');

        if (!empty($id_request)) {
            $this->Request_model->delete($id_request);
        }

        $this->session->set_flashdata('status', 'Barang Selected Data Deleted');
        redirect('User/Request');
    }
}
