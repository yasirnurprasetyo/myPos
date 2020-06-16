<section class="content-header">
      <h1>User<small>Pengguna</small></h1>
      <ol class="breadcrumb">
          <li><a href=""><i class="fa.fa-dashboard"></i></a></li>
          <li class="active">User</li>
      </ol>
  </section>
  <section class="content">
      <div class="box">
          <div class="box-header">
              <h3 class="box-title">Edit User</h3>
              <div class="pull-right"><a href="<?= site_url('user') ?>" class="btn btn-info btn-flat">
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
                              <label for="">Nama *</label>
                              <input type="hidden" name="user_id" value="<?= $row->user_id?>">
                              <input type="text" value="<?= $this->input->post('nama') ?? $row->nama  ?>" name="nama" class="form-control">
                              <?= form_error('nama') ?>
                          </div>
                          <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
                              <label for="">Username *</label>
                              <input type="text" name="username" value="<?= $this->input->post('username') ?? $row->username  ?>" class="form-control">
                              <?= form_error('username') ?>
                          </div>
                          <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                              <label for="">Password</label> <small>(Biarkan kosong jika tidak diganti)</small>
                              <input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control">
                              <?= form_error('password') ?>
                          </div>
                          <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                              <label for="">Password Konfirmasi *</label>
                              <input type="password" name="passconf" value="<?=$this->input->post('passconf')?>" class="form-control">
                              <?= form_error('passconf') ?>
                          </div>

                          <div class="form-group <?= form_error('alamat') ? 'has-error' : null ?>">
                              <label for="">Alamat *</label>
                              <input type="text" name="alamat" class="form-control" value="<?= $this->input->post('alamat') ?? $row->alamat  ?>">
                              <?= form_error('alamat') ?>
                          </div>
                          <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                              <label for="">Level *</label>
                              <select name="level" class="form-control">
                                  <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->lavel ?>
                                  <option value="1" >Admin</option>
                                  <option value="2" <?= $level == 2 ? 'selected' : null ?>>Kasir</option>
                              </select>
                              <?= form_error('level') ?>
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