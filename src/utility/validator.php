<?php

class Validator
{
    //pure function : independent of internal state,outside world (can be used with static keyword)
    public static function String($value, $min = 1, $max = INF)// function with static keyword can be called without class instances. example ( Validator::String($_POST['body'],1,1000))
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}