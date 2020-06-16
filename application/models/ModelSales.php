<?php
class ModelSales extends CI_Model
{

    public function invoice_no()
    {
        $sql = "SELECT MAX(MID(nota,10,4)) AS nota_no 
                from t_sales 
                where MID(nota,4,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int) $row->nota_no) + 1;
            $nomor = sprintf("%'.04d", $n);
        } else {
            $nomor = "0001";
        }
        $nota = "TRX" . date('ymd') . $nomor;
        return $nota;

        // $queryMaxId = "select ifnull(max(nota),0) as max from t_sales "
        //     . "WHERE MONTH(tanggal) = MONTH(NOW()) AND YEAR(tanggal) = YEAR(NOW())";
        // $max = $this->db->query($queryMaxId)->row()->max;
        // //transaksi "TRX/2020/04/0001"
        // //str_pad(input,pad_length,pad_string,pad_type);
        // $strPad = str_pad($max + 1, 4, "0", STR_PAD_LEFT);
        // $noTransaksi = "TRX/" . date("Y/m") . "/" . $strPad;
    }

    public function get_cart($params = null)
    {
        $this->db->select('*, p_item.nama as item_nama, t_cart.harga as cart_harga');
        $this->db->from('t_cart');
        $this->db->join('p_item', 't_cart.item_id = p_item.item_id');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('user_id', $this->session->userdata('userid'));
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($post)
    {
        $query = $this->db->query("select max(cart_id) as cart_no from t_cart");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int) $row->cart_no) + 1;
        } else {
            $car_no = "1";
        }
        $params = array(
            'cart_id' => $car_no,
            'item_id' => $post['item_id'],
            'harga' => $post['harga'],
            'qty' => $post['qty'],
            'total' => ($post['harga'] * $post['qty']),
            'user_id' => $this->session->userdata('userid'),
        );
        $this->db->insert('t_cart', $params);
    }

    public function update_cart_qty($post)
    {
        $sql = "update t_cart set harga = '$post[harga]',
                qty = qty + '$post[qty]',
                total = '$post[harga]' * qty
                where item_id = '$post[item_id]'";
        $this->db->query($sql);
    }

    public function del_cart($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('t_cart');
    }

    public function edit_cart($post)
    {
        $params = array(
            'harga' => $post['harga'],
            'qty' => $post['qty'],
            'diskon_item' => $post['diskon'],
            'total' => $post['total'],
        );
        $this->db->where('cart_id', $post['cart_id']);
        $this->db->update('t_cart', $params);
    }

    public function add_sales($post)
    {
        $params = array(
            'nota' => $this->invoice_no(),
            'customer_id' => $post['customer_id'] == "" ? null : $post['customer_id'],
            'total' => $post['subtotal'],
            'diskon' => $post['diskon'],
            'grand_total' => $post['grandtotal'],
            'bayar' => $post['cash'],
            'kembalian' => $post['change'],
            'catatan' => $post['note'],
            'tanggal' => $post['date'],
            'user_id' => $this->session->userdata('userid')
        );
        $this->db->insert('t_sales', $params);
        return $this->db->insert_id();
    }

    public function add_sales_detail($params)
    {
        $this->db->insert_batch('t_sales_detail', $params);
    }

    public function get_sales($id = null)
    {
        $this->db->select('*, customer.nama as customer_nama, user.username as user_nama,
                        t_sales.created as sales_created');
        $this->db->from('t_sales');
        $this->db->join('customer', 't_sale.customer_id = customer.customer_id', 'left');
        $this->db->join('user', 't_sale.user_id = user.user_id');
        if ($id != null) {
            $this->db->where('sales_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_sales_detail($sales_id = null)
    {

        $this->db->from('t_sales_detail');
        $this->db->join('p_item', 't_sales_detail.item_id = p_item.item_id');
        if ($sales_id != null) {
            $this->db->where('t_sales_detail.sales_id', $sales_id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getJoinChart()
    {
        $this->db->select('MONTH(tanggal) as bulan, SUM(grand_total) AS totals');
        $this->db->from('t_sales');
        $this->db->group_by('MONTH(tanggal)');
        return $this->db->get()->result();
    }

    public function getDetail()
    {
        $this->db->select('t_sales.nota, t_sales.tanggal, user.username as user_nama');
        $this->db->from('t_sales');
        $this->db->join('user', 't_sales.user_id = user.user_id');
        return $this->db->get();
        // return $query;
    }

    // Hitung Pendapatan
	public function hitungPendapatan($range = null)
	{
		$this->db->select_sum('total_utama');
		if ($range != null) {
			$this->db->where('tanggal_transaksi' . ' >=', $range['mulai']);
			$this->db->where('tanggal_transaksi' . ' <=', $range['akhir']);
		}
		return $this->db->get('t_sales')->row()->total_utama;
	}

	// Hitung Total Transaksi
	public function hitungTransaksi($range = null)
	{
		$this->db->select('*');
		if ($range != null) {
			$this->db->where('tanggal_transaksi' . ' >=', $range['mulai']);
			$this->db->where('tanggal_transaksi' . ' <=', $range['akhir']);
		}
		return $this->db->get('t_sales')->num_rows();
	}
}
