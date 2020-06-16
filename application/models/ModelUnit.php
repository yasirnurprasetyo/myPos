<?php
class ModelUnit extends CI_Model{

    public function get($id = null)
    {
        $this->db->from('unit');
        if($id != null ){
            $this->db->where('unit_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            "nama" => $post['unit_name'],
        ];
        $this->db->insert('unit',$params);
    }

    public function edit($post)
    {
        $params = [
            "nama" => $post['unit_name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('unit_id', $post['id']);       
        $this->db->update('unit',$params);
    }

    public function del($id)
    {
        $this->db->where('unit_id',$id);
        $this->db->delete('unit');
    }
}