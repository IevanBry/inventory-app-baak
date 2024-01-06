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
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/request');
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
}
