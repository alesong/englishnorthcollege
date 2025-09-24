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
        .container-msg {
            max-width: 600px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        h1 {
            font-size: 40px;
            margin-bottom: 10px;
            color: #10491aff;
        }
        p {
            font-size: 20px;
            margin-bottom: 30px;
        }
        
        
        
    </style>
    <div class="container-msg">
        <h1>Menaje Enviado</h1>
        <p>El mensaje ha sido enviado con éxito.</p>
        <a class="btn btn-primary" href="/">Volver a la página de inicio</a>
    </div>
<?php require_once __DIR__ . '/footer.php'; ?>