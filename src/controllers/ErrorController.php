<?php

class ErrorController
{
    public function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        require_once __DIR__ . '/../views/404.php';
    }
}

?>