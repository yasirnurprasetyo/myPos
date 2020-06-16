<?php
class ModelSuplier extends CI_Model{

    public function get($id = null)
    {
        $this->db->from('suplier');
        if($id != null ){
            $this->db->where('suplier_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            "nama" => $post['suplier_name'],
            "tlpn" => $post['phone'],
            "alamat" => $post['addr'],
            "deskripsi" => empty($post['desc']) ? null : $post['desc']
        ];
        $this->db->insert('suplier',$params);
    }

    public function edit($post)
    {
        $params = [
            "nama" => $post['suplier_name'],
            "tlpn" => $post['phone'],
            "alamat" => $post['addr'],
            "deskripsi" => empty($post['desc']) ? null : $post['desc'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('suplier_id', $post['id']);       
        $this->db->update('suplier',$params);
    }

    public function del($id)
    {
        $this->db->where('suplier_id',$id);
        $this->db->delete('suplier');
    }
}