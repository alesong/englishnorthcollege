<?php

// Cargar controladores
require_once __DIR__ . '/../src/controllers/HomeController.php';
require_once __DIR__ . '/../src/controllers/graciasController.php';
require_once __DIR__ . '/../src/controllers/matriculateController.php';
require_once __DIR__ . '/../src/controllers/pagosController.php';
require_once __DIR__ . '/../src/controllers/serviciosController.php';
require_once __DIR__ . '/../src/controllers/LoginController.php';
require_once __DIR__ . '/../src/controllers/registroController.php';

function loadRoutes(Router $router)
{
    // Ruta principal
    $router->addRoute('GET', '/', function() {
        $controller = new HomeController();
        $controller->index();
    });

    $router->addRoute('POST', '/', function() {
        $controller = new HomeController();
        $controller->index();
    });

    // Ejemplo de otra ruta
    $router->addRoute('GET', '/about', function() {
        echo "<h1>Acerca de nosotros</h1><p>Esta es la página de información.</p>";
    });

    // Puedes añadir más rutas aquí
    $router->addRoute('GET', '/gracias', function() {
        $controller = new graciasController();
        $controller->index();
    });

    $router->addRoute('POST', '/gracias', function() {
        $controller = new graciasController();
        $controller->index();
    });

    $router->addRoute('GET', '/matriculate', function() {
        $controller = new matriculateController();
        $controller->index();
    });

    $router->addRoute('GET', '/pagos', function() {
        $controller = new pagosController();
        $controller->index();
    });

    $router->addRoute('GET', '/servicios', function() {
        $controller = new serviciosController();
        $controller->index();
    });

    // Rutas para Login
    $router->addRoute('GET', '/login', function() {
        $controller = new LoginController();
        $controller->index();
    });

    $router->addRoute('POST', '/login', function() {
        $controller = new LoginController();
        $controller->login();
    });

    $router->addRoute('GET', '/registro', function() {
        $controller = new registroController();
        $controller->index();
    });

    $router->addRoute('POST', '/registro', function() {
        $controller = new registroController();
        $controller->registro();
    });
}

?>