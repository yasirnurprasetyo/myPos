<?php
class ModelUser extends CI_Model{
    
    public function login($post)
    {
        $this->db->select('*')
        ->from('user')
        ->where('username', $post['username'])
        ->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if($id != null ){
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        //data['dari_database'] = $post['dari_form'];
        $data['nama'] = $post['nama'];
        $data['username'] = $post['username'];
        $data['password'] = sha1($post['password']);
        $data['alamat'] = $post['alamat'];
        $data['level'] = $post['level'];
        $this->db->insert('user',$data);
    }

    public function edit($post)
    {
         //data['dari_database'] = $post['dari_form'];
         $data['nama'] = $post['nama'];
         $data['username'] = $post['username'];
         if(!empty($post['password'])){
             $params['password'] = sha1($post['password']);
         }
         $data['alamat'] = $post['alamat'];
         $data['level'] = $post['level'];
         $this->db->where('user_id',$post['user_id']);     
         $this->db->update('user',$data);
    }

    public function del($id)
    {
        $this->db->where('user_id',$id);
        $this->db->delete('user');
    }

}