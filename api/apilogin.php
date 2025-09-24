<?php
header('Content-Type: application/json');
$response = array(
    'status' => 'success',
    'message' => 'Datos recibidos correctamente desde apilogin.php',
    'data' => $_POST
);
echo json_encode($response);
?>