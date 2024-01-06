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

    public function insertRequest()
    {
        $qtyArray = $this->input->post('qty');
        $idBarangArray = $this->input->post('id_barang');
        $id = $this->input->post('id_user');
        for ($i = 0; $i < count($qtyArray); $i++) {
            $data = array(
                'jumlah' => $qtyArray[$i],
                'id_barang' => $idBarangArray[$i],
                'id_user' => $id,
                'status' => 'Proses',
            );
            $this->Request_model->insert($data);
        }
        $this->cart->destroy();
        redirect('User/Barang');
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
