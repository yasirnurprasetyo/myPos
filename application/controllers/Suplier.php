<?php
class Suplier extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		notLogin();
		       checkAdmin();
		$this->load->model("ModelSuplier");
		//        $this->load->library('form_validation');

	}

	public function index()
	{
		$data['row'] = $this->ModelSuplier->get();
		$this->template->load('template', 'suplier/suplier_data', $data);
	}

	public function add()
	{
		$suplier = new stdClass();
		$suplier->suplier_id = null;
		$suplier->nama = null;
		$suplier->tlpn = null;
		$suplier->alamat = null;
		$suplier->deskripsi = null;
		$data = array(
			"page" => "add",
			"row" => $suplier
		);
		$this->template->load('template', 'suplier/suplier_form', $data);
	}

	public function edit($id)
	{
		$query = $this->ModelSuplier->get($id);
		if ($query->num_rows() > 0) {
			$suplier = $query->row();
			$data = array(
				"page" => "edit",
				"row" => $suplier
			);
			$this->template->load('template', 'suplier/suplier_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan);</script>";
			echo "<script>window.location='" . site_url('suplier') . "';</script>";
		}
	}

	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->ModelSuplier->add($post);
		}else if(isset($_POST['edit'])){
			$this->ModelSuplier->edit($post);
		}
		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil disimpan);</script>";
		}
		echo "<script>window.location='" . site_url('suplier') . "';</script>";
	}

	public function del($id)
	{
		$this->ModelSuplier->del($id);
		$error = $this->db->error();
		if($error['code'] != 0){
			echo "<script>alert('Data tidak dapat dihapus(sudah berelasi));</script>";
		}
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus);</script>";
		}
		echo "<script>window.location='" . site_url('suplier') . "';</script>";
	}
}
