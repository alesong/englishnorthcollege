<?php

define('DB_NAME', 'u573178431_nc');

// Determinar el host actual
$currentHost = $_SERVER['HTTP_HOST'];

if ($currentHost === 'localhost') {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
} elseif ($currentHost === 'englishnorthcollege.com' || $currentHost === 'https://northcollege.com' || $currentHost === 'https://northcolleg.edu.co') {
    define('DB_HOST', 'localhost'); // Usar localhost para la conexión en producción
    define('DB_USER', 'u573178431_itnc');
    define('DB_PASS', '2=nY@yPh]t');
} else {
    // Configuración por defecto o para otros entornos
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
}

// Opcional: Configuración de PDO


?>