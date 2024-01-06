<?php
class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('cart');
    }


    function index()
    {

    }
    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('harga');
        $name = $this->input->post('name');
        $data = array(
            'id' => $id,
            'qty' => $qty,
            'price' => $price,
            'name' => $name,
        );
        $this->cart->insert($data);
        // $this->session->sess_destroy();
        $this->session->unset_userdata('cart');
        redirect($redirect_page,'refresh');

    }
}