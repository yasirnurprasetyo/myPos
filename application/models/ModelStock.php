<?php
class ModelStock extends CI_Model{
    public function get($id = null)
    {
        $this->db->from('t_stock');
        if($id != null){
            $this->db->where('stock_id',$id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('stock_id',$id);
        $this->db->delete('t_stock');
    }

    public function getStockIn()
    {
        $this->db->select('t_stock.stock_id, p_item.barcode, p_item.nama as item_nama, qty, date, detail, suplier.nama as suplier_nama, p_item.item_id');
        $this->db->from('t_stock');
        $this->db->join('p_item','t_stock.item_id = p_item.item_id');
        $this->db->join('suplier','t_stock.suplier_id = suplier.suplier_id','left');
        $this->db->where('type', 'in');
        $this->db->order_by('stock_id','desc');
        $query = $this->db->get();
        return $query;
    }


    public function addStockIn($post)
    {
        $data = [
            'item_id' => $post['item_id'],
            'type' => 'in',
            'detail' => $post['detail'],
            'suplier_id' => $post['suplier'] == '' ? null : $post['suplier'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('t_stock',$data);
    }

    public function getStockOut()
    {
        $this->db->select('t_stock.stock_id, p_item.barcode, p_item.nama as item_nama, qty, date, detail, suplier.nama as suplier_nama, p_item.item_id');
        $this->db->from('t_stock');
        $this->db->join('p_item','t_stock.item_id = p_item.item_id');
        $this->db->join('suplier','t_stock.suplier_id = suplier.suplier_id','left');
        $this->db->where('type', 'out');
        $this->db->order_by('stock_id','desc');
        $query = $this->db->get();
        return $query;
    }

    public function addStockOut($post)
    {
        $data = [
            'item_id' => $post['item_id'],
            'type' => 'out',
            'detail' => $post['detail'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('t_stock',$data);
    }

    public function getSIn()
    {
        $this->db->select('sum(t_stock.qty) as jumlah');
        $this->db->from('t_stock');
        $this->db->where("t_stock.type = 'in'");
        $query = $this->db->get()->row();
        return $query;
    }

    public function getSOut()
    {
        $this->db->select('sum(t_stock.qty) as jumlah');
        $this->db->from('t_stock');
        $this->db->where("t_stock.type = 'out'");
        $query = $this->db->get()->row();
        return $query;
    }
}