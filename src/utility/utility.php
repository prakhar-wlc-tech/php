<?php

use Utility\Session;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}
;

function base_path($path = '')
{
    return BASE_PATH . ltrim($path, '/');
}


function redirect($path){
    header("Location: $path");
    exit();
}

function getOld($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}