<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        notLogin();
        checkAdmin();
        $this->load->model("ModelUser");
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $data['row'] = $this->ModelUser->get();
        $this->template->load('template', 'user/user_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules(
            'passconf',
            'Konfirmasi Password',
            'required|min_length[5]|matches[password]',
            array('matches' => '%s tidak sesuai dengan Password')
        );
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silahkan ganti yang lain');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'user/form_add');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->ModelUser->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil disimpan);</script>";
            }
            echo "<script>window.location='" . site_url('user') . "';</script>";
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            $this->form_validation->set_rules(
                'passconf',
                'Konfirmasi Password',
                'min_length[5]|matches[password]',
                array('matches' => '%s tidak sesuai dengan Password')
            );
        }
        if ($this->input->post('passconf')) {
            $this->form_validation->set_rules(
                'passconf',
                'Konfirmasi Password',
                'min_length[5]|matches[password]',
                array('matches' => '%s tidak sesuai dengan Password')
            );
        }
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silahkan ganti yang lain');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->ModelUser->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'user/user_form_edit', $data);
            } else {
                echo "<script>alert('Data tidak ditemukan);</script>";
                echo "<script>window.location='" . site_url('user') . "';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->ModelUser->edit($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil diubah);</script>";
            }
            echo "<script>window.location='" . site_url('user') . "';</script>";
        }
    }

public function username_check()
{
     $post = $this->input->post(null, TRUE);
     $query = $this->db->query("select * from user where username = '$post[username]' and user_id != '$post[user_id]'");
        if($query->num_rows() > 0){
            $this->form_validation->set_message('username_check', '{field} ini sudah dipakai');
            return false;
        }else{
            return true;
        }
    }

    public function del()
    {
        $id = $this->input->post('user_id');
        $this->ModelUser->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus);</script>";
        }
        echo "<script>window.location='" . site_url('user') . "';</script>";
    }
}
