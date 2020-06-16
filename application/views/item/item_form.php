<section class="content-header">
    <h1>Item</h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa.fa-dashboard"></i></a></li>
        <li class="active">Item</li>
    </ol>
</section>
<section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> item</h3>
            <div class="pull-right"><a href="<?= site_url('item') ?>" class="btn btn-info btn-flat">
                    <i class="fa fa-reply"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php echo form_open_multipart('item/proses') ?>
                    <div class="form-group">
                        <label for="">Barcode *</label>
                        <input type="hidden" name="id" value="<?= $row->item_id  ?>">
                        <input required type="text" value="<?= $row->barcode ?>" name="barcode" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Barang*</label>
                        <input required type="text" value="<?= $row->nama ?>" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori*</label>
                        <select name="kategori" class="form-control">
                            <option value=""> --- Pilih ---</option>
                            <?php foreach ($kategori->result() as $key => $data) { ?>
                                <option value="<?= $data->kategori_id ?>" <?= $data->kategori_id == $row->kategori_id ? "selected" : null ?>><?= $data->nama ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Unit*</label>
                        <?php echo form_dropdown('unit', $unit, $selectedunit, ['class' => 'form-control', 'required']); ?>
                    </div>
                    <div class="form-group">
                        <label for="">Harga*</label>
                        <input required type="number" value="<?= $row->harga ?>" name="harga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <?php if ($page == 'edit') {
                            if ($row->image != null) { ?>
                                <div style="margin-bottom: 5px">
                                    <img src="<?= base_url('uploads/produk/'.$row->image)?>" style="width: 80%">
                                </div>
                        <?php
                            }
                        } ?>
                        <input type="file" name="image" class="form-control">
                        <small>(Biarkan kosong jika tidak <?= $page == 'edit' ? 'diganti' : 'ada' ?>)</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                            <i class="fa fa-save"></i> Save
                        </button>
                        <button type="reset" class="btn btn-info btn-flat"> Reset</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</section>