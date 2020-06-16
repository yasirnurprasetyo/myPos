<section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h1 class="box-title">Data Stock Out Barang</h1>
            <div class="pull-right">
                <a href="<?= site_url('stock/out/add') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
            </div>
        </div>
        <div class="box-body">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barcode</th>
                        <th>Produk Item</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($row as $s => $data) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->barcode ?></td>
                            <td><?= $data->item_nama ?></td>
                            <td class="text-right"><?= $data->qty ?></td>
                            <td class="text-center"><?= indoDate($data->date) ?></td>
                            <td class="text-center" width="160px">
                                <a class="btn btn-warning btn-xs" id="set_detail" 
                                    data-toggle="modal" data-target="#modal-detail"
                                    data-barcode="<?= $data->barcode ?>" 
                                    data-detail="<?= $data->detail ?>" 
                                    data-itemnama="<?= $data->item_nama ?>"  
                                    data-qty="<?= $data->qty ?>" 
                                    data-date="<?= $data->date ?>">
                                    <i class="fa fa-eye"></i> Detail
                                </a>
                                <a href="<?= site_url('stock/out/del/' . $data->stock_id . '/' . $data->item_id) ?>" onclick="return confirm('Yakin Hapus Data ?')" class="btn btn-danger btn-xs">
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
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Stock In Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>Barcode</th>
                            <td><span id="barcode"></span></td>
                        </tr>
                        <tr>
                            <th>Item Name</th>
                            <td><span id="item_nama"></span></td>
                        </tr>
                        <tr>
                            <th>Info</th>
                            <td><span id="detail"></span></td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td><span id="date"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
