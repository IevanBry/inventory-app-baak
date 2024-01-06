<?php
class Cart extends CI_Controller
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
        $data = array(
            'id_barang' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'harga' => $this->input->post('harga'),
            'name' => $this->input->post('name'),
        );
        print_r($data);
        $this->cart->insert($data);
        print_r($this->cart->contents());
        // redirect($redirect_page,'refresh');
    }
}