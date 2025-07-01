<?php

class App {
    protected static $container;

    public static function setContainer($container){
        static::$container = $container;
    }

    public static function getContainer(){
        if(!static::$container){
            throw new Exception("Container not set");
        }
        return static::$container;
    }
    public static function resolve($key){
        return static::getContainer()->resolve($key);
    }
    public static function bind($key, $fn){
        static::getContainer()->bind($key, $fn);
    }
}