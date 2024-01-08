<?php
class Request_model extends CI_Model
{
    public $table = 'request';
    public $id = 'id_request';
    public function __construct()
    {
        parent::__construct();
    }

    function getRequest()
    {
        $this->db->select('request.*, barang.nama_barang, user.nama');
        $this->db->from('request');
        $this->db->join('barang', 'barang.id_barang = request.id_barang', 'inner');
        $this->db->join('user', 'user.id_user = request.id_user', 'inner');
        $this->db->where('user.role', 'user');
        $this->db->order_by('request.tanggal', 'DESC');
        $query = $this->db->get();

        if (!$query) {
            echo $this->db->error()['message'];
            die;
        }

        return $query->result_array();
    }

    function getForUser($id_user)
    {
        $this->db->select('request.*, barang.nama_barang');
        $this->db->from('request');
        $this->db->join('barang', 'barang.id_barang = request.id_barang AND request.id_user = ' . $id_user, 'inner');
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
    public function updateStatus($id_request, $status)
    {
        $data = array(
            'status' => $status
        );

        $this->db->where('id_request', $id_request);
        $this->db->update("request", $data);

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
    public function countProsesRequests($id)
    {
        $this->db->select('COUNT(*) as total_proses_requests');
        $this->db->from('request');
        $this->db->where('id_user', $id);
        $this->db->where('status', 'Proses');

        $query = $this->db->get();
        $result = $query->row();

        return $result->total_proses_requests;
    }
    public function countSetuju($id)
    {
        $this->db->select('COUNT(*) as total_proses_requests');
        $this->db->from('request');
        $this->db->where('id_user', $id);
        $this->db->where('status', 'Diterima');

        $query = $this->db->get();
        $result = $query->row();

        return $result->total_proses_requests;
    }
    public function countTolak($id)
    {
        $this->db->select('COUNT(*) as total_proses_requests');
        $this->db->from('request');
        $this->db->where('id_user', $id);
        $this->db->where('status', 'Ditolak');

        $query = $this->db->get();
        $result = $query->row();

        return $result->total_proses_requests;
    }
}