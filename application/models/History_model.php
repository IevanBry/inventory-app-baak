<?php
class History_model extends CI_Model
{
    public $table = 'history';
    public $id = 'id_history';
    public function __construct()
    {
        parent::__construct();
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
    function getHistoryRequest()
    {
        $this->db->select('history.*, barang.nama_barang, user.nama');
        $this->db->from('history');
        $this->db->join('barang', 'barang.id_barang = history.id_barang', 'inner');
        $this->db->join('user', 'user.id_user = history.id_user', 'inner');
        $this->db->where('user.role', 'user');
        $this->db->where('history.status', 'accepted');
        $this->db->or_where('history.status', 'rejected');
        $this->db->order_by('history.tanggal', 'DESC');
        $query = $this->db->get();

        if (!$query) {
            echo $this->db->error()['message'];
            die;
        }

        return $query->result_array();
    }
    function getHistoryRequestUser($id_user)
    {
        $this->db->select('history.*, barang.nama_barang, user.nama');
        $this->db->from('history');
        $this->db->join('barang', 'barang.id_barang = history.id_barang', 'inner');
        $this->db->join('user', 'user.id_user = history.id_user', 'inner');
        $this->db->where('user.role', 'user');
        $this->db->where('history.id_user', $id_user);
        $this->db->where('history.status', 'accepted');
        $this->db->or_where('history.status', 'rejected');
        $this->db->order_by('history.tanggal', 'DESC');

        $query = $this->db->get();

        return $query->result_array();
    }
    function getTotalRejected()
    {
        $this->db->select('count(*) as total_rejected');
        $this->db->from('history');
        $this->db->where('status', 'rejected');
        $query = $this->db->get();
        return $query->row()->total_rejected;
    }
    function getTotalAccepted()
    {
        $this->db->select('count(*) as total_accepted');
        $this->db->from('history');
        $this->db->where('status', 'accepted');
        $query = $this->db->get();
        return $query->row()->total_accepted;
    }
    function getBarangKeluar()
    {
        $this->db->select('count(*) as barang_keluar');
        $this->db->from('history');
        $this->db->where('status', 'accepted');
        $query = $this->db->get();
        return $query->row()->barang_keluar;
    }
}