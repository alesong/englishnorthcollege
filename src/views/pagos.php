<style>
    html, body, .sectionhomepage {
        height: 100%;
        width: 100%;
        margin: 0;
        overflow: hidden; /* Evita el scroll de la página principal */
    }
    a{
        text-decoration: none;
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
                    <h2 id="formTitle">Consultar estado de cuenta</h2>
                </div>
                <div class="card-body">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Formulario de Inicio de Sesión -->
                    <form id="pagosForm" action="pagos" method="POST">
                        <div class="mb-3">
                            <div class="mb-3">
                            <label for="basic-url" class="form-label">Número de Documento de Identidad</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3"><i class="bi bi-person-vcard"></i></span>
                                <input value="" type="text" class="form-control" id="cedula" aria-describedby="basic-addon3 basic-addon4" name="cedula" required>
                            </div>
                            
                        </div>
                        </div>
                            <button id="btn-consultar-pagos" type="submit" class="p10 btn-primary">Consultar</button>
                            <div id="alert-error-login" class="alert oculto mt20"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5 oculto" id="resultado-pagos">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="b1 bc-ddd radius6 bg-white p20">
                        <h2 class="c-333">Estado de cuenta</h2>
                        <h1 class="black fw700" id="nombre-usuario">Fulano</h1>
                </div>
            </div>
            <div class="col-md-12 mt5">
                <div class="b1 bc-ddd radius6 bg-white p20">
                    <!-- Aquí se mostrarán los resultados de la consulta de pagos -->
                     <table class="table table-hover radius6">
                        <thead>
                            <tr>
                                <th scope="col">Consepto</th>
                                <th scope="col">Fecha de Pago</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-pagos">
                            <tr>
                                <td>Mensaulidad Octubre 2025</td>
                                <td>2023-01-01</td>
                                <td>$100.00</td>
                                <td>Pendiente</td>
                                <td>
                                    <button type="button" class="btn btn-primary b0">Pagar</button>
                                </td>
                            </tr>
                        </tbody>
                     </table>
                </div>
            </div>
        </div>
    </div>
</main>
</section>

<?php include __DIR__ . '/footer.php'; ?>
<script src="<?php echo BASE_URL; ?>src/js/pagos.js"></script>