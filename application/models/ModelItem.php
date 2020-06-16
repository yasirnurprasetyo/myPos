<?php
class ModelItem extends CI_Model{

     // start datatables
     var $column_order = array(null, 'barcode', 'p_item.nama', 'kategori_nama', 'unit_nama', 'harga', 'stock'); //set column field database for datatable orderable
     var $column_search = array('barcode', 'p_item.nama', 'harga'); //set column field database for datatable searchable
     var $order = array('item_id' => 'asc'); // default order
  
     private function _get_datatables_query() {
         $this->db->select('p_item.*, kategori.nama as kategori_nama, unit.nama as unit_nama');
         $this->db->from('p_item');
         $this->db->join('kategori', 'p_item.kategori_id = kategori.kategori_id');
         $this->db->join('unit', 'p_item.unit_id = unit.unit_id');
         $i = 0;
         foreach ($this->column_search as $item) { // loop column
             if(@$_POST['search']['value']) { // if datatable send POST for search
                 if($i===0) { // first loop
                     $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                     $this->db->like($item, $_POST['search']['value']);
                 } else {
                     $this->db->or_like($item, $_POST['search']['value']);
                 }
                 if(count($this->column_search) - 1 == $i) //last loop
                     $this->db->group_end(); //close bracket
             }
             $i++;
         }
          
         if(isset($_POST['order'])) { // here order processing
             $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
         }  else if(isset($this->order)) {
             $order = $this->order;
             $this->db->order_by(key($order), $order[key($order)]);
         }
     }
     function get_datatables() {
         $this->_get_datatables_query();
         if(@$_POST['length'] != -1)
         $this->db->limit(@$_POST['length'], @$_POST['start']);
         $query = $this->db->get();
         return $query->result();
     }
     function count_filtered() {
         $this->_get_datatables_query();
         $query = $this->db->get();
         return $query->num_rows();
     }
     function count_all() {
         $this->db->from('p_item');
         return $this->db->count_all_results();
     }
     // end datatables

    public function get($id = null)
    {
        $this->db->select('p_item.*,kategori.nama as kategori_nama, unit.nama as unit_nama');
        $this->db->from('p_item');
        $this->db->join('unit', 'unit.unit_id = p_item.unit_id');
        $this->db->join('kategori', 'kategori.kategori_id = p_item.kategori_id');
        if($id != null ){
            $this->db->where('item_id', $id);
        }
        $this->db->order_by('barcode','asc');
        $query = $this->db->get();
        return $query;
    }

    public function getAll()
    {
        $this->db->select('p_item.*,kategori.nama as kategori_nama, unit.nama as unit_nama');
        $this->db->from('p_item');
        $this->db->join('unit', 'unit.unit_id = p_item.unit_id');
        $this->db->join('kategori', 'kategori.kategori_id = p_item.kategori_id');
        return $this->db->get()->result();
    }

    public function add($post)
    {
        $params = [
            "barcode" => $post['barcode'],
            "nama" => $post['nama'],
            "kategori_id" => $post['kategori'],
            "unit_id" => $post['unit'],
            "harga" => $post['harga'],
            "image" => $post['image'],
        ];
        $this->db->insert('p_item',$params);
    }

    public function edit($post)
    {
        $params = [
            "barcode" => $post['barcode'],
            "nama" => $post['nama'],
            "kategori_id" => $post['kategori'],
            "unit_id" => $post['unit'],
            "harga" => $post['harga'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if($post['image'] != null){
            $params['image'] = $post['image'];
        }
        $this->db->where('item_id', $post['id']);       
        $this->db->update('p_item',$params);
    }

    public function cekBarcode($code, $id = null)
    {
        $this->db->from('p_item');
        $this->db->where('barcode', $code);
        if($id != null){
            $this->db->where("item_id !=", $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('item_id',$id);
        $this->db->delete('p_item');
    }

    public function updateStockIn($data)
    {
        $qty = $data['qty'];
        $id = $data['item_id'];
        $sql = "UPDATE p_item SET stock = stock + '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }

    public function updateStockOut($data)
    {
        $qty = $data['qty'];
        $id = $data['item_id'];
        $sql = "UPDATE p_item SET stock = stock - '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }

    public function getMinStock()
    {
        $this->db->select('p_item.nama as nama_barang, p_item.stock as stock_barang');
        $this->db->from('p_item');
        $this->db->where('p_item.stock < 10');
        $query = $this->db->get();
        return $query;
        // select p_item.nama as nama_barang, p_item.stock from p_item where p_item.stock < 10;
    }
}