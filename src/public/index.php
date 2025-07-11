<?php

session_start(); // Start the session to use session variables if not then we won't be able to use session variables

const BASE_PATH = "/var/www/private/";

require_once BASE_PATH . "utility/utility.php";
require_once base_path('utility/ValidationException.php');
require_once base_path('utility/Session.php');
use Utility\Session;
use Utility\ValidationException;
Session::unflash();

// require_once base_path("router/router.php");
// connection to database (Data Source Name)
// $dsn = 'mysql:host=db;dbname=learnphp;port=3306;charset=utf8mb4';
// $username = 'testuser';
// $password = 'testpass';

//PDO (PHP Data Objects) class : built-in database access abstraction layer that provides a consistent, secure, and object-oriented way to interact with different relational database 
// $db = new PDO($dsn, $username, $password);

// $statement = $db->prepare('select * from users;');
// $statement->execute();

// will give indexed as well as assosciative array
// $users = $statement->fetchAll();
//$users = $statement->fetchAll(PDO::FETCH_ASSOC);

// use lib\Database; // similar to folder structure. example : music folder => rock, pop, etc. now where we have to use Database class, we can use it like this: use lib\Database;
// require base_path("lib/Database.php");

// $config = require base_path("config/config.php");

// $db = new Database($config['database']);

// $id = $_GET['id'];

// $query = "select * from users where id = {$id}"; // prone to sql injection
// $query = 'select * from users where id = ?'; // one way to query db
// $query = 'select * from users where id = :id'; // another way

// $users = $db->query($query)->fetch();
// $users = $db->query($query, [$id])->fetch(); //  one way 
// $users = $db->query($query, ['id'=>$id])->fetch(); //second way

// dd($users);

require base_path('utility/Response.php');

// dd(Response::NOT_FOUND);

require base_path('utility/validator.php');
// dd(Validator::email("user@gmail.com"));

require base_path("lib/bootstrap.php");
require base_path('router/Router.php');
$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

$router = new Router();

$routes = require base_path('router/routes.php');

// Handle HTTP method override (e.g., POST _method => DELETE)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_method'])) {
    $_SERVER['REQUEST_METHOD'] = strtoupper($_POST['_method']);
}

$method = $_SERVER['REQUEST_METHOD'];

try{
    require base_path(
        $router->route($uri, $method)
    );
}catch (ValidationException $e){
    Session::flash('errors', $e->errors);
    Session::flash('old', $e->old);
    redirect($router->previousUrl());
}


//deleting flash session
// unset($_SESSION['_flash']);
// Session::unflash();
