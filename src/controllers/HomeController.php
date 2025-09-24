<?php

class HomeController
{
    public function index()
    {
        // Aquí puedes cargar una vista o mostrar contenido directamente
        require_once __DIR__ . '/../views/header.php';
        require_once __DIR__ . '/../views/home.php';
        require_once __DIR__ . '/../views/footer.php';
        
    }
}

?>