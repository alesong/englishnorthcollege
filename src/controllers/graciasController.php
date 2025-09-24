<?php

class graciasController
{
    public function index()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = htmlspecialchars(trim($_POST['nombre']));
            $email = htmlspecialchars(trim($_POST['email']));
            $telefono = htmlspecialchars(trim($_POST['telefono']));
            $profesion = htmlspecialchars(trim($_POST['profesion']));
            $mensaje = htmlspecialchars(trim($_POST['mensaje']));

            if (!empty($nombre) && !empty($email) && !empty($mensaje) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $to = 'northcollegesantander@gmail.com';
                $subject = 'Mensaje de Contacto desde página North College';
                $headers = 'From: ' . $email . "\r\n" .
                           'Reply-To: ' . $email . "\r\n" .
                           'X-Mailer: PHP/' . phpversion();
                $email_body = "Nombre: $nombre\n" .
                              "Email: $email\n" .
                              "Telefono: $telefono\n" .
                              "Profesion: $profesion\n" .
                              "Mensaje:\n$mensaje";

                if (mail($to, $subject, $email_body, $headers)) {
                    require_once __DIR__ . '/../views/header.php';
                    require_once __DIR__ . '/../views/gracias.php';
                    require_once __DIR__ . '/../views/footer.php';
                } else {
                    require_once __DIR__ . '/../views/header.php';
                    require_once __DIR__ . '/../views/msg_error.php';
                    require_once __DIR__ . '/../views/footer.php';
                }
            } else {
                echo '<p class="error-message">Por favor, completa todos los campos correctamente.</p>';
            }
        }else{
            echo '<p class="error-message">Como llegaste aquí?.</p>
            <p></Serás redirigido a la página de inicio en unos segundos.</p>';
            header("refresh:5;url=/");
        }
        
    }
}

?>