<?php
class Modelcustomer extends CI_Model{

    public function get($id = null)
    {
        $this->db->from('customer');
        if($id != null ){
            $this->db->where('customer_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        //data['dari_database'] = $post['dari_form'];
        $data['nama'] = $post['nama'];
        $data['jk'] = $post['jk'];
        $data['tlpn'] = $post['tlpn'];
        $data['alamat'] = $post['alamat'];
        $this->db->insert('customer',$data);
    }

    public function edit($post)
    {
         //data['dari_database'] = $post['dari_form'];
         $data['nama'] = $post['nama'];
         $data['jk'] = $post['jk'];
         $data['tlpn'] = $post['tlpn'];
         $data['alamat'] = $post['alamat'];
         $this->db->where('customer_id',$post['customer_id']);     
         $this->db->update('customer',$data);
    }

    public function del($id)
    {
        $this->db->where('customer_id',$id);
        $this->db->delete('customer');
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('customer');
        return $this->db->get()->result();
    }
}