<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("order_model");
        $this->load->model("produk_model");
        $this->load->model("member_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["barang"] = $this->order_model->getAll();
        $this->load->view("vbarang",$data);
    }
    public function add()
    {

        $username = $this->session->userdata("nama");
        $saldo = $this->member_model->getSaldo($username);
        $id_produk = $this->input->post('id_produk');
        $stok = $this->produk_model->getStok($id_produk);
        $jumlah = $this->input->post('jumlah');
        $total =$this->input->post('total');
        // $saldomin = $saldo - $total;
        // $stokmin = $stok - $jumlah;
        if($stok > $jumlah){
            if($saldo > $total){
                    if ($username !== null) {
                        $data = array(
                            'username'    		    => $username,
                            'id_produk'          	=> $id_produk,
                            'jumlah'         	    => $jumlah,
                            'total'         		=> $total

                        );
                        // $where = array(
                        //     'id_produk'          		=> $id_produk
                        // );
                        // $where2 = array(
                        //     'username'          		=> $username
                        // );
                        // $data2 = array(
                        //     'saldo'    		    => $saldomin

                        // );
                        // $data3 = array(
                        //     'stok'    		    => $stokmin

                        // );
                        // $this->order_model->update_data($where, $data3, 'produk');
                        // $this->order_model->update_data($where2, $data2, 'account');
                        $this->order_model->add($data, 'orders');
                        echo "data berhasil disimpan";
                        redirect(site_url("Home"));
                    }
                    else {
                        echo "data gagal disimpan";
                    }
                }
                else{
                    echo "Saldo tidak cukup";
                }
        }
        else {
            echo "Stok tidak cukup";
        }
        
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