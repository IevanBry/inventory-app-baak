<?php
class AdminRequest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Stock_model');
        $this->load->model('User_model');
        $this->load->model('Request_model');
        $this->load->model('History_model');

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    function index()
    {
        $data['title'] = 'Request';
        $data['icon'] = 'bx bx-chat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['request'] = $this->Request_model->getRequest();
        $data['total_proses'] = $this->Request_model->countProses();
        $data['total_setuju'] = $this->Request_model->countSetujuRequest();
        $data['total_tolak'] = $this->Request_model->countTolakRequest();
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
    public function verifRequest()
    {
        if ($this->input->post('terima')) {
            $this->acceptRequest();
        } else {
            $this->rejectRequest();
        }
    }

    private function acceptRequest()
    {
        $requestId = $this->input->post('request_id');

        $this->Request_model->updateStatus($requestId, 'Accepted');
        $requestData = $this->Request_model->getBy($requestId);
        $this->History_model->insert($requestData);
        $this->Request_model->delete($requestId);

        redirect('AdminRequest');
    }

    private function rejectRequest()
    {

        $requestId = $this->input->post('request_id');
        $this->Request_model->updateStatus($requestId, 'Rejected');
        $requestData = $this->Request_model->getBy($requestId);
        $this->History_model->insert($requestData);
        $this->Request_model->delete($requestId);

        redirect('AdminRequest');
    }
}
