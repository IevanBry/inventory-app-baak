<?php

defined('BASEPATH') or exit('No direct script access allowed');

class BaseController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $this->load->model('Stock_model');
        $this->load->model('Kategori_model');
    }

    function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->Stock_model->get();
        $data['icon'] = 'bx bx-home';
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/index');
        $this->load->view('layout/footer');
    }

    function user()
    {
        $data['title'] = 'User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['icon'] = 'bx bx-user';
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/user');
        $this->load->view('layout/footer');
    }

    function report()
    {
        $data['title'] = 'Report';
        $data['icon'] = 'bx bx-file-find';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/report');
        $this->load->view('layout/footer');
    }

    function request()
    {
        $data['title'] = 'Request';
        $data['icon'] = 'bx bx-chat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/request');
        $this->load->view('layout/footer');
    }

    function notif()
    {
        $data['title'] = 'Notification';
        $data['icon'] = 'bx bx-bell';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/notif');
        $this->load->view('layout/footer');
    }

    function stock()
    {
        $data['title'] = 'Stock';
        $data['icon'] = 'bx bx-package';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->Stock_model->get();
        $data['kategori'] = $this->Kategori_model->get();
        $data['stok_rendah'] = $this->Stock_model->getJumlahBarangTerendah();
        $data['total'] = $this->Stock_model->getTotalBarang();
        $this->load->view('layout/header',$data);
        $this->load->view('stock/index', $data);
        $this->load->view('layout/footer');
    }

}
