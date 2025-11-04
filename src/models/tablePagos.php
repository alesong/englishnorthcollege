
<?php

class tablePagos
{

    public function insertarDatosPagos($id_usuario, $valor_cuota, $pago_oportuno, $fecha_pago, $estado)
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
        require_once __DIR__ . '/Database.php'; // Incluir la nueva clase Database
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

        $sql = "CREATE TABLE IF NOT EXISTS pagos (
            id_tabla INT(11) NOT NULL,
            id_pago INT(11) NOT NULL AUTO_INCREMENT,
            id_usuario INT(11) NOT NULL,
            valor_cuota FLOAT(10,2) NOT NULL,
            pago_oportuno TIMESTAMP,
            fecha_pago TIMESTAMP,
            estado VARCHAR(255) NOT NULL,
            PRIMARY KEY (id_pago)
        )";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $sql = "INSERT INTO pagos (id_usuario, valor_cuota, pago_oportuno, fecha_pago, estado) VALUES (:id_usuario, :valor_cuota, :pago_oportuno, :fecha_pago, :estado)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':valor_cuota', $valor_cuota);
        $stmt->bindParam(':pago_oportuno', $pago_oportuno);
        $stmt->bindParam(':fecha_pago', $fecha_pago);
        $stmt->bindParam(':estado', $estado);
        $stmt->execute();
    }
}

?>