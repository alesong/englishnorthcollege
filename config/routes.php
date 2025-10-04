<?php

// Cargar controladores
require_once __DIR__ . '/../src/controllers/HomeController.php';
require_once __DIR__ . '/../src/controllers/graciasController.php';
require_once __DIR__ . '/../src/controllers/matriculateController.php';
require_once __DIR__ . '/../src/controllers/pagosController.php';
require_once __DIR__ . '/../src/controllers/serviciosController.php';
require_once __DIR__ . '/../src/controllers/LoginController.php';
require_once __DIR__ . '/../src/controllers/registroController.php';
require_once __DIR__ . '/../src/controllers/verificarController.php';
require_once __DIR__ . '/../src/controllers/contratoController.php';
require_once __DIR__ . '/../src/controllers/preinscripcionController.php';

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

    // Ruta para mostrar el formulario de recuperación de contraseña (sin email en la URL)
    $router->addRoute('GET', '/login/recuperacion', function() {
        $controller = new LoginController();
        $controller->recuperacion();
    });

    // ruta login con una variable en la url para recuperar la contraseña
    $router->addRoute('GET', '/login/recuperacion/{email}', function($email) {
        $controller = new LoginController();
        $controller->recuperacion($email);
    });

    $router->addRoute('POST', '/login/recuperacion', function() {
        $controller = new LoginController();
        $controller->recuperacionPost(); // Nuevo método para manejar el POST
    });
    
    $router->addRoute('POST', '/login', function() {
        $controller = new LoginController();
        $controller->login();
    });

    $router->addRoute('GET', '/logout', function() {
        $controller = new LoginController();
        $controller->logout();
    });

    $router->addRoute('GET', '/registro', function() {
        $controller = new registroController();
        $controller->index();
    });

    $router->addRoute('POST', '/registro', function() {
        $controller = new registroController();
        $controller->registro();
    });

    $router->addRoute('GET', '/verificar', function() {
        $controller = new verificarController();
        $controller->index();
    });

    $router->addRoute('POST', '/verificar', function() {
        $controller = new verificarController();
        $controller->verificar();
    });

    $router->addRoute('GET', '/preinscripcion', function() {
        $controller = new preinscripcionController();
        $controller->index();
    });

    $router->addRoute('POST', '/preinscripcion', function() {
        $controller = new preinscripcionController();
        $controller->preinscripcion();
    });

    $router->addRoute('GET', '/contrato', function() {
        $controller = new contratoController();
        $controller->index();
    });

    $router->addRoute('POST', '/contrato', function() {
        $controller = new contratoController();
        $controller->contrato();
    });
}

?>