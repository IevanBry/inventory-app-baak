<?php
class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_model');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }


    function index()
    {
        $data['title'] = 'Report';
        $data['icon'] = 'bx bx-file-find';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['report'] = $this->Report_model->get();
        $data['total_pemasukan'] = $this->Report_model->getTotalPemasukan();
        $data['total_pengeluaran'] = $this->Report_model->getTotalPengeluaran();
        $data['history_pemasukan'] = $this->Report_model->getHistoryPemasukan();
        $data['history_pengeluaran'] = $this->Report_model->getHistoryPengeluaran();
        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/report', $data);
        $this->load->view('layout/footer');
    }
    public function insertPemasukan()
    {
        $report = [
            'tanggal' => $this->input->post('tanggal'),
            'jenis' => "pemasukan",
            'jumlah' => $this->input->post('jumlah')
        ];
        $this->Report_model->insert($report);
        $this->session->set_flashdata('status', 'Insert pemasukan berhasil');
        redirect('Report');
    }
}