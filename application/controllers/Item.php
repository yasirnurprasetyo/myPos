<?php
class Item extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        notLogin();
        //      checkAdmin();
        $this->load->model(array("ModelItem", "ModelKategori", "ModelUnit"));
        //        $this->load->library('form_validation');

    }

    function get_ajax()
    {
        $list = $this->ModelItem->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->barcode . '<br><a href="' . site_url('item/barcodeQR/' . $item->item_id) . '" class="btn btn-success btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $item->nama;
            $row[] = $item->kategori_nama;
            $row[] = $item->unit_nama;
            $row[] = formatRupiah($item->harga);
            $row[] = $item->stock;
            $row[] = $item->image != null ? '<img src="' . base_url('uploads/produk/' . $item->image) . '" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="' . site_url('item/edit/' . $item->item_id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                   <a href="' . site_url('item/del/' . $item->item_id) . '" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->ModelItem->count_all(),
            "recordsFiltered" => $this->ModelItem->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function index()
    {
        $data['row'] = $this->ModelItem->get();
        $this->template->load('template', 'item/item_data', $data);
    }

    public function add()
    {
        $item = new stdClass();
        $item->item_id = null;
        $item->barcode = null;
        $item->nama = null;
        $item->harga = null;
        $item->kategori_id = null;

        $query_kategori = $this->ModelKategori->get();

        $query_unit = $this->ModelUnit->get();
        $unit[null] = '--- Pilih ---';
        foreach ($query_unit->result() as $u) {
            $unit[$u->unit_id] = $u->nama;
        }

        $data = array(
            "page" => "add",
            "row" => $item,
            "kategori" => $query_kategori,
            "unit" => $unit, 'selectedunit' => null,
        );
        $this->template->load('template', 'item/item_form', $data);
    }

    public function edit($id)
    {
        $query = $this->ModelItem->get($id);
        if ($query->num_rows() > 0) {
            $item = $query->row();
            $query_kategori = $this->ModelKategori->get();
            $query_unit = $this->ModelUnit->get();
            $unit[null] = '--- Pilih ---';
            foreach ($query_unit->result() as $u) {
                $unit[$u->unit_id] = $u->nama;
            }

            $data = array(
                "page" => "edit",
                "row" => $item,
                "kategori" => $query_kategori,
                "unit" => $unit, 'selectedunit' => $item->unit_id,
            );
            $this->template->load('template', 'item/item_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan);</script>";
            echo "<script>window.location='" . site_url('item') . "';</script>";
        }
    }

    public function proses()
    {
        $config['upload_path']          = './uploads/produk/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['file_name']             = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->ModelItem->cekBarcode($post['barcode'])->num_rows() > 0) {
                $this->session->set_flashdata('error', 'Barcode $post[barcode] sudah dipakai barang lain');
                redirect('item/add');
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->ModelItem->add($post);
                        if ($this->db->affected_rows() > 0) {
                            //flash alert
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('item');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('item/add');
                    }
                } else {
                    $post['image'] = null;
                    $this->ModelItem->add($post);
                    if ($this->db->affected_rows() > 0) {
                        //flash alert
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('item');
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->ModelItem->cekBarcode($post['barcode'], $post['id'])->num_rows() > 0) {
                $this->session->set_flashdata('error', 'Barcode $post[barcode] sudah dipakai barang lain');
                redirect('item/edit/' . $post['id']);
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {

                        $item = $this->ModelItem->get($post['id'])->row();
                        if ($item->image != null) {
                            $target_file = "./uploads/produk/" . $item->image;
                            unlink($target_file);
                        }

                        $post['image'] = $this->upload->data('file_name');
                        $this->ModelItem->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            //flash alert
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('item');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('item/add');
                    }
                } else {
                    $post['image'] = null;
                    $this->ModelItem->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        //flash alert
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('item');
                }
            }
        }
        if ($this->db->affected_rows() > 0) {
            //flash alert
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('item');
    }

    public function del($id)
    {
        $item = $this->ModelItem->get($id)->row();
        if ($item->image != null) {
            $target_file = "./uploads/produk/" . $item->image;
            unlink($target_file);
        }


        $this->ModelItem->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('item');
    }

    public function barcodeQrCode($id)
    {
        $data['row'] = $this->ModelItem->get($id)->row();
        $this->template->load('template', 'item/barcodeQR', $data);
    }

    public function barcodePrint($id)
    {
        $data['row'] = $this->ModelItem->get($id)->row();
        $html = $this->load->view("item/barcodePrint", $data, TRUE);
        $this->fungsi->pdfGenerator($html, 'barcode-' . $data['row']->barcode, 'A4', 'landscape');
    }

    public function qrCodePrint($id)
    {
        $data['row'] = $this->ModelItem->get($id)->row();
        $html = $this->load->view("item/qrPrint", $data, TRUE);
        $this->fungsi->pdfGenerator($html, 'qrcode-' . $data['row']->barcode, 'A4', 'landscape');
    }
}
