<section class="content-header">
    <h1>Customer</h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Customer</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add Customer</h3>
            <div class="pull-right"><a href="<?= site_url('customer') ?>" class="btn btn-info btn-flat">
                    <i class="fa fa-reply"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Nama Customer</label>
                            <input required type="text" value="" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option value="">--- Pilih ---</option>
                                <option value="L" <?= set_value('jk') == 1 ? "selected" : null ?>>Laki- Laki</option>
                                <option value="P" <?= set_value('jk') == 2 ? "selected" : null ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telepon</label>
                            <input type="number" value="" name="tlpn" class="form-control">
                        </div>
                        <div class="form-group ">
                              <label for="">Alamat</label>
                              <input type="text" name="alamat" class="form-control" value="">
                          </div>
                        <div class="form-group">
                            <button type="submit"class="btn btn-success btn-flat">
                                <i class="fa fa-save"></i> Save
                            </button>
                            <button type="reset" class="btn btn-info btn-flat"> Reset</button>
                        </di>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>