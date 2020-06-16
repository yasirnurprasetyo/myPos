<section class="content-header">
    <h1>Customer</h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa.fa-dashboard"></i></a></li>
        <li class="active">Customer</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit customer</h3>
            <div class="pull-right"><a href="<?= site_url('customer') ?>" class="btn btn-info btn-flat">
                    <i class="fa fa-reply"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php //echo validation_errors(); 
                    ?>
                    <form action="" method="post">
                        <div class="form-group <?= form_error('nama') ? 'has-error' : null ?>">
                            <label for="">Nama Customer *</label>
                            <input type="hidden" name="customer_id" value="<?= $row->customer_id?>">
                            <input required type="text" value="<?= $this->input->post('nama') ?? $row->nama  ?>" name="nama" class="form-control">
                            <?= form_error('nama') ?>
                        </div>
                        <div class="form-group <?= form_error('jk') ? 'has-error' : null ?>">
                            <label for="">Jenis Kelamin *</label>
                            <select name="jk" class="form-control">
                                <?php $jk = $this->input->post('jk') ? $this->input->post('jk') : $row->jk ?>
                                  <option value="L" >Laki-laki</option>
                                  <option value="P" <?= $jk == "P" ? 'selected' : null ?>>Perempuan</option>
                            </select>
                            <?= form_error('jk') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telepon</label>
                            <input type="number" value="<?= $this->input->post('tlpn') ?? $row->tlpn  ?>" name="tlpn" class="form-control">
                        </div>
                        <div class="form-group <?= form_error('alamat') ? 'has-error' : null ?>">
                            <label for="">Alamat *</label>
                            <input type="text" name="alamat" class="form-control" value="<?= $this->input->post('alamat') ?? $row->alamat  ?>">
                            <?= form_error('alamat') ?>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>
                            <button class="btn btn-info" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>