<section class="content-header">
    <h1>Stock</h1><small>Barang Keluar / Pemeblian</small>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i></a></li>
        <li>Transaksi</li>
        <li class="active">Stock Out</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add Stock Out</h3>
            <div class="pull-right"><a href="<?= site_url('stock/out') ?>" class="btn btn-info btn-flat">
                    <i class="fa fa-reply"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('stock/proses') ?>" method="post">
                        <div class="form-group">
                            <label for="">Date *</label>
                            <input required type="date" value="<?= date('Y-m-d') ?>" name="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="barcode">Barcode *</label>
                        </div>
                        <div class="form-group input-group">
                            <input type="hidden" name="item_id" id="item_id">
                            <input type="text" name="barcode" id="barcode" class="form-control">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="item_nama">Item Name *</label>
                            <input readonly type="text" value="" id="item_nama" name="item_nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="unit_nama">Item Unit</label>
                                    <input type="text" name="unit_nama" id="unit_nama" value="-" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="stock">Initial Stock</label>
                                    <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Info *</label>
                            <input type="text" value="" id="detail" placeholder="Rusak/Kadaluarsa/Hilang/dll" name="detail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah *</label>
                            <input type="text" value="" id="qty" name="qty" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="out_add" class="btn btn-success btn-flat">
                                <i class="fa fa-save"></i> Save
                            </button>
                            <button type="reset" class="btn btn-info btn-flat"> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Select Produk Item</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Nama</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($item as $i => $data) {
                        ?>
                            <tr>
                                <td><?= $data->barcode ?></td>
                                <td><?= $data->nama ?></td>
                                <td><?= $data->unit_nama ?></td>
                                <td><?= formatRupiah($data->harga) ?></td>
                                <td><?= $data->stock ?></td>
                                <td>
                                    <button class="btn btn-xs btn-primary" id="select" data-id="<?= $data->item_id ?>" data-barcode="<?= $data->barcode ?>" data-nama="<?= $data->nama ?>" data-unit="<?= $data->unit_nama ?>" data-stock="<?= $data->stock ?>">
                                        <i class="fa fa-check"></i> Pilih
                                    </button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            //nama variable = sama dengan di form id
            var item_id = $(this).data('id');
            var barcode = $(this).data('barcode');
            var nama = $(this).data('nama');
            var unit_nama = $(this).data('unit');
            var stock = $(this).data('stock');
            $('#item_id').val(item_id);
            $('#barcode').val(barcode);
            $('#item_nama').val(nama);
            $('#unit_nama').val(unit_nama);
            $('#stock').val(stock);
            $('#modal-item').modal('hide');
        })
    })
</script>