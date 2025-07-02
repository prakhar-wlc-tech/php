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

require base_path(('utility/middleware/Middleware.php'));
class Router
{
    protected $routes = [];

    protected function add($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => strtoupper($method),
            'middleware' => null
        ];
        // $this->routes[] = compact('uri', 'controller', 'method');
        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET');
    }
    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }
    public function put($uri, $controller)
    {
        return $this->add($uri, $controller, 'PUT');
    }
    public function patch($uri, $controller)
    {
        return $this->add($uri, $controller, 'PATCH');
    }
    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
        // dd($this->routes);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
               Middleware::resolve($route['middleware']);

                return $route['controller'];
            }
        }
        echo "No matching route found for {$uri} with method {$method}";
        $this->abort();
    }

    protected function abort($code = 404, $message = 'page not found')
    {
        http_response_code($code);
        require base_path("views/error.php");
        die();
    }

    public function previousUrl(){
        return $_SERVER['HTTP_REFERER'];
    }

}