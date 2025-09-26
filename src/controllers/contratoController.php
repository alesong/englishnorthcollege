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
            echo 'Sesión iniciada '.$user;
        } else {
            echo 'No hay sesión iniciada';
            //header('Location: /login');
            exit();
        }
        // Lógica para mostrar el formulario de login
        require_once __DIR__ . '/../views/contrato.php';
    }


    public function contrato()
    {
    
    }
}

?>