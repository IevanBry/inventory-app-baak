<?php
class User_model extends CI_Model {
    public $table = 'user';
    public $id = 'id_user';
    public function __construct() {
        parent::__construct();
    }
    public function get() {
        $this->db->select('user.*');
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getBy() {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where, $data) {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function deleteSelected($chcked_id){
        $this->db->where_in($this->id, $chcked_id);
        return $this->db->delete($this->table);
    }
}