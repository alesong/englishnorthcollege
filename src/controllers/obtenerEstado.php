
<?php

class obtenerEstado
{
    public function obtenerEstado($user)
    {
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
        $sql = "SELECT * FROM usuarios WHERE email = :user";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user', $user); // Añadir esta línea para bindear el parámetro
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}

?>