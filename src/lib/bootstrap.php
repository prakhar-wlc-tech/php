<?php

use lib\Database; 

require base_path('utility/Container.php');
require base_path('lib/Database.php');
require base_path('utility/App.php');

$container = new Container();

$container->bind('lib\Database', function(){
    $config = require base_path('config/config.php');
    return new Database($config["database"]);
});

// $db = $container->resolve('lib\Database');
// dd($db);

// Example of resolving a non-existent binding to demonstrate error handling
// $db = $container->resolve('lib\Databasesdflkjasdlfkj');

App::setContainer($container);

// $db = App::getContainer()->resolve('lib\Database');

// both of these are same
// $db = App::resolve('lib\Database');
$db = App::resolve(Database::class);
// dd($db);