<?php defined('BASEPATH') OR exit('No direct script access allowed');

class order_model extends CI_Model
{
    private $_table = "orders";

    public $id_order;
    public $id_account;
    public $id_produk;
    public $jumlah;
    public $total;

    public function rules()
    {
        return [
            

            ['field' => 'id_account',
            'label' => 'id_account',
            'rules' => 'required'],

            ['field' => 'id_produk',
            'label' => 'id_produk',
            'rules' => 'required'],
            
            ['field' => 'jumlah',
            'label' => 'jumlah',
            'rules' => 'numeric'],

            ['field' => 'total',
            'label' => 'total',
            'rules' => 'numeric']

        ];
    }

    public function getAll()
    {
        $this->db->select('produk.*');
        $this->db->from('produk');
        $query = $this->db->get()->result();
        return $query;

    }
   public function getById($id)
   {
    $this->db->select('produk.*');
    $this->db->from('produk');
    $this->db->where('id_produk',$id);
    $query = $this->db->get()->result();
    return $query;
   }
    public function save()
    {
      
        $post = $this->input->post();
        $this->id_account = $this->session->userdata("id_account");
        $this->id_produk = $post["id_produk"];
        $this->jumlah = $post["jumlah"];
        $this->total = $post["total"];
        return $this->db->insert($this->_table, $this);
    }

    public function update_data($where,$data){
		$this->db->where($where);
		$this->db->update('produk',$data);
    }

    public function hapus_data($id)
    {
        return $this->db->delete($this->_table, array("id_produk" => $id));
    }
}