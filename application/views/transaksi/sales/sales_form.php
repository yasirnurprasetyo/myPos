<section class="content-header">
    <h1>Sales</h1><small>Penjualan Barang</small>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i></a></li>
        <li>Transaksi</li>
        <li class="active">Sales</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top">
                                <label for="date">Tanggal</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" id="date" value="<?= date('Y-m-d') ?>" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="date">Kasir</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input readonly type="text" id="user" value="<?= $this->fungsi->user_login()->nama ?>" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="date">Customer</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select type="text" id="customer" class="form-control">
                                        <option value="">Umum</option>
                                        <?php foreach ($customer as $c => $value) {
                                            echo '<option value="' . $value->customer_id . '">' . $value->nama . '</option>';
                                        } ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width:30%">
                                <label for="">Barcode</label>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <input type="hidden" id="item_id">
                                    <input type="hidden" id="harga">
                                    <input type="hidden" id="stock">
                                    <input type="text" id="barcode" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="qty">Jumlah</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="qty" value="1" min="1" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div>
                                    <button id="add_cart" class="btn btn-info">
                                        <i class="fa fa-cart-plus"></i> Add
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <div align="right">
                        <h4>Invoice <b><span id="invoice"><?= $nota ?></span></b></h4>
                        <h1><b><span id="total1" style="font-size: 50pt">0</span></b></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body" class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Produk Item</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th width="10%">Diskon Item</th>
                                <th width="15%">Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="cart_table">

                            <?php $this->view('transaksi/sales/cart_data') ?>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width:30%">
                                <label for="sub_total">Sub Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="sub_total" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="diskon">Diskon</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="diskon" value="" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="grand_total">Grand Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="grand_total" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width:30%">
                                <label for="cash">Bayar</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="cash" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; width:30%">
                                <label for="cash">Kembali</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="change" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table widt="100%">
                        <tr>
                            <td style="vertical-align: top">
                                <label for="note">Note</label>
                            </td>
                            <td>
                                <div>
                                    <textarea id="note" rows="3" class="form-control"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div>
                <button id="cancle_payment" class="btn btn-warning">
                    <i class="fa fa-reply"></i> Cancle
                </button><br><br>
                <button id="proses_payment" class="btn btn-success">
                    <i class="fa fa-save"></i> Proses Payment
                </button>
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
                <h4 class="modal-title">Add Product Item</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Barcode</th>
                            <th>Item Name</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($item as $i => $data) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->barcode ?></td>
                                <td><?= $data->nama ?></td>
                                <td><?= $data->unit_nama ?></td>
                                <td class="text-right"><?= formatRupiah($data->harga) ?></td>
                                <td class="text-right"><?= $data->stock ?></td>
                                <td class="text-right">
                                    <button class="btn btn-xs btn-info" id="select" data-id="<?= $data->item_id ?>" data-barcode="<?= $data->barcode ?>" data-nama="<?= $data->nama ?>" data-harga="<?= $data->harga ?>" data-stock="<?= $data->stock ?>">
                                        <i class="fa fa-check"></i> Select
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
<div class="modal fade" id="modal-item-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Update Product Item</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="cartid_item">
                <div class="form-group">
                    <label for="">Produk Item</label>
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" id="barcode_item" class="form-control" readonly>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control" id="produk_item" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="harga_item">Harga</label>
                    <input type="number" class="form-control" id="harga_item">
                 </div>
                 <div class="form-group">
                    <label for="qty_item">Jumlah</label>
                    <input type="number" class="form-control" id="qty_item" min="1">
                 </div>
                 <div class="form-group">
                    <label for="total_before">Total Sebelum Diskon</label>
                    <input type="number" class="form-control" id="total_before" readonly>
                 </div>
                 <div class="form-group">
                    <label for="diskon_item">Diskon Per Item</label>
                    <input type="number" class="form-control" id="diskon_item" min="0">
                 </div>
                 <div class="form-group">
                    <label for="total_item">Total Setelah Diskon</label>
                    <input type="number" class="form-control" id="total_item" readonly>
                 </div>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button id="edit_cart" class="btn btn-flat btn-success">
                        <i class="fa fa-save"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '#select', function() {
        $('#item_id').val($(this).data('id'))
        $('#barcode').val($(this).data('barcode'))
        $('#harga').val($(this).data('harga'))
        $('#stock').val($(this).data('stock'))
        $('#modal-item').modal('hide');
    })
    $(document).on('click', '#add_cart', function() {
        var item_id = $('#item_id').val();
        var harga = $('#harga').val();
        var stock = $('#stock').val();
        var qty = $('#qty').val();
        if (item_id == '') {
            alert('Produk belum dipilih')
            $('#barcode').focus()
        } else if (stock < 1) {
            alert('Stock tidak cukup')
            $('#item_id').val('')
            $('#barcode').val('')
            $('#barcode').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sales/proses') ?>',
                data: {
                    'add_cart': true,
                    'item_id': item_id,
                    'harga': harga,
                    'qty': qty
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('sales/cart_data') ?>', function() {
                            kalkulasi()
                        })
                        $('#item_id').val('')
                        $('#barcode').val('')
                        $('#qty').val(1)
                        $('#barcode').focus()
                    } else {
                        alert('Gagal tambah item ke cart')
                    }
                }
            })
        }
    })
    $(document).on('click', '#del_cart', function() {
        if (confirm('Apakah anda yakin??')) {
            var cart_id = $(this).data('cartid')
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sales/cart_del') ?>',
                dataType: 'json',
                data: {
                    'cart_id': cart_id
                },
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('sales/cart_data') ?>', function() {
                            kalkulasi()
                        })
                    } else {
                        alert("Gagal hapus item cart");
                    }
                }
            })
        }
    })
    $(document).on('click', '#update_cart', function() {
        $('#cartid_item').val($(this).data('cartid'))
        $('#barcode_item').val($(this).data('barcode'))
        $('#produk_item').val($(this).data('produk'))
        $('#harga_item').val($(this).data('harga'))
        $('#qty_item').val($(this).data('qty'))
        $('#total_before').val($(this).data('harga') * $(this).data('qty'))
        $('#diskon_item').val($(this).data('diskon'))
        $('#total_item').val($(this).data('total'))
    })

    function count_edit_modal() {
        var harga = $('#harga_item').val()
        var qty = $('#qty_item').val()
        var diskon = $('#diskon_item').val()

        total_before = harga * qty
        $('#total_before').val(total_before)

        total = (harga - diskon) * qty
        $('#total_item').val(total)

        if(diskon == '') {
            $('#diskon_item').val(0)
        }
    }
    $(document).on('keyup mouseup', '#harga_item, #qty_item, #diskon_item', function() {
        count_edit_modal()
    })

    $(document).on('click', '#edit_cart', function() {
        var cart_id = $('#cartid_item').val();
        var harga = $('#harga_item').val();
        var diskon = $('#diskon_item').val();
        var qty = $('#qty_item').val();
        var total = $('#total_item').val();
        if (harga == '' || harga < 1) {
            alert('Harga tidak boleh kosong')
            $('#harga_item').focus()
        } else if (qty < 1 || qty == '') {
            alert('Jumlah item minimal 1 atau tidak boleh kosong')
            $('#qty_item').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sales/proses') ?>',
                dataType: 'json',
                data: {
                    'edit_cart': true,
                    'cart_id': cart_id,
                    'harga': harga,
                    'qty': qty,
                    'diskon': diskon,
                    'total': total
                },
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('sales/cart_data') ?>', function() {
                            kalkulasi()
                        })
                        alert('Data berhasil terupdate')
                        $('#modal-item-edit').modal('hide');
                    } else {
                        alert('Data item ke cart tidak terupdate')
                    }
                }
            })
        }
    })
    
    function kalkulasi() {
        var subtotal = 0;
        $('#cart_table tr').each(function() {
            subtotal += parseInt($(this).find('#total').text())
        })
        isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

        var diskon = $('#diskon').val()
        var grand_total = subtotal - diskon
        if(isNaN(grand_total)) {
            $('#grand_total').val(0)
            $('#total1').text(0) //span dan div pakai text
        }else{
            $('#grand_total').val(grand_total)
            $('#total1').text(grand_total)
        }

        var cash = $('#cash').val();
        cash != 0 ? $('#change').val(cash - grand_total) : $('#cahnge').val(0)
    }

    $(document).on('keyup mouseup', '#diskon, #cash', function() {
        kalkulasi()
    })

    $(document).ready(function() {
        kalkulasi()
    })

    $(document).on('click', '#proses_payment', function() {
        var customer_id = $('#customer').val()
        var subtotal = $('#sub_total').val()
        var diskon = $('#diskon').val()
        var grandtotal = $('#grand_total').val()
        var cash = $('#cash').val()
        var change = $('#change').val()
        var note = $('#note').val()
        var date = $('#date').val()
        if(subtotal < 1){
            alert('Belum ada produk item yang dipilih')
            $('#barcode').focus()
        }else if(cash < 1){
            alert('Jumlah uang belum diinput')
            $('#cash').focus()
        }else{
            if(confirm('Yakin proses transaksi ini?')){
                $.ajax({
                    url: '<?= site_url('sales/proses') ?>',
                    type: "POST",
                    dataType: "json",
                    data: {
                        'proses_payment': true,
                        'customer_id': customer_id,
                        'subtotal': subtotal,
                        'diskon': diskon,
                        'grandtotal': grandtotal,
                        'cash': cash,
                        'change': change,
                        'note': note,
                        'date': date
                    },
                    success: function(result) {
                        if(result.success) {
                            alert('Transaksi berhasil');
                            window.open('<?=site_url('sales/cetak/')?>' + result.sales_id, '_blank')
                        } else {
                            alert('Transaksi gagal');
                        }
                        location.href='<?=site_url('sales')?>'
                    }
                })
            }
        }
    })

    $(document).on('click', '#cancle_payment', function(){
        if(confirm('Apakah Anda yakin ?')) {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('sales/cart_del') ?>',
                dataType: 'json',
                data: {'cancle_payment': true},
                success: function(result) {
                    if(result.success == true){
                        $('#cart_table').load('<?= site_url('sales/cart_data') ?>', function() {
                            kalkulasi()
                        })
                    }
                }
            })
            $('#diskon').val(0)
            $('#cash').val(0)
            $('#customer').val(0).change()
            $('#barcode').val('')
            $('#barcode').focus()
        }
    })
</script>