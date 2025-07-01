<?php

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

function logout()
{
    $_SESSION = [];

    session_destroy();

    $params = session_get_cookie_params();
    
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}