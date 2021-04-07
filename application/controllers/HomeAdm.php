<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeAdm extends CI_Controller {

	//function __construct(){
	//	parent::__construct();
	
	//	if($this->session->userdata('status') != "login"){
	//		redirect(site_url("Login"));
	//	}
	//}
	
	public function index()
	{
		$this->load->model('member_model');
		$this->load->model('produk_model');
		
		$data["users"] = $this->member_model->getAll();
		$data["barangs"] = $this->produk_model->getAll();
		$this->load->view('vHomeAdm',$data);
    }
    
    public function barang()
    {
        redirect(site_url("Produk"));
	}

	public function member()
    {
        redirect(site_url("Member"));
	}

	public function charts()
    {
        $this->load->view('vcharts');
	}
	
	public function shop()
    {
        $this->load->view('Shop');
	}
	public function transaksi()
    {
        redirect(site_url("Transaksi"));
	}
}
