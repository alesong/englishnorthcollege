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
                        'message' => 'Usuario o contraseña incorrectos'
                    ]
                );
                exit();
            }

            if ($row['verificado'] == 0) {
                header('Content-Type: application/json');
                echo json_encode(
                    [
                        'success' => false,
                        'message' => 'El usuario no ha sido verificado'
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
                    'message' => 'Sesión iniciada exitosamente'
                ]
            );
            exit();
        }
    }
}

?>