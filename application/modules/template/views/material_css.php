<link rel="stylesheet" href="<?= base_url(''); ?>mc_asset_halaman/css/login.css?v=<?= date('ymdhis'); ?>">
<link href="<?= base_url(''); ?>mc_asset_halaman/materialize/icon/icon.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?= base_url(''); ?>mc_asset_halaman/materialize/css/materialize.min.css"  media="screen,projection"/>
<style>
  html, div {
    scroll-behavior: smooth;
  }
  .brand-logo{
    text-transform: capitalize;
  }

  .menu-icon div:nth-child(1){
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .size-40{
    font-size: 40px !important;
  }

  .menu-icon{
    display: grid;
    grid-template-columns: 50px calc(100% - 50px);
  }

  .waves-block{
    display: block !important;
    height: auto !important;
    padding: 0 !important;
  }

  .waves-block .card-content{
    padding: 5px !important;
  }

  .waves-block .card-content p,
  .waves-block .card-content small
  {
    display: block;
    text-align: left;
    padding: 0 !important;
    margin: 0 !important;
  }

  .waves-block .card-content small{
    margin-top: -10px !important;
  }

  .galery-images {
    width: 100%;
    height: 250px;
    background-image: var(--bg-image);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: 50% 50%;
  }


.galery-top{
    position: relative;
}

.favorite-galery{
    position: absolute;
    bottom: 50px;
    right: 30px;
}

.favorite-galery > .material-icons{
    font-size: 35px;
}

.action-card{
    color: black;
}

p{
    padding: 3px 0 !important;
    margin: 0 !important;
}
</style>
