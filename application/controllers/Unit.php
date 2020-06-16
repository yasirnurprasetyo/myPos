<?php
class Unit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        notLogin();
  //      checkAdmin();
        $this->load->model("ModelUnit");
        //        $this->load->library('form_validation');

    }

    public function index()
	{
		$data['row'] = $this->ModelUnit->get();
		$this->template->load('template', 'unit/unit_data', $data);
    }
    
    public function add()
	{
		$unit = new stdClass();
		$unit->unit_id = null;
		$unit->nama = null;
		$data = array(
			"page" => "add",
			"row" => $unit
		);
		$this->template->load('template', 'unit/unit_form', $data);
    }

    public function edit($id)
	{
		$query = $this->ModelUnit->get($id);
		if ($query->num_rows() > 0) {
			$unit = $query->row();
			$data = array(
				"page" => "edit",
				"row" => $unit
			);
			$this->template->load('template', 'unit/unit_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan);</script>";
			echo "<script>window.location='" . site_url('unit') . "';</script>";
		}
	}
    
    public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->ModelUnit->add($post);
		}else if(isset($_POST['edit'])){
			$this->ModelUnit->edit($post);
		}
		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil disimpan);</script>";
		}
		echo "<script>window.location='" . site_url('unit') . "';</script>";
	}

	public function del($id)
	{
		$this->ModelUnit->del($id);
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus);</script>";
		}
		echo "<script>window.location='" . site_url('unit') . "';</script>";
	}
}
