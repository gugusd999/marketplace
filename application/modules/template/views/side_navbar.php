<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="index3.html" class="brand-link">
    <img src="<?= base_url() ?>icon/sipintarr.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light"><?= $title_app ?></span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>icon/sipintarr.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= generate_session('datalogin')['username']  ?></a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <?php
          $multi_user_config = generate_session('datalogin')['sebagai'];
        ?>
        <?=
          nav_link([
            'title' => 'Home',
            'icon' => 'fa-home',
            'link' => 'administrator',
            'navigate' => 'administrator'
          ]);
        ?>
        <?=
          nav_link([
            'title' => 'Kota',
            'icon' => 'fa-city',
            'link' => 'kota',
            'navigate' => 'kota'
          ]);
        ?>
        <?=
          nav_link([
            'title' => 'Propinsi',
            'icon' => 'fa-globe',
            'link' => 'propinsi',
            'navigate' => 'propinsi'
          ]);
        ?>
        <?=
          nav_link([
            'title' => 'Brand',
            'icon' => 'fa-copyright',
            'link' => 'brand',
            'navigate' => 'brand'
          ]);
        ?>
        <?=
          nav_link([
            'title' => 'Category',
            'icon' => 'fa-tag',
            'link' => 'category',
            'navigate' => 'category'
          ]);
        ?>
        <?=
          nav_link([
            'title' => 'Supplier',
            'icon' => 'fa-store',
            'link' => 'supplier',
            'navigate' => 'supplier'
          ]);
        ?>
        <?=
          nav_link([
            'title' => 'Product',
            'icon' => 'fa-cubes',
            'link' => 'product',
            'navigate' => 'product'
          ]);
        ?>
        <?=
          nav_link([
            'title' => 'Pembelian',
            'icon' => 'fa-shopping-cart',
            'link' => 'pembelian',
            'navigate' => 'pembelian'
          ]);
        ?>
        <?=
          nav_link([
            'title' => 'Harga Jual',
            'icon' => 'fa-home',
            'link' => 'harga_jual',
            'navigate' => 'harga_jual'
          ]);
        ?>
        <?=
          nav_link([
            'title' => 'Foto',
            'icon' => 'fa-camera',
            'link' => 'foto',
            'navigate' => 'foto'
          ]);
        ?>
        <?=
          nav_link([
            'title' => 'Video',
            'icon' => 'fa-film',
            'link' => 'video',
            'navigate' => 'video'
          ]);
        ?>
        <?=
          nav_link([
            'title' => 'Chat',
            'icon' => 'fa-comment',
            'link' => 'chat',
            'navigate' => 'chat'
          ]);
        ?>
        <?=
          nav_link([
            'title' => 'Customer',
            'icon' => 'fa-users',
            'link' => 'customer',
            'navigate' => 'customer'
          ]);
        ?>
        <?=
          nav_link([
            'title' => 'Order',
            'icon' => 'fa-shopping-bag',
            'link' => 'order',
            'navigate' => 'order'
          ]);
        ?>
        <?=
          nav_link([
            'title' => 'Slider',
            'icon' => 'fa-image',
            'link' => 'slider',
            'navigate' => 'slider'
          ]);
        ?>
      </ul>
    </nav>
  </div>
</aside>
