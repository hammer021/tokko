<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	//function __construct(){
	//	parent::__construct();
	
	//	if($this->session->userdata('status') != "login"){
	//		redirect(site_url("Login"));
	//	}
	//}
	
	public function index()
	{
		$this->load->model('produk_model');
		$data["produk"] = $this->produk_model->getAll();
		$this->load->view('home',$data);
    }
    
    public function produk()
    {
		
		
	
	}

	public function reseller()
    {
        redirect(site_url("Reseller"));
	}

	public function profil()
    {
        $this->load->view('vProfilPerusahaan');
	}
	
	public function shop()
    {
        redirect(site_url("Shop"));
	}
	public function kontak()
    {
        $this->load->view('vkontak');
	}
	public function Keranjang()
    {
        redirect(site_url("Keranjang"));
	}

}
