<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($table)
    {
        $res = $this->db->get($table);
        return $res->result_array();
    }

    public function Insert($table, $data)
    {
        $res = $this->db->insert($table, $data);
        return $res;
    }

    public function Update($table, $data, $where)
    {
        $res = $this->db->update($table, $data, $where);
        return $res;
    }

    public function Delete($table, $where)
    {
        $res = $this->db->delete($table, $where);
        return $res;
    }

    public function GetWhere($table, $data)
    {
        $res = $this->db->get_where($table, $data);
        return $res->result_array();
    }

    public function CekLogin($table, $data)
    {
        $res = $this->db->get_where($table, $data);
        return $res;
    }
    public function register_user($data)
    {
        $this->db->insert('user', $data);

        return $this->db->insert_id();
    }

    public function register_customer($data)
    {
        $this->db->insert('customer', $data);

        return $this->db->insert_id();
    }

    public function cari($keyword)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->like('email', $keyword);
        return $this->db->get()->result_array();
    }
}
