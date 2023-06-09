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
        <?php $this->load->view('_partials/sidebar.php')?>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <?php $this->load->view('_partials/navbar.php')?>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title">Form Tambah Penyakit</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                  <div class="card-body p-0 pb-3 text-center">
                  <form  method="post" action="<?=base_url('penyakit/add_penyakit')?>">
                     <div class="form-group">
                        <label class="page-title" style="float:left"><b> Kode Penyakit </b></label>
                        <div class="col-md-12">
                              <input type="text" class="form-control" id="kd_penyakit" name="kd_penyakit"placeholder="Inputkan Kode Penyakit" required value=""> </div>
                        </div>
                        <div class="form-group">
                        <label class="page-title" style="float:left"><b> Nama Penyakit </b></label>
                        <div class="col-md-12">
                              <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" placeholder="Inputkan Nama Penyakit" required value=""> </div>
                        </div>
                        <label class="page-title" style="float:left"><b> Solusi </b></label>
                        <br/><br/>
                        <div class="col-md-12">
                        <textarea class="form-control" id="solusi" name="solusi" placeholder="Inputkan Solusi" required value="" rows="5"></textarea>
                         </div>
                        </div>                        
                          <div class="form-group">
							<div class="col-md-12">
								<button type="reset" class="btn btn-danger" style="float:right">Reset</button>
								<div class="col-md-11">
									<button type="submit" class="btn btn-primary" style="float:right">Submit</button></div>
								</div>
							</div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>
        </main>
      </div>
    </div>
    <?php $this->load->view('_partials/footer.php')?>
</body>
</html>