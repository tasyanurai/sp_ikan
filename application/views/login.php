<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>KoLe - Konsultasi Lele</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons'><link rel="stylesheet" href="<?= base_url('assets/') ?>dist/style.css">

</head>
<body style="background-image: url('assets/images/lele3.png'); background-size: 50%" >
<!-- partial:index.partial.html -->
<!-- Form-->
<div class="form">
  <div class="form-toggle"></div>
  <div class="form-panel one">
    <div class="form-header">
    <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 50px;" src="<?= base_url('assets/images/lele2.png')?>" alt="">
    <h1 class="d-none d-md-inline ml-1" style="text-align:center">KoLe-Konsultasi Lele</h1>
      <!-- <h1>Welcome to KoLe</h1>  -->
    </div>
    <div class="form-content">
    <form action="<?=base_url('login/aksi_login')?>" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required="required"/>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required="required"/>
        </div>
        <div class="form-group">
          <button type="submit" onclick="myFunction()" value="Masuk">Log In</button>
        </div>
      </form>
    </div>
  </div>
  <div class="form-panel two">
    <div class="form-header">
      <h1>Register Account</h1>
    </div>
    <div class="form-content">
      <form>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required="required"/>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required="required"/>
        </div>
        <div class="form-group">
          <label for="cpassword">Confirm Password</label>
          <input type="password" id="cpassword" name="cpassword" required="required"/>
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" required="required"/>
        </div>
        <div class="form-group">
          <button type="submit">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://codepen.io/andytran/pen/vLmRVp.js'></script><script  src="<?= base_url('assets/') ?>script.js"></script>

</body>
</html>
