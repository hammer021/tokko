<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("produk_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["barang"] = $this->produk_model->getAll();
        $this->load->view("vbarang",$data);
    }
    public function add()
    {
        $produk = $this->produk_model;
        $validation = $this->form_validation;
        $validation->set_rules($produk->rules());

        if ($validation->run()) {
            $produk->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        redirect(site_url("Produk"));
    }
    
    public function edit()
    {
        $id_produk = $this->input->post('id_produk');
		$nama_produk = $this->input->post('nama_produk');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
        if ($id_produk !== null) {
			$where = array(
				'id_produk'          		=> $id_produk
			);
			$data = array(
				'nama_produk'         	=> $nama_produk,
				'harga'         		=> $harga,
				'stok'         		    => $stok

			);
			$this->produk_model->update_data($where, $data);

			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('data Berhasil Di simpan');</script>";
			}
			redirect(site_url("HomeAdm/barang"));
		}
        else {
			$error = array('error' => $this->upload->display_errors());
			echo "<script>alert(" . $error . ");</script>";
		}

		echo "<script>window.location='" . site_url('HomeAdm/barang') . "';</script>";          
        
    }
  public function getById($id)
  {
    $data["produk"] = $this->produk_model->getById($id);
        $this->load->view("utemplate/header");
		$this->load->view("product",$data);
		$this->load->view("utemplate/footer");
  }
    public function hapus($id)
    {
        $this->produk_model->hapus_data($id);
		redirect('Produk');
    }
    
}