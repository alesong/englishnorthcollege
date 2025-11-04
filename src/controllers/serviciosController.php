<?php

class serviciosController
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
        
        $email = $_SESSION['user'];
        
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
        //Verificar si el el suario ha sido aprobado por el comercial para entrevista.
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row && $row['aprobado'] == 1){
            //llenar el formulario de contrato
            $sql = "SELECT * FROM datos_usuarios WHERE id_usuario = (SELECT id FROM usuarios WHERE email = :email)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $_SESSION['user']);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $id_usuario = $row['id_usuario'];
            $row['email'] = $_SESSION['user'];
            require_once __DIR__ . '/../views/header.php'; 
            require_once __DIR__ . '/../views/servicios.php';
            require_once __DIR__ . '/../views/footer.php';
        }else{
            require_once __DIR__ . '/../views/header.php'; 
            require_once __DIR__ . '/../views/preaprovacion.php';
            require_once __DIR__ . '/../views/footer.php';
        }
    }
}

?>