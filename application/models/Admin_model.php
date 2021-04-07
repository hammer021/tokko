<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
    public function getUserRoleById($role_id)
    {
        return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
    }
    public function getData($user,$pass)
    {
        $this->db->select('account.*');
        $this->db->from('account');
		$this->db->where('username',$user);
        $this->db->where('password',$pass);
        $query = $this->db->get()->result();
        return $query;

    }
    public function getUserRoleAll()
    {
        return $this->db->get('user_role')->result_array();
    }
    public function searchUserData()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('name', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('username', $keyword);
        return $this->db->get('user')->result_array();
    }
}
