<?php

session_start();


function create_session($name = "", $data_arr)
{
    $_SESSION[$name.'gugusappsipintar'] = $data_arr;
}

function destroy_session($name)
{
    unset($_SESSION[$name.'gugusappsipintar']);
}

function generate_session($name = "")
{

    if(isset($_SESSION[$name.'gugusappsipintar'])){
        return $_SESSION[$name.'gugusappsipintar'];
    }else{
        return "";
    }
}