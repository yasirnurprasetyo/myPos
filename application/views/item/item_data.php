<section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h1 class="box-title">Data Item Barang</h1>
            <div class="pull-right">
                <a href="<?= site_url('item/add') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Barang
                </a>
                <a href="<?= site_url('laporan/barang') ?>" class="btn btn-info">
                    <i class="fa fa-print"></i> Laporan Barang Excel
                </a>
            </div>
        </div>
        <div class="box-body">
            <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barcode</th>
                        <th>Nama item</th>
                        <th>Kategori</th>
                        <th>Unit</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($row->result() as $s => $data) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <a href="<?= site_url('item/barcodeQrCode/' . $data->item_id) ?>" class="btn btn-success btn-xs">
                                    Generate <i class="fa fa-barcode"></i>
                                </a>
                            </td>
                            <td><?= $data->nama ?></td>
                            <td><?= $data->kategori_nama ?></td>
                            <td><?= $data->unit_nama ?></td>
                            <td><?= $data->harga ?></td>
                            <td><?= $data->stock ?></td>
                            <td>
                                <img src="<?= base_url('uploads/produk/' . $data->image) ?>" style="width:100px" onerror="this.onerror=null;this.src='<?= base_url('assets/images/noimage.jpg') . $data->image ?>';" alt="<?= $data->nama ?>">
                            </td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('item/edit/' . $data->item_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="<?= site_url('item/del/' . $data->item_id) ?>" onclick="return confirm('Yakin Hapus Data ?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    $(function() {
        $("#table1").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('item/get_ajax') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                    "target": [5, 6],
                    "className": 'text-right'
                },
                {
                    "target": [7, -1],
                    "className": 'text-center'
                },
                {
                    "target": [0, 7, -1],
                    "orderable": false
                }
            ]
        });
    });
</script>