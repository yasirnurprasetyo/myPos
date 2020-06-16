<section class="content-header">
  <h1>
    Dashboard
    <small>Control Panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Blank page</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?= $this->fungsi->countItem() ?></h3>
          <h4>Item Barang</h4>
        </div>
        <div class="icon">
          <i class="fa fa-cubes"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= $this->fungsi->countSuplier() ?></h3>
          <h4>Suplier</h4>
        </div>
        <div class="icon">
          <i class="fa fa-truck"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?= $this->fungsi->countCustomer() ?></h3>
          <h4>Customer</h4>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?= $this->fungsi->countUser() ?></h3>
          <h4>User</h4>
        </div>
        <div class="icon">
          <i class="fa fa-user-plus"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Grafik Penjualan Perbulan</h3>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="lineChart" style="height: 180px"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Data Stock</h3>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="pieChart" style="height: 180px"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Daftar Barang Habis</h3>
          <br>
          <small>Daftar barang yang memiliki stock kurang dari 10 buah</small>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stock</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($sisas->result() as $stock => $s) {
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $s->nama_barang ?></td>
                  <td><?= $s->stock_barang ?></td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3 col-6">
      <div class="description-block border-right">
        <span class="description-percentage text-primary"><i class="fas fa-chart-line"></i></span>
        <h5 class="description-header"><?= $transaksi ?></h5>
        <span class="description-text">TOTAL TRANSAKSI</span>
      </div>
    </div>
    <div class="col-sm-3 col-6">
      <div class="description-block border-right">
        <span class="description-percentage text-danger"><i class="fas fa-caret-square-up"></i></span>
        <h5 class="description-header"><?= $barangjual ?></h5>
        <span class="description-text">BARANG TERJUAL</span>
      </div>
    </div>
    <div class="col-sm-3 col-6">
      <div class="description-block border-right">
        <span class="description-percentage text-success"><i class="fas fa-hand-holding-usd"></i></span>
        <h5 class="description-header"><?= formatRupiah($pendapatan) ?></h5>
        <span class="description-text">PENDAPATAN</span>
      </div>
    </div>
    <div class="col-sm-3 col-6">
      <div class="description-block">
        <span class="description-percentage text-warning"><i class="fab fa-dropbox"></i></span>
        <h5 class="description-header"><?= $stockSisa ?></h5>
        <span class="description-text">STOCK TERSISA</span>
      </div>
    </div>
  </div>
</section>
<thead>