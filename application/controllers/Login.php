<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('Admin_model');
 
	}
 
	function index(){
		$this->load->view('vlogin');
	}
 
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password,
			'id_role'  => '2'
			);
		$cek = $this->Admin_model->cek_login("account",$where)->num_rows();
		$cek2 = $this->Admin_model->cek_login("account",$where)->result();
		if($cek > 0){
				$data_session = array(
					'id_account' =>$cek2->id_account,
					'nama' => $username,
					'status' => "login"
					);
		 
				$this->session->set_userdata($data_session);
		 
				redirect(base_url("Home"));
		}else{
			echo "Username dan password salah !";
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Home'));
	}
}
