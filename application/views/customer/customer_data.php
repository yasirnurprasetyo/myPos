<section class="content">
    <div class="box">
        <div class="box-header">
            <h1 class="box-title">Data Customer</h1>
            <div class="pull-right">
                <a href="<?= site_url('customer/add') ?>" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
                <a href="<?= site_url('laporan/customer') ?>" class="btn btn-info">
                    <i class="fa fa-print"></i> Laporan Customer Excel
                </a>
            </div>
        </div>
        <div class="box-body">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama customer</th>
                        <th>Jenis Kelamib</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
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
                            <td><?= $data->jk == "L" ? "Laki-laki" : "Perempuan" ?></td>
                            <td><?= $data->tlpn ?></td>
                            <td><?= $data->alamat ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('customer/edit/' . $data->customer_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <a href="<?= site_url('customer/del/' . $data->customer_id) ?>" onclick="return confirm('Yakin Hapus Data ?')" class="btn btn-danger btn-xs">
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