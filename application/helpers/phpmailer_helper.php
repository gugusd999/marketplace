<?php

function load_mailer(){
    require_once 'vendor/php_mailer.php';
}


function load_excel(){
    require_once 'vendor/php_excel.php';
}


function pdf(){
    require_once 'vendor/mpdf.php';
}

function encrypt($message)
{
    require_once 'vendor/crypto.php';
    return Crypto::encrypt($message, 'halohalobandung');
}

function decrypt($ciphertext)
{
    require_once 'vendor/crypto.php';
    return Crypto::decrypt($ciphertext, 'halohalobandung');
}

