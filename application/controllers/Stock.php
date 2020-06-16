<?php
class Stock extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        notLogin();
        //      checkAdmin();
        $this->load->model(array("ModelStock","ModelSuplier","ModelItem"));
        //        $this->load->library('form_validation');
    }

    public function stockInData()
    {
        $data['row'] = $this->ModelStock->getStockIn()->result();
        $this->template->load('template', 'transaksi/stock_in/stock_in_data', $data);
    }

    public function stockInAdd()
    {
        $item = $this->ModelItem->get()->result();
        $suplier = $this->ModelSuplier->get()->result();
        $data = ['item' => $item, 'suplier' => $suplier];
        $this->template->load('template', 'transaksi/stock_in/stock_in_form',$data);
    }

    public function stockInDel()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->ModelStock->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' =>$item_id];
        $this->ModelItem->updateStockOut($data);
        $this->ModelStock->del($stock_id);
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata('success','Data stock berhasil dihapus');
        }
        redirect('stock/in');
    }

    public function proses()
    {
        if(isset($_POST['in_add'])){
            $post = $this->input->post(null, TRUE);
            $this->ModelStock->addStockIn($post);
            $this->ModelItem->updateStockIn($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('success','Data stock berhasil disimpan');
            }
            redirect('stock/in');
        }else if(isset($_POST['out_add'])){
            $post = $this->input->post(null, TRUE);
            $this->ModelStock->addStockOut($post);
            $this->ModelItem->updateStockOut($post);
            if($this->db->affected_rows()>0){
                $this->session->set_flashdata('success','Data stock berhasil disimpan');
            }
            redirect('stock/out');
        }  
    }

    public function stockOutData()
    {
        $data['row'] = $this->ModelStock->getStockOut()->result();
        $this->template->load('template', 'transaksi/stock_out/stock_out_data', $data);
    }

    public function stockOutAdd()
    {
        $item = $this->ModelItem->get()->result();
        $data = ['item' => $item];
        $this->template->load('template', 'transaksi/stock_out/stock_out_form',$data);
    }
}
