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
    return __DIR__ . '/../' . $path;
}