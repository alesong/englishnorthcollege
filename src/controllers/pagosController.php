<?php

class pagosController
{
    public function index()
    {
        // Aquí puedes cargar una vista o mostrar contenido directamente
        require_once __DIR__ . '/../views/header.php';
        require_once __DIR__ . '/../views/pagos.php';
        require_once __DIR__ . '/../views/footer.php';
        
    }

    public function pagos()
    {
        header('Content-Type: application/json');
        //conectar con la base de datos
        require_once __DIR__ . '/../models/Database.php'; // Incluir la nueva clase Database
        try {
            $pdo = Database::connect(); // Usar la nueva clase para conectar
        } catch (PDOException $e) {
            
            echo json_encode(
                [
                    'success' => false,
                    'message' => 'Error de conexión a la base de datos: ' . $e->getMessage()
                ]
            );
            exit();
        }

        //obtener los datos de la base de datos
        
        $cedula = $_POST['cedula'];
        $sql = "SELECT * FROM datos_usuarios WHERE numero_documento = :cedula";
        /*
        echo json_encode(
            [
                'success' => true,
                'message' => 'Cédula recibida: ' . $sql
            ]
        );
        exit();
        */
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cedula', $cedula);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$row){
            echo json_encode(
                [
                    'success' => false,
                    'message' => 'Documento no encontrado, por favor verifique que el documento # '.$cedula.' sea correcto.'
                ]
            );
            exit();
        }

        $id_usuario = $row['id_usuario'];
        $sql = "SELECT * FROM pagos WHERE id_usuario = :id_usuario";
        //obtener todos los resultados de la consulta
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        

        if($row){
            //mostrar los resultados en la vista
            echo json_encode(
                [
                'success' => true,
                'message' => 'Datos obtenidos',
                'hoy' => date('Y-m-d'),
                'hoy_menos_15' => date('Y-m-d', strtotime('-15 days')),
                'hoy_mas_15' => date('Y-m-d', strtotime('+15 days')),
                'data' => $row
            ]
            );
            

            
        }else{
            echo json_encode(
                [
                    'success' => false,
                    'message' => 'Información no encontrada para el documento '.$cedula.'. Puede deberse a que el usuario <strong>no tiene un contrato firmado</strong>, por favor contacte con la persona encargada de la gestión de contratos.'
                ]
            );
        }
        
        exit();
    }   
}

?>