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
<style>
    img.tengah {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
</style>
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
            <!-- End Page Header -->
            <!-- Default Light Table -->
            
            <div class="col-12 col-sm-12 text-center text-sm-left mb-0">                                
                    <div class="content">
                        <h3 class="text-center">Struktur Ikan</h3>
                        <br>                      
                    </div> 
                    <div class="content">
                        <h5 class="text-center">Berikut ini adalah beberapa struktur ikan yang perlu diketahui</h5>
                        <br>                      
                    </div> 
                    <div class="content">
                    <img class="tengah" style="width:650px;height:400px;" src="<?= base_url('assets/images/morfologi_ikan.jpg')?>" alt="Morfologi Ikan">
                    <br>                      
                    </div>
                    <div class="content">
                    <img class="tengah" style="width:500px;height:300px;" src="<?= base_url('assets/images/struktur_ikan.jpg')?>" alt="Struktur Ikan">
                    <br>                      
                    </div>
                    <!-- <h6 class="m-0">Active Users</h6> -->
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>
        <?php $this->load->view('user/_partials/footer.php')?>
  </body>
</html>