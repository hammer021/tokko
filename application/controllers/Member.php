<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["member"] = $this->member_model->getAll();
        $this->load->view("vmember",$data);
    }

    public function save()
    {
        $member = $this->member_model;
        $validation = $this->form_validation;
        $validation->set_rules($member->rules());
        if ($validation->run()) {
            $member->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        redirect(site_url("Home"));
    }
    
    public function edit()
    {
        $id_account = $this->input->post('id_account');
		$saldo = $this->input->post('saldo');
        $tsaldo = $this->input->post('tsaldo');
		$akhirsaldo = $saldo + $tsaldo;
        if ($id_account !== null) {
			$where = array(
				'id_account'  => $id_account
			);
			$data = array(
				'saldo'         	=> $akhirsaldo
			);
			$this->member_model->update_data($where, $data);

			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('data Berhasil Di simpan');</script>";
			}
			redirect(site_url("HomeAdm/member"));
		}
        else {
			$error = array('error' => $this->upload->display_errors());
			echo "<script>alert(" . $error . ");</script>";
		}

		echo "<script>window.location='" . site_url('HomeAdm/member') . "';</script>";          
        
    }
  
    public function hapus($id)
    {
        $this->produk_model->hapus_data($id);
		redirect('Produk');
    }
    
}