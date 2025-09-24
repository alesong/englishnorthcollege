<?php

class Database {
    private static $pdo;

    public static function connect() {
        if (self::$pdo === null) {
            // Incluir la configuración de la base de datos
            require_once __DIR__ . '/../../config/db_config.php';

            try {
                self::$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw new PDOException("Error de conexión a la base de datos papi: ".$_SERVER['HTTP_HOST']." " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}

?>