<?php

class serviciosController
{
    public function index()
    {
        // Aquí puedes cargar una vista o mostrar contenido directamente
        require_once __DIR__ . '/../views/header.php';
        require_once __DIR__ . '/../views/servicios.php';
        require_once __DIR__ . '/../views/footer.php';
        
    }
}

?>