<?php

class Login_cek extends Mx_controller{
    public function __construct()
	{

    $protocol = '';

    if (isset($_SERVER['HTTPS']) &&
        ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
        $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
      $protocol = 'https://';
    }
    else {
      $protocol = 'http://';
    }


    $baseurl = base_url();
    $servername = $_SERVER['HTTP_HOST'];
    $get_link = $protocol.$servername.$_SERVER["REQUEST_URI"];
    $cekPengecualian = str_replace($baseurl, "/", $get_link);
    if($cekPengecualian != "/"){
  		if(generate_session("datalogin") == ""){

        $get_link = $_SERVER["REQUEST_URI"];
        $make_array_link = explode("/", $get_link);
        $key = array_search("login", $make_array_link);

        if ($key != false) {
            // no action
        }else{
          $dataPengecualian = [
            "/market",
          ];
          $baseurl = base_url();
          $servername = $_SERVER["HTTP_HOST"];
          $get_link = $protocol.$servername.$_SERVER["REQUEST_URI"];
          $cekPengecualian = str_replace($baseurl, "/", $get_link);

          $get_isi_array = false;

          foreach ($dataPengecualian as $key => $value) {
            if(preg_match("/".str_replace("/", "-", $value)."/i",str_replace("/", "-", $cekPengecualian))) {
              $get_isi_array = true;
            }
          }

          if ($get_isi_array === false) {
            redirect('login');
          }
        }
  		}
    }
	}
}
