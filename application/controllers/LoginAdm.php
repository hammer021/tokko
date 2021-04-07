<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginAdm extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('Admin_model');
 
	}
 
	function index(){
		$this->load->view('vloginAdm');
	}
 
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password,
			'id_role'  => '1'
			);
		$cek = $this->Admin_model->cek_login("account",$where)->num_rows();
		if($cek > 0){
				$data_session = array(
					'nama' => $username,
					'status' => "login"
					);
		 
				$this->session->set_userdata($data_session);
		 
				redirect(base_url("HomeAdm"));
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('LoginAdm/index'));
	}
}
