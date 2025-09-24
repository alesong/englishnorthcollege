<style>
    html, body, .sectionhomepage {
        height: 100%;
        width: 100%;
        margin: 0;
        overflow: hidden; /* Evita el scroll de la página principal */
    }
</style>
<?php include __DIR__ . '/header.php'; ?>

<section class="sectionhomepage">
    <?php include __DIR__ . '/navbar.php'; ?>

<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2 id="formTitle">Crear Cuenta</h2>
                </div>
                <div class="card-body">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Formulario de Inicio de Sesión -->
                    <form id="registroForm" action="<?php echo BASE_URL; ?>registro" method="POST">
                        <div class="mb-3">
                            <div class="mb-3">
                            <label for="basic-url" class="form-label">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">@</span>
                                <input type="email" plasceholder="Username" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
                                
                            </div>
                            <div class="form-text" id="basic-addon4">No compartimos tu correo con nadie.</div>
                        </div>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text" id="password-first" name="password"><i class="bi bi-key"></i></span>
                                <input type="password" class="form-control" id="loginPassword" name="password" >
                                
                            </div>
                            <label for="loginPassword" class="form-label">Confirmar Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text" id="password-second"><i class="bi bi-key"></i></span>
                                <input type="password" class="form-control" id="loginPassword" name="password" >
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-btn btn-lila f20">Registrarse</button>
                            <a href="login" type="button" class="btn-purple mt-2 center" id="showRegisterForm">Ya tengo una cuenta</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</section>

<?php include __DIR__ . '/footer.php'; ?>
<script src="src/js/registro.js"></script>