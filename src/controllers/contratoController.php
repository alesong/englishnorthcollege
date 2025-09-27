<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class contratoController
{
    public function index()
    {
        $user = '';
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            //echo 'Sesión iniciada '.$user;
        } else {
            echo 'No hay sesión iniciada';
            header('Location: login');
            exit();
        }
        // Lógica para mostrar el formulario de login
        // Incluir la nueva clase Database
        require_once __DIR__ . '/../views/header.php'; 
        require_once __DIR__ . '/../views/contrato.php';
        require_once __DIR__ . '/../views/footer.php';
    }


    public function contrato()
    {
        header('Content-Type: application/json');
            echo json_encode(
                [
                    'success' => true,
                    'message' => 'Respuesta exitosa'
                ]
            );
    }
}

?>