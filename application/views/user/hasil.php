<!doctype html>
<html class="no-js h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>KoLe - Konsultasi Lele</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="<?= base_url('assets/') ?>styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>styles/extras.1.1.0.min.css">
    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
  <style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style>
</head>
  <body class="h-100">
    
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <?php $this->load->view('user/_partials/sidebar.php')?>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <?php $this->load->view('user/_partials/navbar.php')?>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Hasil Diagnosa</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
				            <div class="xs">
					            <br>
				            </div>
                  
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table table-bordered" border="2">
                            <tr>
                                <td style="text-align: left">Tanggal</td>
                                <td style="text-align: left"><?php echo  date ('d-m-Y', strtotime( $konsultasi['tgl_konsultasi']))?></td>
                            </tr>
                            <tr>
                                <td style="text-align: left">Nama Lengkap</td>
                                <td style="text-align: left"><?php echo $konsultasi['nama_user'] ?></td>
                            </tr>                           
                            <tr>
                                <td style="text-align: left">Gejala</td>
                                <td style="text-align: left"><?php echo  $konsultasi['kode_gejala'] ?></td>
                            </tr>
                            <tr>
                                <td style="text-align: left">Penyakit</td>
                                <td style="text-align: left"><?php echo  $penyakit->nama_penyakit ?></td>
                            </tr>
                            <tr>
                                <td style="text-align: left">Solusi</td>
                                <td style="text-align: left"><?php echo  $penyakit->solusi ?></td>
                            </tr>
                    </table>
                  </div>
                  <div class="text-center">
                        <a href="<?= base_url('user') ?>" class="btn btn-primary">Selesai</a>
                    </div><br>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>
        <?php $this->load->view('user/_partials/footer.php')?>
  </body>
</html>