<?php
class ModelKategori extends CI_Model{

    public function get($id = null)
    {
        $this->db->from('kategori');
        if($id != null ){
            $this->db->where('kategori_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            "nama" => $post['kategori_name'],
        ];
        $this->db->insert('kategori',$params);
    }

    public function edit($post)
    {
        $params = [
            "nama" => $post['kategori_name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('kategori_id', $post['id']);       
        $this->db->update('kategori',$params);
    }

    public function del($id)
    {
        $this->db->where('kategori_id',$id);
        $this->db->delete('kategori');
    }
}