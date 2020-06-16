<section class="content">
    <div class="box">
        <div class="box-header">
            <h1 class="box-title">Data Unit Barang</h1>
            <div class="pull-right">
                <a href="<?= site_url('unit/add') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
            </div>
        </div>
        <div class="box-body">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Unit</th>
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
                            <td><?= $data->nama ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('unit/edit/' . $data->unit_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="<?= site_url('unit/del/' . $data->unit_id) ?>" onclick="return confirm('Yakin Hapus Data ?')" class="btn btn-danger btn-xs">
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