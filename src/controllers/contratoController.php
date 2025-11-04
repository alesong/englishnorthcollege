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
            
            $email = $_SESSION['user'];
            //Verificar si el el suario ha sido aprobado por el comercial para entrevista.
            $sql = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            

            if($row && $row['aprobado'] == 1){
                //llenar el formulario de contrato
                if($row['estado_user'] == 'firmado'){
                    $sql = "SELECT * FROM datos_usuarios inner join datos_contrato ON datos_usuarios.id_usuario = datos_contrato.id_usuario where datos_usuarios.id_usuario = (SELECT id FROM usuarios WHERE email = :email)";
                }else{
                    $sql = "SELECT * FROM datos_usuarios WHERE id_usuario = (SELECT id FROM usuarios WHERE email = :email)";
                }

                //
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':email', $_SESSION['user']);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $id_usuario = $row['id_usuario'];
                $row['email'] = $_SESSION['user'];

                require_once __DIR__ . '/obtenerEstado.php'; // Incluir la nueva clase obtenerEstado
                $obtenerEstado = new obtenerEstado();
                $estado_usuario_data = $obtenerEstado->obtenerEstado($_SESSION['user']);
                $estado = $estado_usuario_data['estado_user'] ?? 'Desconocido';
                //echo $estado; // Comentado para evitar salida inesperada

                if($estado == 'matriculado'){
                    $vista = 'pagos.php';
                }else{
                    $vista = 'contrato.php';
                }

                //redireccionar a la vista de contrato
                require_once __DIR__ . '/../views/header.php'; 
                require_once __DIR__ . '/../views/'.$vista;
                require_once __DIR__ . '/../views/footer.php';
            }else{
                require_once __DIR__ . '/../views/header.php'; 
                require_once __DIR__ . '/../views/preaprovacion.php';
                require_once __DIR__ . '/../views/footer.php';
            }
            
            $user = '';
            if (isset($_SESSION['user'])) {
                $user = $_SESSION['user'];
                //echo 'Sesión iniciada '.$user;
            } else {
                echo 'No hay sesión iniciada';
                header('Location: login');
                exit();
            }
            
            
        //---   
    }


    public function contrato()
    {
        header('Content-Type: application/json'); 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recibir los datos del formulario

            if (isset($_POST['firma'])) {
                $checkTrimodular = isset($_POST['checkTrimodular']) ? (int) filter_var($_POST['checkTrimodular'], FILTER_VALIDATE_BOOLEAN) : 0;
                $checkBimodular = isset($_POST['checkBimodular']) ? (int) filter_var($_POST['checkBimodular'], FILTER_VALIDATE_BOOLEAN) : 0;
                $checkUnimodular = isset($_POST['checkUnimodular']) ? (int) filter_var($_POST['checkUnimodular'], FILTER_VALIDATE_BOOLEAN) : 0;
                $input_valor_programa = $_POST['input_valor_programa'];
                $input_valor_cuota_inicial = $_POST['input_valor_cuota_inicial'];
                $input_valor_cuotas_mensuales = $_POST['input_valor_cuotas_mensuales'];
                $input_numero_cuotas = $_POST['input_numero_cuotas'];
                $checkOfertaEmpresa = isset($_POST['checkOfertaEmpresa']) ? (int) filter_var($_POST['checkOfertaEmpresa'], FILTER_VALIDATE_BOOLEAN) : 0;
                $checkPrivacidad = isset($_POST['checkPrivacidad']) ? (int) filter_var($_POST['checkPrivacidad'], FILTER_VALIDATE_BOOLEAN) : 0;
                $firma = $_POST['firma'] ?? '';

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

                //Crear la tabla datos_contrato si no existe
                $sql = "CREATE TABLE IF NOT EXISTS datos_contrato (
                    id_contrato INT(11) NOT NULL AUTO_INCREMENT,
                    id_usuario INT(11) NOT NULL,
                    firma LONGTEXT NOT NULL,
                    checkTrimodular TINYINT(1) NOT NULL,
                    checkBimodular TINYINT(1) NOT NULL,
                    checkUnimodular TINYINT(1) NOT NULL,
                    input_valor_programa VARCHAR(255) NOT NULL,
                    input_valor_cuota_inicial VARCHAR(255) NOT NULL,
                    input_valor_cuotas_mensuales VARCHAR(255) NOT NULL,
                    input_numero_cuotas VARCHAR(255) NOT NULL,
                    checkOfertaEmpresa TINYINT(1) NOT NULL,
                    checkPrivacidad TINYINT(1) NOT NULL,
                    fecha_contrato TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY (id_contrato)
                )";
               
                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                // Obtener el id_usuario desde la tabla usuarios
                $email = $_SESSION['user'];
                $sql = "SELECT * FROM usuarios WHERE email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $id_usuario = $row['id'];

                //verificar que el id_usuario no este en la tabla contrato
                $sql = "SELECT * FROM datos_contrato WHERE id_usuario = :id_usuario";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id_usuario', $id_usuario);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if($row){
                    echo json_encode(
                        [
                            'success' => false,
                            'message' => 'Este usuario ya tiene contrato firmado'
                        ]
                    );
                    exit();
                }
                //----------------------------------------------------------

                $sql = "INSERT INTO datos_contrato (id_usuario, firma, checkTrimodular, checkBimodular, checkUnimodular, input_valor_programa, input_valor_cuota_inicial, input_valor_cuotas_mensuales, input_numero_cuotas, checkOfertaEmpresa, checkPrivacidad) VALUES (:id_usuario, :firma, :checkTrimodular, :checkBimodular, :checkUnimodular, :input_valor_programa, :input_valor_cuota_inicial, :input_valor_cuotas_mensuales, :input_numero_cuotas, :checkOfertaEmpresa, :checkPrivacidad)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id_usuario', $id_usuario);
                $stmt->bindParam(':firma', $firma);
                $stmt->bindParam(':checkTrimodular', $checkTrimodular);
                $stmt->bindParam(':checkBimodular', $checkBimodular);
                $stmt->bindParam(':checkUnimodular', $checkUnimodular);
                $stmt->bindParam(':input_valor_programa', $input_valor_programa);
                $stmt->bindParam(':input_valor_cuota_inicial', $input_valor_cuota_inicial);
                $stmt->bindParam(':input_valor_cuotas_mensuales', $input_valor_cuotas_mensuales);
                $stmt->bindParam(':input_numero_cuotas', $input_numero_cuotas);
                $stmt->bindParam(':checkOfertaEmpresa', $checkOfertaEmpresa);
                $stmt->bindParam(':checkPrivacidad', $checkPrivacidad);
                $stmt->execute();

                $sql = "UPDATE usuarios SET estado_user = 'firmado' WHERE email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':email', $_SESSION['user']);
                $stmt->execute();


                //------------------ingreasar datos para pagos------------------------

                $sql = "CREATE TABLE IF NOT EXISTS pagos (
                id_pago INT(11) NOT NULL AUTO_INCREMENT,
                id_usuario INT(11) NOT NULL,
                valor_cuota FLOAT(10,2) NOT NULL,
                pago_oportuno DATE,
                fecha_pago DATE,
                estado VARCHAR(255) NOT NULL,
                PRIMARY KEY (id_pago)
                )";
                
                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                for($i=0; $i<(int)$input_numero_cuotas; $i++){
                    $valor_cuota = $input_valor_cuotas_mensuales;
                    if($i==0){
                        $valor_cuota = $input_valor_cuota_inicial;
                    }
                    $fecha_pago = null;
                    $pago_oportuno = date('Y-m-d', strtotime("+$i month +1 day"));
                    $estado = 'Pendiente';
                    
                    $sql = "INSERT INTO pagos (id_usuario, valor_cuota, pago_oportuno, fecha_pago, estado) VALUES (:id_usuario, :valor_cuota, :pago_oportuno, :fecha_pago, :estado)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':id_usuario', $id_usuario);
                    $stmt->bindParam(':valor_cuota', $valor_cuota);
                    $stmt->bindParam(':pago_oportuno', $pago_oportuno);
                    $stmt->bindParam(':fecha_pago', $fecha_pago);
                    $stmt->bindParam(':estado', $estado);
                    $stmt->execute();
                }

                echo json_encode(
                    [
                        'success' => true,
                        'message' => 'Firma enviada',
                        'signature_path' => $firma,
                        'data_received' => [
                            'firma' => $firma
                        ]
                    ]
                );
                exit();
            }
            
        }
    }
}

?>