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

                
                $sql = "CREATE TABLE IF NOT EXISTS datos_usuarios (
                id INT AUTO_INCREMENT PRIMARY KEY,
                id_usuario INT NOT NULL,
                fecha_contrato DATE NOT NULL,
                nombres VARCHAR(50) NOT NULL,
                apellidos VARCHAR(50) NOT NULL,
                profesion VARCHAR(50) NOT NULL,
                numero_documento VARCHAR(50) NOT NULL,
                estado_civil VARCHAR(50) NOT NULL,
                fecha_nacimiento DATE NOT NULL,
                direccion_domicilio VARCHAR(50) NOT NULL,
                ciudad_domicilio VARCHAR(50) NOT NULL,
                telefono_celular VARCHAR(50) NOT NULL,
                empresa VARCHAR(50) NOT NULL,
                cargo VARCHAR(50) NOT NULL,
                direccion_laboral VARCHAR(50) NOT NULL,
                telefono_laboral VARCHAR(50) NOT NULL,
                antiguedad INT NOT NULL,
                ingreso_mensual INT NOT NULL,
                referencia_familiar VARCHAR(50) NOT NULL,
                parentesco_familiar VARCHAR(50) NOT NULL,
                celular_familiar VARCHAR(50) NOT NULL,
                referencia_personal VARCHAR(50) NOT NULL,
                parentesco_personal VARCHAR(50) NOT NULL,
                celular_personal VARCHAR(50) NOT NULL,
                nombre_usuario_emw_principal VARCHAR(50) NOT NULL,
                identificacion_usuario_emw_principal VARCHAR(50) NOT NULL,
                email_usuario_emw_principal VARCHAR(50) NOT NULL,
                celular_usuario_emw_principal VARCHAR(50) NOT NULL,
                nombre_usuario_emw_beneficiario VARCHAR(50) NOT NULL,
                identificacion_usuario_emw_beneficiario VARCHAR(50) NOT NULL,
                email_usuario_emw_beneficiario VARCHAR(50) NOT NULL,
                celular_usuario_emw_beneficiario VARCHAR(50) NOT NULL,
                nombre_codeudor VARCHAR(50) NOT NULL,
                identificacion_codeudor VARCHAR(50) NOT NULL,
                direccion_codeudor VARCHAR(50) NOT NULL,
                celular_codeudor VARCHAR(50) NOT NULL,
                empresa_codeudor VARCHAR(50) NOT NULL,
                cargo_codeudor VARCHAR(50) NOT NULL
                )";

                $pdo = Database::connect(); // Usar la nueva clase para conectar
                $pdo->exec($sql); // Ejecutar la consulta SQL

                //extraer id de usuario
                $sql = "SELECT id FROM usuarios WHERE email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $id_usuario = $row['id'];

                //insertar datos en la tabla

                $sql = "INSERT INTO datos_usuarios (id_usuario) VALUES ($id_usuario)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();


                $_SESSION['user'] = $email;

                header('Content-Type: application/json');
                echo json_encode(
                    [
                        'success' => true,
                        'location' => 'preinscripcion',
                        'message' => '<h2>Verificación Exitosa</h2>
                        
                        '
                    ]
                );
                exit();
            }
        
    }

}

?>