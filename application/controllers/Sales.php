<?php
class Sales extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        notLogin();
  //      checkAdmin();
        $this->load->model(array("ModelSales","ModelCustomer","ModelItem"));
        //        $this->load->library('form_validation');

    }

	public function index()
	{
		$customer = $this->ModelCustomer->get()->result();
		$item = $this->ModelItem->get()->result();
		$cart = $this->ModelSales->get_cart();
		$data = array(
			'customer' => $customer,
			'item' => $item,
			'cart' => $cart,
			'nota' => $this->ModelSales->invoice_no()
		);
		$this->template->load('template','transaksi/sales/sales_form',$data);
	}

	public function proses()
	{
		$data = $this->input->post(null, true);	
		if(isset($_POST['add_cart'])) {
			$item_id = $this->input->post('item_id');
			$cek_cart = $this->ModelSales->get_cart(['t_cart.item_id' => $item_id])->num_rows();
			if($cek_cart > 0){
				$this->ModelSales->update_cart_qty($data);
			}else{
				$this->ModelSales->add_cart($data);
			}

			if($this->db->affected_rows() > 0){
				$params = array("success" => true);
			}else{
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if(isset($_POST['edit_cart'])){
			$this->ModelSales->edit_cart($data);

			if($this->db->affected_rows() > 0){
				$params = array("success" => true);
			}else{
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		if(isset($_POST['proses_payment'])) {
			$sales_id = $this->ModelSales->add_sales($data);
			$cart = $this->ModelSales->get_cart()->result();
			$row = [];
			foreach($cart as $c => $value) {
				array_push($row, array(
					//t_sales => t_cart
					'sales_id' => $sales_id,
					'item_id' => $value->item_id,
					'harga' => $value->harga,
					'qty' => $value->qty,
					'diskon_item' => $value->diskon_item,
					'total' => $value->total,
					)
				);
			}
			$this->ModelSales->add_sales_detail($row);
			$this->ModelSales->del_cart(['user_id' => $this->session->userdata('userid')]);

			if($this->db->affected_rows() > 0){
				$params = array("success" => true, "sales_id" => $sales_id);
			}else{
				$params = array("success" => false);
			}
			echo json_encode($params);
		}
	}

	public function cart_data()
	{
		$cart = $this->ModelSales->get_cart();
		$data['cart'] = $cart;
		$this->load->view('transaksi/sales/cart_data',$data);
	}

	public function cart_del()
	{
		if(isset($_POST['cancle_payment'])){
			$this->ModelSales->del_cart(['user_id' => $this->session->userdata("userid")]);
		}else{
			$cart_id = $this->input->post('cart_id');
			$this->ModelSales->del_cart(['cart_id' => $cart_id]);
		}
		
		if($this->db->affected_rows() > 0){
			$params = array("success" => true);
		}else{
			$params = array("success" => false);
		}
		echo json_encode($params);
	}

	public function cetak($id)
	{
		$data = array(
			'sales' => $this->ModelSales->get_sales($id)->row(),
			'sales_detail' => $this->ModelSales->get_sales_detail($id)->result()
		);
		$this->load->view('transaksi/sales/print_nota', $data);
	}
}