<!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>mc_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>mc_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>mc_assets/dist/css/adminlte.min.css">
  <!-- Datatable -->
  <link rel="stylesheet" href="<?= base_url() ?>mc_vendor_frontend/datatable/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>mc_sweetalert/sweetalert.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url() ?>mc_assets/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?= base_url() ?>mc_assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>mc_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>mc_asset_gambar/tag/tagsinput.css">
  <link rel="stylesheet" href="<?= base_url() ?>mc_assets/responsive.dataTables.min.css">
  <style>
  .swithbox{
            position: relative;
            display: inline-block;
            width: 100px;
            height: 20px;
            background-color: #eee;
            border-radius: 20px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, .2);
        }
        .swithbox::after{
            content: attr(data-off);
            position: absolute;
            width: 78px;
            height: 18px;
            font-size: 14px;
            border-radius: 20px;
            background-color: white;
            top: 1px;
            left: 1px;
            text-align: center;
            transition: all 0.3s;
            font-family: Arial, Helvetica, sans-serif;
        }
        .checkbox:checked + .swithbox::after{
            content: attr(data-on);
            left: 20px;
        }
        .checkbox:checked + .swithbox{
            background-color: violet;
        }
        .checkbox{
            display: none;
        }
        .text-dark, .breadcrumb-item{
          text-transform: capitalize;
        }
  </style>