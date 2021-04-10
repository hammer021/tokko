<?php defined('BASEPATH') OR exit('No direct script access allowed');

class order_model extends CI_Model
{
    private $_table = "orders";

    public $id_order;
    public $username;
    public $id_produk;
    public $jumlah;
    public $total;

    public function rules()
    {
        return [
            

            ['field' => 'username',
            'label' => 'username',
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
   function add($data, $table){
    $this->db->insert($table, $data);
}

function update($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
}	
    public function hapus_data($id)
    {
        return $this->db->delete($this->_table, array("id_produk" => $id));
    }
}