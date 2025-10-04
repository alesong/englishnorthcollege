<?php

class preinscripcionController
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
        // conectar con la base de datos
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

        $sql = "SELECT * FROM datos_usuarios WHERE id_usuario = (SELECT id FROM usuarios WHERE email = :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $_SESSION['user']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $id_usuario = $row['id_usuario'];

        // Lógica para mostrar el formulario de preinscripción
        require_once __DIR__ . '/../views/header.php';
        require_once __DIR__ . '/../views/preinscripcion.php';
        require_once __DIR__ . '/../views/footer.php';
    }


    public function preinscripcion()
    {

        // conectar con la base de datos
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

            //extraer id de usuario
            $sql = "SELECT id FROM usuarios WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $_SESSION['user']);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $id_usuario = $row['id'];

            $campo = $_POST['campo'] ?? '';
            $dato = $_POST['dato'] ?? '';
    
            $sql = "UPDATE datos_usuarios SET ";
            $sql .= $campo . "='" . $dato . "' WHERE id_usuario = " . $id_usuario;
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
       header('Content-Type: application/json');
       echo json_encode(
            [
                'success' => true,
                'message' => 'Campo '.$campo.' actualizado a: '.$dato
            ]
        );
    }
}

?>