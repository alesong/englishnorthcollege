<?php

define('DB_NAME', 'u573178431_nc');

// Determinar el host actual
$currentHost = $_SERVER['HTTP_HOST'];

if ($currentHost === 'localhost') {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
} elseif ($currentHost === 'northcollege.com' || $currentHost === 'northcolleg.edu.co') {
    define('DB_HOST', $currentHost); // Usar el host actual para la conexión
    define('DB_USER', 'u573178431_itnc');
    define('DB_PASS', '2=nY@yPh]t');
} else {
    // Configuración por defecto o para otros entornos
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
}

// Opcional: Configuración de PDO
// funcion para conectar con la base de datos
    function connect_db() {
        try {
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Conexión exitosa a la base de datos.";
        } catch (PDOException $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }
        return $pdo;
    }

    //$db = connect_db();


?>