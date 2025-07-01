<?php
// $uri = parse_url($_SERVER["REQUEST_URI"])['path'];

// // if ($uri === '/') {
// //     require "controllers/index.php";
// // } else if ($uri === "/about") {
// //     require "controllers/about.php";
// // } else {
// //     http_response_code(404);
// //     echo "404 | Page Not Found";
// // }


// $routes = require base_path('router/routes.php');
// function abort($code = 404, $message = 'page not found')
// {
//     http_response_code($code);
//     require base_path("views/error.php");
//     die();
// }

// function routeToController($uri, $routes)
// {
//     if (array_key_exists($uri, $routes)) {
//         require base_path($routes[$uri]);
//     } else {
//         abort();
//     }
// }

// routeToController($uri, $routes);


class Router {
    protected $routes = [];

    protected function add($uri, $controller, $method) {
        //  $this->routes[] = [
        //     'uri' => $uri,
        //     'controller' => $controller,
        //     'method' => strtoupper($method)
        // ];
        $this->routes[] = compact('uri', 'controller', 'method');
    }

    public function get($uri, $controller) {
        $this->add($uri, $controller, 'GET');
    }
    public function post($uri, $controller) {
        $this->add($uri, $controller, 'POST');
    }
    public function put($uri, $controller) {
        $this->add($uri, $controller, 'PUT');   
    }
    public function patch($uri, $controller) {
        $this->add($uri, $controller, 'PATCH');
    }
    public function delete($uri, $controller) {
        $this->add($uri, $controller, 'DELETE');
    }

    public function route($uri, $method) {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return $route['controller'];
            }
        }
        $this->abort();
    }

    protected function abort($code = 404, $message = 'page not found') {
        http_response_code($code);
        require base_path("views/error.php");
        die();
    }

}