    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title_html; ?></title>
        <?php $this->load->view('template/material_css'); ?>
        </head>
        <?php $this->load->view('template/material_js'); ?>
      <body class="transition">

        <?php $this->load->view('template/material_navbar'); ?>

        <?php $this->load->view($folder.'/'.$file); ?>

        <footer class="page-footer blue darken-3">
          <div class="row">
            <div class="col s12 m4 l3">
              <h6 style="font-weight: bold;">Kategori Populer</h6>
              <p>Mobil Bekas</p>
              <p>Rumah & Apartemen</p>
              <p>Motor Bekas</p>
              <p>Handphone</p>
            </div>
            <div class="col s12 m4 l3">
              <h6 style="font-weight: bold;">Pencarian Populer</h6>
              <p>Mobil Bekas</p>
              <p>Rumah & Apartemen</p>
              <p>Motor Bekas</p>
              <p>Handphone</p>
            </div>
            <div class="col s12 m4 l3">
              <h6 style="font-weight: bold;">Kategori Populer</h6>
              <p>Mobil Bekas</p>
              <p>Rumah & Apartemen</p>
              <p>Motor Bekas</p>
              <p>Handphone</p>
            </div>
            <div class="col s12 m4 l3">
              <h6 style="font-weight: bold;">Ikuti Kami</h6>
              <img width="50px" src="<?= base_url('icon-sosmed/instagram.png') ?>" alt="">
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
              © 2020 Copyright by medcon
            </div>
          </div>
        </footer>
        <script type="text/javascript">
          $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            indicators: true
          });
        </script>
      </body>
    </html>
