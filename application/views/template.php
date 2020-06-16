<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POS | Barang 2</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script> -->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- jQuery 3 -->
  <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini <?= $this->uri->segment(1) == 'sales' ? 'sidebar-collapse' : null ?>">
  <!-- Site wrapper -->
  <div class="wrapper">
    <header class="main-header">
      <a href="<?= base_url() ?>assets/index2.html" class="logo">
        <span class="log o-mini"><b>m</b>POS</span>
        <span class="logo-lg"><b>Barang</b>2</span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            <!-- User Account -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= ucfirst($this->fungsi->user_login()->username) ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    <?= ucfirst($this->fungsi->user_login()->nama) ?>
                    <small><?= $this->fungsi->user_login()->alamat ?></small>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= site_url('auth/logout') ?>" class="btn btn-danger btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?= ucfirst($this->fungsi->user_login()->username) ?> </p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
            <a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
          </li>
          <li <?= $this->uri->segment(1) == 'suplier' ? 'class="active"' : '' ?>>
            <a href="<?= site_url('suplier') ?>"><i class="fa fa-truck"></i> <span>Suplier</span></a>
          </li>
          <li <?= $this->uri->segment(1) == 'customer' ? 'class="active"' : '' ?>>
            <a href="<?= site_url('customer') ?>"><i class="fa fa-users"></i> <span>Customer</span></a>
          </li>
          <li class="treeview <?= $this->uri->segment(1) == 'kategori' ||  $this->uri->segment(1) == 'unit' ? "active" : '' ?>">
            <a href="#">
              <i class="fa fa-archive"></i> <span>Produk</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <li <?= $this->uri->segment(1) == 'kategori' ? 'class="active"' : '' ?>><a href="<?= site_url('kategori') ?>"><i class="fa fa-circle-o"></i> Kategori</a></li>
              <li <?= $this->uri->segment(1) == 'unit' ? 'class="active"' : '' ?>><a href="<?= site_url('unit') ?>"><i class="fa fa-circle-o"></i> Unit</a></li>
              <li><a href="<?= site_url('item') ?>"><i class="fa fa-circle-o"></i> Item</a></li>
            </ul>
          </li>
          <li class="treeview <?= $this->uri->segment(1) == 'stock' || $this->uri->segment(1) == 'sales' ? "active" : '' ?>">
            <a href="#">
              <i class="fa fa-shopping-cart"></i> <span>Transaction</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <li <?= $this->uri->segment(1) == 'sales' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('sales') ?>"><i class="fa fa-circle-o"></i> Penjualan</a>
              </li>
              <!-- <li <?= $this->uri->segment(1) == 'riwayat' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('riwayat') ?>"><i class="fa fa-circle-o"></i> Riwayat Transaksi</a>
              </li> -->
              <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('stock/in') ?>"><i class="fa fa-circle-o"></i> Stock In</a>
              </li>
              <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'out' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('stock/out') ?>"><i class="fa fa-circle-o"></i> Stock Out</a>
              </li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i> <span>Laporan</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <li><a href=""><i class="fa fa-circle-o"></i> Sales</a></li>
              <li><a href="<?= site_url('laporan/lap_stock_barang') ?>"><i class="fa fa-circle-o"></i> Stock</a></li>
            </ul>
          </li>
          <?php if ($this->fungsi->user_login()->level == 1) {
          ?>
            <li class="header">Pengaturan</li>
            <li>
              <a href="<?= site_url('user') ?>"><i class="fa fa-user"></i> <span>Users</span></a>
            </li>
          <?php } ?>
        </ul>
      </section>
    </aside>

    <!-- Content Wrapper-->
    <div class="content-wrapper">
      <?php echo $contents ?>
    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2020 <a href="https://adminlte.io">Yasir Nur Prasetya</a>.</strong> All rights
      reserved.
    </footer>
  </div>
  <!-- ./wrapper -->
  <!-- jQuery 3 -->
  <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <!-- DataTables -->
  <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap  -->
  <script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url() ?>assets/bower_components/chart.js/Chart.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="dist/js/pages/dashboard2.js"></script> -->
  <!-- page script -->
  <script>
    $(function() {
      $("#dataTable").DataTable();

      var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
      var areaPieChartCanvas = $('#pieChart').get(0).getContext('2d')

      var lineChartData = {
        labels: [
          <?php
          if (count($trans) > 0) {
            foreach ($trans as $data) {
              echo "'" . bulan($data->bulan) . "',";
            }
          }
          ?>
        ],
        datasets: [{
          label: 'Pendapatan',
          backgroundColor: 'rgba(60,141,188,0.9)',
          borderColor: 'rgba(60,141,188,0.8)',
          pointRadius: true,
          pointColor: '#FF7F00',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [
            <?php
            if (count($trans) > 0) {
              foreach ($trans as $data) {
                echo "'" . $data->totals . "',";
              }
            }
            ?>
          ]
        }, ]
      }

      var areaPieChartData = {
        labels: ['Stock In', "Stock Out"],
        datasets: [{
          backgroundColor: ['#28a745', '#dc3545'],
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: []
        }]
      }

      var lineChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false,
            }
          }],
          yAxes: [{
            gridLines: {
              display: false,
            }
          }]
        }
      }

      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineChartData,
        options: lineChartOptions
      })

      var areaPieChart = new Chart(areaPieChartCanvas, {
        type: 'doughnut',
        data: areaPieChartData,
        // options: areaChartOptions
      });
    });
  </script>

</body>

</html>