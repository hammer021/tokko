<?php defined('BASEPATH') OR exit('No direct script access allowed');

class member_model extends CI_Model
{
    private $_table = "account";

    public $id_account;
    public $username;
    public $password;
    public $saldo;
    public $id_role;

    public function rules()
    {
        return [
            

            ['field' => 'username',
            'label' => 'username',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'password',
            'rules' => 'password']

        ];
    }
    public function getAll()
    {
        $this->db->select('account.*');
        $this->db->from('account');
		$this->db->where('id_role','2');
        $query = $this->db->get()->result();
        return $query;

    }
   
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kd_barang" => $id])->row();
    }
    public function buat_kode(){
        $this->db->select('RIGHT(account.id_account,2) as kode',FALSE);
        $this->db->order_by('id_account', 'DESC');
        $this->db->limit(1);

        $query=$this->db->get('account');

        if ($query->num_rows()<>0) {
            $data=$query->row();
            $kode=intval($data->kode)+1;
        }else{
            $kode=1;
        }
        $kode_max=str_pad($kode,2,"0",STR_PAD_LEFT);
        $kode_jadi="M00".$kode_max;
        return $kode_jadi;
    }
    public function save()
    {
       
        $post = $this->input->post();
        $pass = $post["password"];
        // $this->id_account = $this->buat_kode();
        $this->username = $post["username"];
        $this->password = md5($pass);
        $this->saldo = "0";
        $this->id_role="2";

        return $this->db->insert($this->_table, $this);
    }

    public function update_data($where,$data){
		$this->db->where($where);
		$this->db->update('account',$data);
    }

    public function hapus_data($id)
    {
        return $this->db->delete($this->_table, array("id_produk" => $id));
    }
}