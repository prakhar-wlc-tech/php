<?php
$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

// if ($uri === '/') {
//     require "controllers/index.php";
// } else if ($uri === "/about") {
//     require "controllers/about.php";
// } else {
//     http_response_code(404);
//     echo "404 | Page Not Found";
// }

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php'
];
function abort($code = 404, $message = 'page not found')
{
    http_response_code($code);
    require "views/error.php";
    die();
}

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

routeToController($uri, $routes);