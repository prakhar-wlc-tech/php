<?php
// return [
//     '/' => 'controllers/index.php',
//     '/about' => 'controllers/about.php'
// ];

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');

$router->get('/register', 'controllers/register.php')->only('guest');
$router->post('/register', 'controllers/register-store.php');

$router->get('/login', 'controllers/login.php')->only('guest');
$router->post('/login', 'controllers/login-store.php')->only('guest');

$router->delete('/logout', 'controllers/logout.php')->only('auth');