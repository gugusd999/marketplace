<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Materialize extends MX_controller
{
  public static function slider($value='')
  {
    $html = '
    <div class="carousel carousel-slider center" data-indicators="true">
      <div class="carousel-fixed-item center">
        <a class="btn waves-effect white grey-text darken-text-2">button</a>
      </div>
      <div class="carousel-item blue white-text" href="#one!">
        <h2>First Panel</h2>
        <p class="white-text">This is your first panel</p>
      </div>
      <div class="carousel-item blue white-text" href="#two!">
        <h2>Second Panel</h2>
        <p class="white-text">This is your second panel</p>
      </div>
      <div class="carousel-item blue white-text" href="#three!">
        <h2>Third Panel</h2>
        <p class="white-text">This is your third panel</p>
      </div>
      <div class="carousel-item blue white-text" href="#four!">
        <h2>Fourth Panel</h2>
        <p class="white-text">This is your fourth panel</p>
      </div>
    </div>
    <script type="text/javascript">
      $(".corousel").corousel();
    </script>
    ';

    return $html;
  }

  public static function galery($value='')
  {
     $html = '
       <div class="container-fluid">
         <div class="row">
         ';
         for ($i=0; $i < 12; $i++) {
           // code...
     $html .= '
           <div class="col s12 m6 l3">
             <a href="#" class="action-card">
              <div class="card">
                 <div class="card-content galery-top">
                   <div class="galery-images" style="--bg-image: url('."'".base_url('gambar/header-image4916.png')."'".'");></div>
                   <div>
                    <h6 style="font-weight: bold;">Rp 40.000,00</h6>
                    <p class="truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                   </div>
                   <div class="favorite-galery">
                    '.self::icon('favorite').'
                   </div>
                 </div>
               </div>
            </a>
          </div>
           ';
         }

     $html .= '
         </div>
       </div>
     ';

     return $html;

  }

  public static function more_galeri($value='')
  {
    return '

    <div class="container">
      <div class="row">
        <div class="col s12 center-align">
          <button type="button" class="btn waves-effect white grey-text darken-text-2"><i class="material-icons left">expand_more</i>Muat Lainnya</button>
        </div>
      </div>
    </div>

    ';
  }

  public static function menu_icon($value='')
  {
    $html = '
    <div class="container-fluid">
  <div class="row">
    <div class="col s6 m4 l3">
      <a href="#">
        <div class="card blue white-text btn waves-effect waves-block ">
          <div class="card-content menu-icon">
            <div>
              <i class="material-icons size-40">add</i>
            </div>
            <div>
              <p style="font-weight: bold;">data1</p>
              <small>data1</small>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col s6 m4 l3">
      <a href="#">
        <div class="card blue white-text btn waves-effect waves-block ">
          <div class="card-content menu-icon">
            <div>
              <i class="material-icons size-40">add</i>
            </div>
            <div>
              <p style="font-weight: bold;">data1</p>
              <small>data1</small>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col s6 m4 l3">
      <a href="#">
        <div class="card blue white-text btn waves-effect waves-block ">
          <div class="card-content menu-icon">
            <div>
              <i class="material-icons size-40">add</i>
            </div>
            <div>
              <p style="font-weight: bold;">data1</p>
              <small>data1</small>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col s6 m4 l3">
      <a href="#">
        <div class="card blue white-text btn waves-effect waves-block ">
          <div class="card-content menu-icon">
            <div>
              <i class="material-icons size-40">add</i>
            </div>
            <div>
              <p style="font-weight: bold;">data1</p>
              <small>data1</small>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
    ';

    return $html;
  }


  public static function icon($value = 'add')
  {
    return '<i class="material-icons">'.$value.'</i>';
  }


}
