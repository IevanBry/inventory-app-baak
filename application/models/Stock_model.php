<?php
class Stock_model extends CI_Model
{
    public $table = 'barang';
    public $id = 'id_barang';
    public function __construct()
    {
        parent::__construct();
    }
    // Stock_model.php

    function get()
    {
        $this->db->select('barang.*, kategori.nama_kategori');
        $this->db->from('barang');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBy()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function get_image_by_id($id)
    {
        $this->db->select('gambar');
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();

        return $query->row()->gambar;
    }
    public function deleteSelected($checked_id)
    {
        $this->db->where_in($this->id, $checked_id);
        return $this->db->delete($this->table);
    }
    public function getJumlahBarangTerendah()
    {
        $this->db->select('nama_barang, MIN(stok) as min_stok');
        $this->db->from('barang');
        $query = $this->db->get();
        return $query->row()->min_stok;
    }

    public function getTotalBarang()
    {
        $this->db->select('COUNT(*) as total_barang');
        $this->db->from('barang');
        $query = $this->db->get();
        return $query->row()->total_barang;
    }
    public function getJumlahBarangHabis()
    {
        $this->db->select('COUNT(*) as barang_habis');
        $this->db->from('barang');
        $this->db->where('stok = 0');
        $query = $this->db->get();
        return $query->row()->barang_habis;
    }
    public function getTotalBarangTersedia()
    {
        $this->db->select('COUNT(*) as barang_tersedia');
        $this->db->from('barang');
        $this->db->where('stok <> 0');
        $query = $this->db->get();
        return $query->row()->barang_tersedia;
    }
    public function getStokBarangById($id)
    {
        $this->db->select('stok');
        $this->db->from('barang');
        $this->db->where('id_barang', $id);
        $query = $this->db->get();
        return $query->row()->stok;
    }
    public function updateJumlahStokById($id_barang, $new_jumlah)
    {
        $data = array(
            'stok' => $new_jumlah
        );

        $this->db->where('id_barang', $id_barang);
        $this->db->update("barang", $data);

        return $this->db->affected_rows();
    }
    public function getHargaBarangById($id)
    {
        $this->db->select('harga');
        $this->db->from('barang');
        $this->db->where('id_barang', $id);
        $query = $this->db->get();
        return $query->row()->harga;
    }
    public function getJumlahStok()
    {
        $this->db->select('SUM(stok) as total_stok');
        $this->db->from('barang');
        $query = $this->db->get();
        return $query->row();
    }

}