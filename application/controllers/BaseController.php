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
        $this->load->model('User_model');
        $this->load->model('Report_model');
        $this->load->model('Request_model');
        $this->load->model('History_model');
    }

    function index()
    {
        $data['title'] = 'Dashboard';
        $data['active'] = 'text-amber-400';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->Stock_model->get();
        $data['stok_barang'] = $this->Stock_model->getTotalBarang();
        $data['stok_rendah'] = $this->Stock_model->getJumlahBarangTerendah();
        $data['total_kategori'] = $this->Kategori_model->getTotalKategori();
        $data['barang_habis'] = $this->Stock_model->getJumlahBarangHabis();
        $data['jumlah_stok'] = $this->Stock_model->getJumlahStok();
        $data['total_staff'] = $this->User_model->getTotalStaff();
        $data['total_user'] = $this->User_model->getTotalUser();
        $data['barang_tersedia'] = $this->Stock_model->getTotalBarangTersedia();
        $data['total_pemasukan'] = $this->Report_model->getTotalPemasukan();
        $data['total_pengeluaran'] = $this->Report_model->getTotalPengeluaran();
        $data['total_transaksi'] = $this->Report_model->getTotalTransaksi();
        $data['pemesan'] = $this->Request_model->countPemesan();
        $data['total_request'] = $this->Request_model->countRequest();
        $data['barang_keluar'] = $this->History_model->getBarangKeluar();
        $data['total_reject'] = $this->History_model->getTotalRejected();
        $data['totalPengeluaranPerBulan'] = $this->Report_model->getTotalPengeluaranPerBulan(2024);
        $data['icon'] = 'bx bx-home';
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/index');
        $this->load->view('layout/footer');
    }

    function user()
    {
        $data['title'] = 'User';
        $data['icon'] = 'bx bx-user';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_list'] = $this->User_model->get();
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/user', $data);
        $this->load->view('layout/footer');
    }

    function report()
    {
        $data['title'] = 'Report';
        $data['icon'] = 'bx bx-file-find';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['report'] = $this->Report_model->get();
        $data['total_pemasukan'] = $this->Report_model->getTotalPemasukan();
        $data['total_pengeluaran'] = $this->Report_model->getTotalPengeluaran();
        $data['history_pemasukan'] = $this->Report_model->getHistoryPemasukan();
        $data['history_pengeluaran'] = $this->Report_model->getHistoryPengeluaran();
        $data['totalPengeluaranPerBulan'] = $this->Report_model->getTotalPengeluaranPerBulan(2024);
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/report', $data);
        $this->load->view('layout/footer');
    }

    function request()
    {
        $data['title'] = 'Request';
        $data['icon'] = 'bx bx-chat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['request'] = $this->Request_model->getRequest();
        $data['total_proses'] = $this->Request_model->countProses();
        $data['total_setuju'] = $this->History_model->getTotalAccepted();
        $data['total_tolak'] = $this->History_model->getTotalRejected();
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/request', $data);
        $this->load->view('layout/footer');
    }

    function notif()
    {
        $data['title'] = 'Notification';
        $data['icon'] = 'bx bx-bell';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['request'] = $this->Request_model->getRequest();
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/notif', $data);
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
        $data['jumlah_stok'] = $this->Stock_model->getJumlahStok();
        $data['barang_keluar'] = $this->History_model->getBarangKeluar();
        $data['total'] = $this->Stock_model->getTotalBarang();
        $this->load->view('layout/header', $data);
        $this->load->view('stock/index', $data);
        $this->load->view('layout/footer');
    }

    function history(){
        $data['title'] = 'History';
        $data['icon'] = 'bx bx-chat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['history'] = $this->History_model->getHistoryRequest();
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/history', $data);
        $this->load->view('layout/footer');
    }
}
