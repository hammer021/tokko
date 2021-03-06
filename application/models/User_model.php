<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    // Users Data
    public function getUserData()
    {
        $query = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
        return $query->row_array();
    }
    public function getUserDataAll()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

 public function getAll()
    {
        $this->db->select('account.*');
        $this->db->from('account');
        $this->db->where('account.id_role','2');
        $query = $this->db->get()->result();
        return $query;
    }
    // Login
    public function userCheckLogin($username)
    {
        $this->db->where("email =  '$username' or username =  '$username'");
        $query = $this->db->get('user');
        return $query->row_array();
    }
}
