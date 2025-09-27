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
    /*
    .card-header{
        background-image: url('img/BACKGROUND_VERDE_2.png');
    }
    */
</style>
<section class="sectionUser">
    <div class="container">
        <div class="row left">
            <div class="col-md-12 right">
            <span class="mr10 white"><?php echo $user; ?></span>
            <button id="btn-logout" type="button" class="btn btn-lila f14 mt4 mb4">Cerrar Sesión</button>
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
                            <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div>
                                        <div class="center mb30 fw500 f20">Informacióm del Adquiriente</div>
                                        <form action="" id="form-contrato">
                                            <div class="row mb30">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nombres</label>
                                                        <input type="text" class="form-control" id="nombres" aria-describedby="emailHelp" placeholder="Ingrese sus nombres">
                                                    </div>    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Apellidos</label>
                                                        <input type="text" class="form-control" id="apellidos" aria-describedby="emailHelp" placeholder="Ingrese sus apellidos">
                                                    </div>    
                                                </div>
                                            </div>

                                            <div class="row mb30">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="tipodedocumento">Tipo de documento</label>
                                                        <select class="form-select" id="tipodedocumento">
                                                            <option>Seleccione</option>
                                                            <option value="1">CC</option>
                                                            <option value="1">TI</option>
                                                            <option value="2">Pasaporte</option>
                                                        </select>
                                                    </div>    
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="numerodocumento">Número de documento</label>
                                                        <input type="text" class="form-control" id="numerodocumento" aria-describedby="emailHelp" placeholder="Ingrese su número de documento">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="fechanacimiento">Fecha de nacimiento</label>
                                                        <input type="date" class="form-control" id="fechanacimiento" aria-describedby="emailHelp" placeholder="Ingrese su fecha de nacimiento">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-error-contrato oculto" role="alert"></div>
                                            <div class="right">
                                                <button id="btn-contrato-siguiente-1" type="submit" class="btn btn-lila" data-bs-slide="next">Siguiente</button>
                                            </div>
                                                
                                        </form>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div>
                                        <div class="center mb30 fw500 f20">Informacióm de Contacto</div>
                                        <form action="" id="form-contrato-2">
                                            <div class="row mb30">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Teléfono Celular</label>
                                                        <input type="text" class="form-control" id="nombres" aria-describedby="emailHelp" placeholder="Número">
                                                    </div>    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Teléfono Fijo <span class="f12 gray">(opcional)</span></label>
                                                        <input type="text" class="form-control" id="apellidos" aria-describedby="emailHelp" placeholder="Número">
                                                    </div>    
                                                </div>
                                            </div>

                                            <div class="row mb30">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="direccionresidencia">Dirección Residencial</label>
                                                        <input type="text" class="form-control" id="direccionresidencia" aria-describedby="emailHelp" placeholder="Ingreses su dirección">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb30">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="ciudad">Ciudad</label>
                                                        <input type="text" class="form-control" id="ciudad" placeholder="Ingrese la ciudad">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="barrio">Barrio</label>
                                                        <input type="text" class="form-control" id="barrio" placeholder="Ingrese el barrio">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-error-contrato oculto" role="alert"></div>
                                            <div class="right">
                                                <button id="btn-contrato-siguiente-2" type="submit" class="btn btn-lila" data-bs-slide="next">Siguiente</button>
                                            </div>
                                                
                                        </form>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div>
                                        <div class="center mb30 fw500 f20">Actividad Económica</div>
                                        <form action="" id="form-contrato-3">
                                            <div class="row mb30">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="ocupacion">Ocupación</label>
                                                        <select class="form-select" id="ocupacion">
                                                            <option>Seleccione</option>
                                                            <option value="1">Empleado</option>
                                                            <option value="1">Independiente</option>
                                                        </select>
                                                    </div>    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Cargo</label>
                                                        <input type="text" class="form-control" id="cargo" aria-describedby="emailHelp" placeholder="Ingrese su cargo">
                                                    </div>    
                                                </div>
                                            </div>

                                            <div class="row mb30">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="direccionresidencia">Dirección Laboral</label>
                                                        <input type="text" class="form-control" id="direccionlaboral" aria-describedby="emailHelp" placeholder="Ingreses la dirección">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb30">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="ciudad">Ciudad</label>
                                                        <input type="text" class="form-control" id="ciudad" placeholder="Ingrese la ciudad">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">                                                    
                                                    <div class="form-group">
                                                        <label for="numerodocumento">Ingreso Mensual</label>
                                                        <input type="text" class="form-control" id="ingresomensual" aria-describedby="emailHelp" placeholder="Ingrese su ingreso mensual">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-error-contrato oculto" role="alert"></div>
                                            <div class="right">
                                                <button id="btn-contrato-siguiente-3" type="submit" class="btn btn-lila" data-bs-slide="next">Siguiente</button>
                                            </div>
                                                
                                        </form>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="f12 justificado">
                                        <?php include __DIR__ . '/compraventa.php'; ?>
                                        <p>
                                            En constancia de lo pactado y autorizado se suscribe el presente contrato con firma electrónica:
                                            Nombres y apellidos:
                                        </p>
                                    </div>

                                    <form action="" id="form-contrato-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="checkDefault1">
                                            <label class="form-check-label justificado" for="checkDefault1">
                                                Acepto la adquisición por los términos y oferta realizada por la empresa.
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="checkDefault2">
                                            <label class="form-check-label justificado" for="checkDefault2">
                                                Acepto la Política de Tratamiento de datos y privacidad.
                                            </label>
                                        </div>
                                        
                                        <!-- inicio espacio para la firma digital -->
                                        
                                        <div id="input_120_94_Container" style="height: 180px; width: 300px; user-select: none;">
                                            <input type="hidden" class="gform_hidden" name="input_120_94_valid" id="input_120_94_valid"><canvas id="input_120_94" width="300" height="180" style="border-width: 2px; border-style: dashed; border-color: rgb(221, 221, 221); background-color: rgb(255, 255, 255); z-index: 99; cursor: url(&quot;https://focusyourmind.co/wp-content/plugins/gravityformssignature/super_signature/pen.cur&quot;), pointer; width: 300px; height: 180px;"></canvas>
                                        </div><div id="input_120_94_toolbar" style="margin:5px;position:relative;height:20px;width:300px;background-color:transparent;"><img id="input_120_94_resetbutton" src="https://focusyourmind.co/wp-content/plugins/gravityformssignature/super_signature/refresh.png" style="cursor:pointer;float:right;height:24px;width:24px;border:0px solid transparent" alt="Clear Signature"><div id="input_120_94_status" style="color:blue;height:20px;width:auto;padding:2px;font-family:verdana;font-size:12px;float:left;margin-right:30px;"></div><input type="hidden" id="input_120_94_data" name="input_120_94_data" value=""><input type="hidden" id="input_120_94_data_smooth" name="input_120_94_data_smooth" value=""><input type="hidden" id="input_120_94_data_canvas" name="input_120_94_data_canvas" value=""></div>
                    
                                        <!-- fin espacio para la firma digital -->

                                        <div class="alert alert-error-contrato oculto" role="alert"></div>
                                        <div class="right">
                                            <button id="btn-contrato-siguiente-3" type="submit" class="btn btn-lila" data-bs-slide="next">Finalizar</button>
                                        </div>

                                    </form>
                                    
                                    
                                </div>

                            </div>
                            <button class="oculto" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="oculto" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
<script src="<?php echo BASE_URL; ?>src/js/contrato.js"></script>
<script src="<?php echo BASE_URL; ?>src/js/firmaDigital.js"></script>