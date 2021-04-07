<?php defined('BASEPATH') OR exit('No direct script access allowed');

class produk_model extends CI_Model
{
    private $_table = "produk";

    public $id_produk;
    public $nama_produk;
    public $harga;
    public $stok;

    public function rules()
    {
        return [
            

            ['field' => 'nama_produk',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'harga',
            'label' => 'Harga',
            'rules' => 'numeric'],
            
            ['field' => 'stok',
            'label' => 'Stok',
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
    
    public function buat_kode(){
        $this->db->select('RIGHT(produk.id_produk,2) as kode',FALSE);
        $this->db->order_by('id_produk', 'DESC');
        $this->db->limit(1);

        $query=$this->db->get('produk');

        if ($query->num_rows()<>0) {
            $data=$query->row();
            $kode=intval($data->kode)+1;
        }else{
            $kode=1;
        }
        $kode_max=str_pad($kode,2,"0",STR_PAD_LEFT);
        $kode_jadi="PRO00".$kode_max;
        return $kode_jadi;
    }
    public function save()
    {
      
        $post = $this->input->post();
        $this->id_produk = $this->buat_kode();
        $this->nama_produk = $post["nama_produk"];
        $this->harga = $post["harga"];
        $this->stok = $post["stok"];
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