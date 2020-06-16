<section class="content">
    <div class="box">
        <div class="box-header">
            <h1 class="box-title">Data Suplier</h1>
            <div class="pull-right">
                <a href="<?= site_url('suplier/add') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
                <a href="<?= site_url('laporan/suplier') ?>" class="btn btn-info">
                    <i class="fa fa-print"></i> Laporan Suplier Excel
                </a>
            </div>
        </div>
        <div class="box-body">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Suplier</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
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
                            <td><?= $data->tlpn ?></td>
                            <td><?= $data->alamat ?></td>
                            <td><?= $data->deskripsi ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('suplier/edit/' . $data->suplier_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="<?= site_url('suplier/del/' . $data->suplier_id) ?>" onclick="return confirm('Yakin Hapus Data ?')" class="btn btn-danger btn-xs">
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