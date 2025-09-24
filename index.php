<?php

require_once __DIR__ . '/config/db_config.php';
require_once __DIR__ . '/src/Router.php';
require_once __DIR__ . '/config/routes.php';


define('BASE_URL', '/englishnorthcollege/');

$basePath = BASE_URL;
$requestUri = str_replace($basePath, '', $_SERVER['REQUEST_URI']);
$requestUri = trim($requestUri, '/');
$requestMethod = $_SERVER['REQUEST_METHOD'];

$router = new Router();
loadRoutes($router); // Cargar las rutas definidas en config/routes.php

$router->dispatch($requestUri, $requestMethod);

?>