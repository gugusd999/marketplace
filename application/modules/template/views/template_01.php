
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $title_html ?></title>
  <link rel="icon" type="image/png" href="<?= base_url() ?>icon/sipintarr.png"/>
  <?php $this->load->view('template/css'); ?>
  <style>
    .form-group label{
      text-transform: uppercase;
    }
  </style>
</head>
<?php $this->load->view('template/js'); ?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <div class="wrapper">

  <?php $this->load->view('template/navbar'); ?>
  <!-- Navbar -->

  <!-- /.navbar -->

  <?php $this->load->view('template/side_navbar'); ?>

  <div class="content-wrapper">
      <?php $this->load->view($folder.'/'.$file); ?>
  </div>

  <footer class="main-footer">
    <strong>Develop by Medcon</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>

</body>
</html>
