9class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model("ModelKategori");
    }

    public function index()
	{
		$data['row'] = $this->ModelKategori->get();
		$this->template->load('template', 'kategori/kategori_data', $data);
    }
    
    public function add()
	{
		$kategori = new stdClass();
		$kategori->kategori_id = null;
		$kategori->nama = null;
		$data = array(
			"page" => "add",
			"row" => $kategori
		);
		$this->template->load('template', 'kategori/kategori_form', $data);
    }

    public function edit($id)
	{
		$query = $this->ModelKategori->get($id);
		if ($query->num_rows() > 0) {
			$kategori = $query->row();
			$data = array(
				"page" => "edit",
				"row" => $kategori
			);
			$this->template->load('template', 'kategori/kategori_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan);</script>";
			echo "<script>window.location='" . site_url('kategori') . "';</script>";
		}
	}
    
    public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->ModelKategori->add($post);
		}else if(isset($_POST['edit'])){
			$this->ModelKategori->edit($post);
		}
		if($this->db->affected_rows() > 0) {
			//falsh alert
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('kategori');
	}

	public function del($id)
	{
		$this->ModelKategori->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		redirect('kategori');
	}
}
