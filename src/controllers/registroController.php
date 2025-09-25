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
        // Lógica para procesar el formulario de registro
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmarPassword = $_POST['confirmarPassword'];

        if($email == ''){
            header('Content-Type: application/json');
            echo json_encode(
                [
                    'success' => false,
                    'message' => 'El correo electrónico no puede estar vacío'
                ]
            );
            exit();
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('Content-Type: application/json');
            echo json_encode(
                [
                    'success' => false,
                    'message' => 'El correo electrónico no es válido'
                ]
            );
            exit();
        }

        if($password != $confirmarPassword or $password == ''){
            header('Content-Type: application/json');
            echo json_encode(
                [
                    'success' => false,
                    'message' => 'Las contraseñas no coinciden'
                ]
            );
            exit();
        }
        
            $codigo = rand(100000, 999999);
            

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

            //verificar si la tabla de usuarios existe, si no la creamos
            $sql = "CREATE TABLE IF NOT EXISTS usuarios (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                codigo INT NOT NULL,
                verificado BOOLEAN DEFAULT FALSE,
                fecha_verificacion DATETIME DEFAULT CURRENT_TIMESTAMP
            )";
            $stmt = $pdo->prepare($sql);
            if(!$stmt->execute()){
                header('Content-Type: application/json');
                echo json_encode(
                    [
                        'success' => false,
                        'message' => 'Error al crear la tabla de usuarios'
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

            if($row && $row['email'] == $email){
                header('Content-Type: application/json');
                echo json_encode(
                    [
                        'success' => false,
                        'message' => 'Ya existe un usuario con ese correo electrónico'
                    ]
                );
                exit();
            }

            //insertar el usuario en la base de datos
            $sql = "INSERT INTO usuarios (email, password, codigo) VALUES (:email, :password, :codigo)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':codigo', $codigo);
            error_log("Antes de ejecutar la inserción en la base de datos.");
            $result = $stmt->execute();
            error_log("Resultado de la inserción en la base de datos: " . ($result ? 'Éxito' : 'Fallo'));

            $email2 = 'northcollegesantander@gmail.com';
            if($result){
                $is_localhost = ($_SERVER['HTTP_HOST'] === 'localhost');

                if (!$is_localhost) {
                    $to = $email;
                    $subject = 'Codigo de verificacion';
                    $headers = 'From: ' . $email2 . "\r\n" .
                               'Reply-To: ' . $email2 . "\r\n" .
                               'X-Mailer: PHP/' . phpversion();
                    $email_body = "Codigo de verificacion: $codigo\n" .
                                   "Este es mensaje automático. Por favor, no responda a este mensaje.\n";

                    $mail_sent = mail($to, $subject, $email_body, $headers);
                    error_log("Intento de envío de correo a $to. Resultado: " . ($mail_sent ? 'Éxito' : 'Fallo') . " (Entorno: " . ($is_localhost ? 'localhost' : 'producción') . ")"); // Log de depuración

                    if ($mail_sent) {
                        header('Content-Type: application/json');
                        echo json_encode(
                            [
                                'success' => true,
                                'message' => '<h2>Registro exitoso</h2> Hemos enviado un <strong>código de verificación.</strong><br> Por favor, revisa tu correo electrónico para completar el proceso de registro.
                               
                                '
                            ]
                        );
                    } else {
                        header('Content-Type: application/json');
                        echo json_encode(
                            [
                                'success' => false,
                                'message' => 'Error al enviar el código de verificación. Por favor, verifica la configuración de correo de tu servidor.'
                            ]
                        );
                    }
                } else {
                    // En entorno localhost, no enviar correo pero devolver éxito
                    error_log("Envío de correo omitido en localhost para $email.");
                    header('Content-Type: application/json');
                    echo json_encode(
                        [
                            'success' => true,
                            'message' => '<h2>Registro exitoso (localhost)</h2> El correo de verificación no se envió en entorno de desarrollo. Código: ' . $codigo . '
                            
                            '
                        ]
                    );
                }
            } else {
                header('Content-Type: application/json');
                echo json_encode(
                    [
                        'success' => false,
                        'message' => 'Error al registrar el usuario en la base de datos. Detalles: ' . implode(" ", $stmt->errorInfo())
                    ]
                );
            }
        
    }
}

?>