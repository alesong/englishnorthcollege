<style>
    .sectionUser {
        background-color: #9c3;
    }
    .sectionFormContrato {
        background-image: url('img/BACKGROUND_BLANCO.png');
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
    .img-logo-form {
        max-width: 100px;
    }
    .tituNorthCollege {
        color: #9c3;
        font-weight: bold;
    }
</style>
<section class="sectionUser">
    <div class="container">
        <div class="row left">
            <div class="col-md-12 right">
            <span class="mr10 white"><?php echo $_SESSION['user'] ?? 'Usuario no registrado'; ?><input id="userName" type="hidden" name="user" value="<?php echo $_SESSION['user'] ?? 'Usuario no registrado'; ?>"></span>
            <a href="logout" id="btn-logout" type="button" class="btn btn-lila f14 mt4 mb4">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <div class="row justify-content-center">
            <section class="sectionFormContrato mt30 mb30 pb30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-2"><img src="img/logoNCtransparent.png" class="img-logo-form img100 mt20" alt="logo"></div>
                                <div class="col-10"><h2 class="mt30 f2rem fw500 center">Bienvenido a <span class="tituNorthCollege">North College</span> Santander</span></h2></div>
                            </div>
                            <hr class="-ml20 -mr20">
                            <h3 class="mt50 mb30 center">Pre-aprobación Entrevista</h3>
                            <p>
                                El formulario se a procesado y se encuentra en estado de pre-aprobación. 
                            </p>
                            <p>
                                Por favor espere a que el administrador verifique su información para continuar con la entrevista.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 center">
                            <a class="btn btn-purpura pl15 pr15 pt8 pb8 mt30" href="contrato">
                                <span class="f16"><i class="bi bi-arrow-counterclockwise"></i> Recargar</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

