<?php

class LoginController
{
    public function index()
    {
        // Lógica para mostrar el formulario de login
        require_once __DIR__ . '/../views/login.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: login');
    }

    public function recuperacion($email = null)
    {
        // Lógica para mostrar el formulario de recuperación
        require_once __DIR__ . '/../views/recuperacion.php';
    }

    public function recuperacionPost()
    {
        // Lógica para procesar el formulario de recuperación de contraseña
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            // Aquí iría la lógica para enviar el correo de recuperación
            // Por ahora, solo redirigimos o mostramos un mensaje
            echo "Se ha solicitado la recuperación de contraseña para: " . htmlspecialchars($email);
            // Puedes redirigir a una página de confirmación o mostrar un mensaje en la misma página
        } else {
            // Si se accede por GET sin email, mostrar el formulario vacío
            require_once __DIR__ . '/../views/recuperacion.php';
        }
    }

    public function login()
    {
        // Lógica para procesar el inicio de sesión
        // Aquí iría la validación de credenciales y la lógica de sesión

        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            
            //conectar con la base de datos
            require_once __DIR__ . '/../models/Database.php'; // Incluir la nueva clase Database
            try {
                $pdo = Database::connect(); // Usar la nueva clase para conectar
            } catch (PDOException $e) {
                header('Content-Type: application/json');
                echo json_encode(
                    [
                        'success' => false,
                        'message' => 'Error de conexión a la base de datos: ' . $e->getMessage()
                    ]
                );
                exit();
            }

            
            
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // No es necesario asignar a $contrasenia2 si se va a usar directamente $row['contrasenia']
            // $contrasenia2 = $row['contrasenia'];


            if (!$row) {
                header('Content-Type: application/json');
                echo json_encode(
                    [
                        'success' => false,
                        'message' => 'Usuario o contraseña incorrectos'
                    ]
                );
                exit();
            }

            if ($row['contrasenia'] !== $password) {
                header('Content-Type: application/json');
                echo json_encode(
                    [
                        'success' => false,
                        'message' => 'Usuario o contraseña incorrectos, por favor vuelva a intentarlo. <a href="login/recuperacion/'.$email.'">Olvidé mi contraseña</a>'
                    ]
                );
                exit();
            }

            if ($row['verificado'] == 0) {
                header('Content-Type: application/json');
                echo json_encode(
                    [
                        'success' => false,
                        'message' => 'El usuario no ha sido dado de alta, por favor revise su correo electrónico para obtener el código de verificación. <a href="registro">Registrarse</a>'
                    ]
                );
                exit();
            }

            // Si todo es correcto, iniciar sesión
            $user = $row['email'];
            // session_start(); // La sesión ya se inicia en index.php
            $_SESSION['user'] = $user;
            header('Content-Type: application/json');
            echo json_encode(
                [
                    'success' => true,
                    'locationRemoto' => 'https://englishnorthcollege.com/preinscripcion',
                    'location' => 'preinscripcion',
                    'message' => 'Sesión iniciada exitosamente'
                ]
            );
            exit();
        }
    }
}

?>