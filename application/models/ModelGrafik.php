<?php
class ModelGrafik extends CI_Model
{
    public function statistik_stok()
    {
        $query = $this->db->query("SELECT nama,stock FROM p_item ORDER BY item_id");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
