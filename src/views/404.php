<?php require_once __DIR__ . '/header.php'; ?>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
            background-color: #f8f9fa;
            color: #495057;
        }
        .container {
            max-width: 600px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        h1 {
            font-size: 80px;
            margin-bottom: 10px;
            color: #dc3545;
        }
        p {
            font-size: 20px;
            margin-bottom: 30px;
        }
        a {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
    <div class="container">
        <h1>404</h1>
        <p>¡Ups! La página que buscas no se pudo encontrar.</p>
        <a href="<?php echo BASE_URL; ?>public/">Volver a la página de inicio</a>
    </div>
<?php require_once __DIR__ . '/footer.php'; ?>