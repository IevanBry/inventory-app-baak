<?php
class Report_model extends CI_Model
{
    public $table = 'transaksi';
    public $id = 'id_transaksi';
    public function __construct()
    {
        parent::__construct();
    }

    function get()
    {
        $this->db->select('transaksi.*, barang.nama_barang');
        $this->db->from('transaksi');
        $this->db->join('barang', 'transaksi.id_transaksi = barang.id_barang', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getBy()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function getTotalPemasukan()
    {
        $this->db->select('sum(jumlah) as total_pemasukan');
        $this->db->from('transaksi');
        $this->db->where('jenis = "pemasukan"');
        $query = $this->db->get();
        return $query->row()->total_pemasukan;
    }
    public function getTotalPengeluaran()
    {
        $this->db->select('sum(jumlah) as total_pengeluaran');
        $this->db->from('transaksi');
        $this->db->where('jenis = "pengeluaran"');
        $query = $this->db->get();
        return $query->row()->total_pengeluaran;
    }
    public function getHistoryPemasukan()
    {
        $this->db->select('jumlah, tanggal');
        $this->db->from('transaksi');
        $this->db->where('jenis', 'pemasukan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getHistoryPengeluaran()
    {
        $this->db->select('jumlah, tanggal');
        $this->db->from('transaksi');
        $this->db->where('jenis', 'pengeluaran');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function insertPengeluaran($data)
    {
        return $this->db->insert('transaksi', $data);
    }
    public function getTotalTransaksi()
    {
        $this->db->select('count(*) as total_transaksi');
        $this->db->from('transaksi');
        $query = $this->db->get();
        return $query->row()->total_transaksi;
    }
    public function getTotalPengeluaranPerBulan($year)
    {
        $totalPengeluaranPerBulan = array();

        for ($month = 1; $month <= 12; $month++) {
            $this->db->select('sum(jumlah) as total_pengeluaran_bulanan');
            $this->db->from('transaksi');
            $this->db->where('jenis', 'pengeluaran');
            $this->db->where('YEAR(tanggal)', $year);
            $this->db->where('MONTH(tanggal)', $month);
            $query = $this->db->get();

            $totalPengeluaranPerBulan[$month] = $query->row()->total_pengeluaran_bulanan;
        }

        return $totalPengeluaranPerBulan;
    }
}