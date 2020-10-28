<nav>
  <div class="nav-wrapper blue darken-3">
    <span class="brand-logo" style="margin: 0 10px;"><?= $title_app; ?></span>
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
      <li><a href="<?= site_url(''); ?>">Home</a></li>
      <li><a href="<?= site_url('market'); ?>">Market</a></li>
    </ul>
  </div>
</nav>
<ul class="sidenav" id="mobile-demo">
  <li><a href="<?= site_url(''); ?>">Home</a></li>
</ul>
