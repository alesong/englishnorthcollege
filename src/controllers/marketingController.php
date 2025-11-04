<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class marketingController
{
    public function index()
    {
        $email = '';
        if (isset($_SESSION['user'])) {
            $email = $_SESSION['user'];
            //echo 'Sesión iniciada '.$user;
        } else {
            echo 'No hay sesión iniciada';
            header('Location: login');
            exit();
        }
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
            $rol = $row['rol'];

            if($rol == 'marketing'){
                //llenar el formulario de contrato
                $id = $_POST['id'] ?? '';
                $sql = "SELECT * FROM datos_usuarios WHERE id_usuario = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $id_usuario = $id;
                //redireccionar a la vista de marketing
                require_once __DIR__ . '/../views/header.php'; 
                require_once __DIR__ . '/../views/marketing.php';
                require_once __DIR__ . '/../views/footer.php';
            }else{
                require_once __DIR__ . '/../views/header.php'; 
                require_once __DIR__ . '/../views/login.php';
                require_once __DIR__ . '/../views/footer.php';
            }
    }

    public function getContrato(){
        $id = $_POST['id'];
        

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
            
            
            //Verificar si el el suario ha sido aprobado por el comercial para entrevista.
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            

            if($row && $row['aprobado'] == 1){
                //llenar el formulario de contrato
                if($row['estado_user'] == 'firmado'){
                    $sql = "SELECT * FROM datos_usuarios inner join datos_contrato ON datos_usuarios.id_usuario = datos_contrato.id_usuario where datos_usuarios.id_usuario = :id";
                }else{
                    $sql = "SELECT * FROM datos_usuarios WHERE id_usuario = :id";
                }
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $id_usuario = $row['id_usuario'];

                $sql_email = "SELECT * FROM usuarios WHERE id = :id";
                $stmt_email = $pdo->prepare($sql_email);
                $stmt_email->bindParam(':id', $id_usuario);
                $stmt_email->execute();
                $row_email = $stmt_email->fetch(PDO::FETCH_ASSOC);
                $email = $row_email['email'];
                
                //require_once __DIR__ . '/../views/header.php'; 
                require_once __DIR__ . '/../views/contratoForMarketing.php';
                //require_once __DIR__ . '/../views/footer.php';
            }else{
                require_once __DIR__ . '/../views/header.php'; 
                require_once __DIR__ . '/../views/preaprovacion.php';
                require_once __DIR__ . '/../views/footer.php';
            }

    }
}
?>