<?php
class Report_model extends CI_Model
{
    public $table = 'transaksi';
    public $id = 'id_transaksi';
    public function __construct()
    {
        parent::__construct();
    }
    // Stock_model.php

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
    public function getPemasukanHistory()
    {
        $this->db->select('jumlah, tanggal');
        $this->db->from('transaksi');
        $this->db->where('jenis = "pemasukan"');
        $query = $this->db->get();
        return $query->row();
    }
    public function getPengeluaranHistory()
    {
        $this->db->select('jumlah, tanggal');
        $this->db->from('transaksi');
        $this->db->where('jenis = "pengeluaran"');
        $query = $this->db->get();
        return $query->row();
    }
    public function getPemasukan()
    {
        $this->db->select('sum(jumlah) as total_pemasukan');
        $this->db->from('transaksi');
        $this->db->where('jenis = "pemasukan"');
        $query = $this->db->get();
        return $query->row()->total_pemasukan;
    }
    public function getPengeluaran()
    {
        $this->db->select('sum(jumlah) as total_pengeluaran');
        $this->db->from('transaksi');
        $this->db->where('jenis = "pengeluaran"');
        $query = $this->db->get();
        return $query->row()->total_pengeluaran;
    }
}