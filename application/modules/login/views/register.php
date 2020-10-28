<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Marketplace</title>
  <link rel="icon" type="image/png" href="<?= base_url() ?>icon/sipintarr.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="<?= base_url('asset_gambar/register.css') ?>" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
  <!-- main -->
  <div class="main-w3layouts wrapper">
    <h1>Pendaftaran Sipintar</h1>
    <div class="main-agileinfo">
      <div class="agileits-top">
        <form action="<?= site_url() ?>login/register_akun" method="post">
          <input class="text" type="text" name="username" placeholder="Username" required="">
          <input class="text" type="password" name="password" placeholder="Password" required="">
          <input class="text" type="email" name="email" placeholder="Email" required="">
          <input class="text" type="text" name="telp" placeholder="No Telp" required="">
          <input class="text" type="hidden" name="sebagai" placeholder="Daftar Sebagai" required="" value="<?= $user; ?>">
          <input class="text" type="hidden" name="status" placeholder="Daftar Sebagai" required="" value="aktif">
          <div class="wthree-text" style="padding: 10px 0; display: block;">
            <label class="anim">
              <input type="checkbox" class="checkbox" required="">
              <span>Setuju dengan syarat dan ketentuan yang berlaku</span>
            </label>
            <div class="clear"> </div>
          </div>
          <input type="submit" value="SIGNUP">
        </form>
        <p>Sudah punya akun? <a href="<?= site_url('login'); ?>"> Login Sekarang!</a></p>
      </div>
    </div>
    <!-- copyright -->
    <div class="colorlibcopy-agile">
      <p>&copy Copyright by Sipintar</a></p>
    </div>
    <!-- //copyright -->
    <ul class="colorlib-bubbles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <!-- //main -->
</body>
</html>
