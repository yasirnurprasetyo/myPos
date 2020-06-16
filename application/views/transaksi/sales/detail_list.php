<section class="content">
    <?php $this->view('message') ?>
    <div class="box">
        <div class="box-header">
            <h1 class="box-title">Riwayat Transaksi</h1>
            <div class="pull-right">
                <a href="<?= site_url('sales') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Transaksi
                </a>
            </div>
        </div>
        <div class="box-body">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($barang as $r => $data) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->nota ?></td>
                            <td><?= $data->tanggal ?></td>
                            <td><?= $data->user_nama ?></td>
                            <td>
                                <a href="" class="btn btn-warning">
                                    <i class="fa fa-eye"></i> Detail
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