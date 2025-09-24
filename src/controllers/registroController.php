<?php

class registroController
{
    public function index()
    {
        // Lógica para mostrar el formulario de login
        require_once __DIR__ . '/../views/registro.php';
    }

    public function registro()
    {
        
        header('Content-Type: application/json');
            echo json_encode(
                [
                    'success' => true,
                    'message' => 'Registro exitoso'
                ]
            );
    }
}

?>