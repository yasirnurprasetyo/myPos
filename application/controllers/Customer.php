<?php
class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        notLogin();
        //checkAdmin();
        $this->load->model("ModelCustomer");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->ModelCustomer->get();
        $this->template->load('template', 'customer/customer_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jk', 'Jenis kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        // $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        // $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silahkan ganti yang lain');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'customer/customer_form_add');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->ModelCustomer->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil disimpan);</script>";
            }
            echo "<script>window.location='" . site_url('customer') . "';</script>";
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jk', 'Jenis kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        // $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        // $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silahkan ganti yang lain');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->ModelCustomer->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'customer/customer_form_edit', $data);
            } else {
                echo "<script>alert('Data tidak ditemukan);</script>";
                echo "<script>window.location='" . site_url('customer') . "';</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->ModelCustomer->edit($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data berhasil diubah);</script>";
            }
            echo "<script>window.location='" . site_url('customer') . "';</script>";
        }
    }

    public function del($id)
	{
		$this->ModelCustomer->del($id);
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus);</script>";
		}
		echo "<script>window.location='" . site_url('customer') . "';</script>";
	}
}