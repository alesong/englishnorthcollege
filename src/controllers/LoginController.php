<?php

class LoginController
{
    public function index()
    {
        // Lógica para mostrar el formulario de login
        require_once __DIR__ . '/../views/login.php';
    }

    public function login()
    {
        // Lógica para procesar el inicio de sesión
        // Aquí iría la validación de credenciales y la lógica de sesión
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Ejemplo de validación (reemplazar con lógica real de base de datos)
            if ($email === 'test@example.com' && $password === 'password') {
                // Inicio de sesión exitoso
                // Redirigir a una página de éxito o al dashboard
                header('Location: /englishnorthcollege/'); // Redirigir a la página principal
                exit();
            } else {
                // Credenciales inválidas
                $error = "Credenciales inválidas. Inténtalo de nuevo.";
                require_once __DIR__ . '/../views/login.php'; // Volver a mostrar el formulario con error
            }
        }
    }
}

?>