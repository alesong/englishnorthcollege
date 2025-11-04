<?php
class aprobarController
{
    public function index()
    {
        echo "Como llegaste aquí?";
    }


    public function aprobar()
    {   
        $id = $_POST['id'];
        $aprobar = $_POST['aprobar'];

        if ($aprobar == 'checked') {
            $sql = "UPDATE usuarios SET aprobado = 1 WHERE id = :id";
        } else {
            $sql = "UPDATE usuarios SET aprobado = 0 WHERE id = :id";
        }

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

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header('Content-Type: application/json');
        echo json_encode(
            [
                'status' => 'success',
                'html' => 'Cambió a: '.$aprobar
            ]
        );
        exit();
    }
}