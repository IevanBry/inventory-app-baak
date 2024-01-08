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
        $error = $this->db->error();
        if ($error['code'] != 0) {
            // Handle database error if needed
        } else {
            $redirect_page = $this->input->post('redirect_page');
            $id = $this->input->post('id');
            $qty = $this->input->post('qty');
            $price = $this->input->post('harga');
            $name = $this->input->post('name');

            // Check if cart is empty
            if ($this->cart->total_items() > 0) {
                $data = array(
                    'id' => $id,
                    'qty' => $qty,
                    'price' => $price,
                    'name' => $name,
                );
                $this->cart->insert($data);
            } else {
                // Cart is empty, redirect with a flash message
                $this->session->set_flashdata('error', 'Keranjang harus diisi.');
            }
        }
        redirect($redirect_page);
    }


    public function delete($rowid)
    {
        print_r($this->session->userdata());
        $this->cart->remove($rowid);
        redirect('user/barang', );
    }
    public function deleteAll()
    {
        if ($this->cart->total_items() > 0) {
            $this->cart->destroy();
            redirect('user/barang');
        } else {
            redirect('user/barang');
        }
    }
}