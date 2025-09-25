<?php

class verificarController
{
    public function index()
    {
        // Lógica para mostrar el formulario de login
        require_once __DIR__ . '/../views/registro.php';
    }


    public function verificar()
    {
        
        // Lógica para procesar el formulario de registro
        $email = $_POST['email'];
        $codigo = $_POST['codigo'];

        if($codigo == ''){
            header('Content-Type: application/json');
            echo json_encode(
                [
                    'success' => false,
                    'message' => 'El correo campo no puede estar vacío'
                ]
            );
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

            //Verificar si el correo electrónico ya existe
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row && $row['codigo'] != $codigo){
                header('Content-Type: application/json');
                echo json_encode(
                    [
                        'success' => false,
                        'message' => 'El código de verificación no coincide <br>
                            
                        '
                    ]
                );
                exit();
            }else{
                
                $sql = "UPDATE usuarios SET verificado = TRUE WHERE email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':email', $email);
                $stmt->execute();

                header('Content-Type: application/json');
                echo json_encode(
                    [
                        'success' => true,
                        'message' => '<h2>Verificación Exitosa</h2>
                        
                        '
                    ]
                );
                exit();
            }
        
    }
}

?>