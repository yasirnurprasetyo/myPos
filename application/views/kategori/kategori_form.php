<section class="content-header">
    <h1>Kategori</h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa.fa-dashboard"></i></a></li>
        <li class="active">Kategori</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> kategori</h3>
            <div class="pull-right"><a href="<?= site_url('kategori') ?>" class="btn btn-info btn-flat">
                    <i class="fa fa-reply"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?= site_url('kategori/proses') ?>" method="post">
                        <div class="form-group">
                            <label for="">Nama kategori *</label>
                            <input type="hidden" name="id" value="<?= $row->kategori_id  ?>">
                            <input required type="text" value="<?= $row->nama?>" name="kategori_name" class="form-control">
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