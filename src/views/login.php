<style>
    html, body, .sectionhomepage {
        height: 100%;
        width: 100%;
        margin: 0;
        overflow: hidden; /* Evita el scroll de la página principal */
    }
    /*
    .card-header{
        background-image: url('img/BACKGROUND_VERDE_2.png');
    }
    */
</style>
<?php include __DIR__ . '/header.php'; ?>

<section class="sectionhomepage">
    <?php include __DIR__ . '/navbar.php'; ?>

<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2 id="formTitle">Iniciar Sesión</h2>
                </div>
                <div class="card-body">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Formulario de Inicio de Sesión -->
                    <form id="loginForm" action="login" method="POST">
                        <div class="mb-3">
                            <div class="mb-3">
                            <label for="basic-url" class="form-label">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">@</span>
                                <input value="aleson@gmail.com" type="email" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" name="email" required>
                            </div>
                            
                        </div>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3"><i class="bi bi-key"></i></span>
                                <input value="111" type="password" class="form-control" id="loginPassword" name="password" required>
                            </div>
                            
                            
                        </div>
                        <div class="d-grid gap-2">
                            <button id="btn-login" type="submit" class="btn btn-primary">Ingresar</button>
                            <div id="alert-error-login" class="alert oculto"></div>
                            <a href="registro" type="button" class="btn-purple mt-2 center" id="showRegisterForm">No tengo una cuenta</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</section>

<?php include __DIR__ . '/footer.php'; ?>
<script src="<?php echo BASE_URL; ?>src/js/login.js"></script>