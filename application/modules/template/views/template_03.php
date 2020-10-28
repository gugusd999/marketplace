<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sipintar</title>
    <link rel="icon" type="image/png" href="<?= base_url() ?>icon/sipintarr.png"/>
    <link rel="stylesheet" href="<?= base_url(); ?>mc_asset_gambar/mimo/mimo.min.css<?= $cacheclear; ?>">
</head>
    <script src="<?= base_url(); ?>mc_asset_gambar/mimo/jquery.js<?= $cacheclear; ?>"></script>
<body>
    <nav class="nav bg-light-blue">
        <div class="title">
            <h1>Sipintar</h1>
        </div>
        <div>
            <input class="search" type="text" placeholder="search...">
            <ul>
                <li class="active">
                    <a href="<?= site_url(); ?>">
                        Home
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('bacaan'); ?>">
                        Bacaan
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('ruang_siswa'); ?>">
                        Ruang Siswa
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('ruang_guru'); ?>">
                        Ruang Guru
                    </a>
                </li>
            </ul>
            <a href="#" class="home-menu">
                <img src="<?= base_url(); ?>mc_asset_gambar/mimo/img/align-justify.svg" alt="">
            </a>
        </div>
    </nav>

    <div class="nav-mobile">
        <p>
            <a class="close" href="">
                <img src="<?= base_url(); ?>mc_asset_gambar/mimo/img/external-link-symbol.svg" alt="">
            </a>
        </p>
        <ul>
            <li class="active">
                <a href="<?= site_url(); ?>">
                    Home
                </a>
            </li>
            <li>
                <a href="<?= site_url('bacaan'); ?>">
                    Bacaan
                </a>
            </li>
            <li>
                <a href="<?= site_url('ruang_siswa'); ?>">
                    Ruang Siswa
                </a>
            </li>
            <li>
                <a href="<?= site_url('ruang_guru'); ?>">
                    Ruang Guru
                </a>
            </li>
        </ul>
    </div>
    

    <?php $this->load->view($folder.'/'.$file); ?>
    

    <div class="tab-bar">
        <input class="search" type="text" placeholder="search...">
        <a href="" class="search-icon">
            <img src="<?= base_url(); ?>mc_asset_gambar/mimo/img/search-svgrepo-com.svg" alt="">
            <p>search</p>
        </a>
        <a href="<?= site_url('/') ?>" class="filter-dark-blue">
            <img src="<?= base_url(); ?>mc_asset_gambar/mimo/img/home.svg" alt="">
            <p>home</p>
        </a>
        <a href="<?= site_url('/bacaan') ?>" class="filter-blue">
            <img src="<?= base_url(); ?>mc_asset_gambar/mimo/img/book.svg" alt="">
            <p>bacaan</p>
        </a>
        <a href="" class="filter-green">
            <img src="<?= base_url(); ?>mc_asset_gambar/mimo/img/icons8-whatsapp.svg" alt="">
            <p>whatsapp</p>
        </a>
    </div>

    <footer class="mt-2">
            <div class="row">
                <div class="pd-1">
                    <h1>Sipintar</h1>
                    <p>Belajar cerdas disni.</p>
                    <h3 class="text-orange">About Us</h3>
                    <p>Belar online terpercaya.</p>
                    <h3 class="text-orange">Contact Us</h3>
                    <p>
                        <a class="text-white" href="">
                            <img src="<?= base_url(); ?>mc_asset_gambar/mimo/img/mobile-phone.svg" alt="">
                            085800455338
                        </a>
                    </p>
                </div>
                <div class="pd-1">
                    <h3 class="text-orange">Information</h3>
                    <p>home</p>
                    <p>galery</p>
                    <p>blog</p>
                    <p>contact</p>
                </div>
                <div class="pd-1">
                    <h3 class="text-orange">Sosmed</h3>
                    <p>
                        <a class="text-white" href="">
                            <img src="<?= base_url(); ?>mc_asset_gambar/mimo/img/iconmonstr-facebook-6.svg" alt="">
                            facebook
                        </a>
                    </p>
                    <p>
                        <a class="text-white" href="">
                            <img src="<?= base_url(); ?>mc_asset_gambar/mimo/img/icons8-whatsapp.svg" alt="">
                            whatsapp
                        </a>
                    </p>
                    <p>
                        <a class="text-white" href="">
                            <img src="<?= base_url(); ?>mc_asset_gambar/mimo/img/envelope.svg" alt="">
                            email
                        </a>
                    </p>
                    <input class="mt-1" type="email" name="" id="" placeholder="input your email">
                    <br>
                    <button type="button" class="btn btn-red mt-1">
                        <img src="<?= base_url(); ?>mc_asset_gambar/mimo/img/play-button.svg" alt="">
                        Subscribe
                    </button>
                </div>
            </div>
            <p class="bg-light-blue content mt-2 font-10">
                &copy; copyright by gugus darmayanto || yuk-design.com
            </p>
        </footer>
        <script src="<?= base_url(); ?>mc_asset_gambar/mimo/mimo.js<?= $cacheclear; ?>"></script>
</body>
</html>