<section class="content-header">
    <h1>Suplier</h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa.fa-dashboard"></i></a></li>
        <li class="active">Suplier</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Suplier</h3>
            <div class="pull-right"><a href="<?= site_url('suplier') ?>" class="btn btn-info btn-flat">
                    <i class="fa fa-reply"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('suplier/proses') ?>" method="post">
                        <div class="form-group">
                            <label for="">Nama Suplier *</label>
                            <input type="hidden" name="id" value="<?= $row->suplier_id  ?>">
                            <input required type="text" value="<?= $row->nama?>" name="suplier_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telepon *</label>
                            <input required type="number" value="<?= $row->tlpn?>" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat *</label>
                            <textarea required name="addr" class="form-control"><?= $row->alamat?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea name="desc" class="form-control"><?= $row->deskripsi?></textarea>
                        </div>
                        <di class="form-group">
                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
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