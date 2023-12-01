<?php 


class Stock extends CI_Controller {
    public function __construct() {
        parent::__construct(); 
    }

    
    function index()
    {
        $data['title'] = 'Stock';
        $data['icon'] = 'bx bx-package';
        $data['user'] = 'admin';
        $this->load->view('layout/header',$data);
        $this->load->view('stock//index');
        $this->load->view('layout/footer');
    }

    function edit()
    {
        $data['title'] = 'Stock';
        $data['icon'] = 'bx bx-package';
        $this->load->view('layout/header',$data);
        $this->load->view('stock/edit');
        $this->load->view('layout/footer');
    }

    function editStock() {
        
    }

     
}