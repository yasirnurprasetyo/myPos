<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h1 class="box-title">Data User</h1>
            <div class="pull-right">
                <a href="<?= site_url('user/add') ?>" class="btn btn-primary">
                    <i class="fa fa-user-plus"></i> Tambah Data
                </a>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama User</th>
                        <th>Alamat User</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($row->result() as $u => $data) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->username ?></td>
                            <td><?= $data->nama ?></td>
                            <td><?= $data->alamat ?></td>
                            <td><?= $data->level == 1 ? "Admin" : "Kasir" ?></td>
                            <td class="text-center" width="160px">
                                <a href="<?= site_url('user/edit/' . $data->user_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-edit"></i> Update
                                </a>
                                <form action="<?= site_url('user/del') ?>" method="post">
                                <input type="hidden" name="user_id" value="<?=$data->user_id ?>">
                                    <button onclick="return confirm('Apakah anda yakin hapus data ini ?')" class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
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