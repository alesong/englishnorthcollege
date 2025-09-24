<?php

require_once __DIR__ . '/controllers/ErrorController.php';

class Router
{
    private $routes = [];

    public function addRoute($method, $path, $callback)
    {
        $this->routes[] = ['method' => $method, 'path' => $path, 'callback' => $callback];
    }

    public function dispatch($requestUri, $requestMethod)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $this->matchRoute($route['path'], $requestUri)) {
                call_user_func($route['callback']);
                return;
            }
        }

        $errorController = new ErrorController();
        $errorController->notFound();
    }

    private function matchRoute($routePath, $requestUri)
    {
        // Simple matching for now, can be extended for dynamic routes
        return $routePath === '/' . $requestUri;
    }
}

?>