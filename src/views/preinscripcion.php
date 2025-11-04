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
    #signature-pad {
      border: 2px solid #000;
      border-radius: 8px;
      width: 400px;
      height: 200px;
      background-color: #fff;
      cursor: url('img/pen.cur'), pointer;
    }
    .buttons {
      margin-top: 10px;
    }
    .progress-bar-9c3 {
        background-color: #9c3;
    }
</style>
<?php include __DIR__ . '/sectionUser.php'; ?>

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

                            <div class="progress mb30" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                              <div class="progress-bar-9c3 progress-bar" style="width: 15%">15%</div>
                            </div>

                            <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div>
                                        <div class="center mb30 fw500 f20">Información del Adquiriente</div>
                                        <form action="" id="form-contrato-1">
                                            <div class="row mb30">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php 
                                                            $id = 'nombres';
                                                            $label = 'Nombres y Apellidos';
                                                            $type = 'text';
                                                            $required = 'required';
                                                            require __DIR__ . '../../controllers/include_input.php';
                                                        ?>
                                                    </div>    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php 
                                                            $id = 'profesion';
                                                            $label = 'Profesión';
                                                            $type = 'text';
                                                            $required = 'required';
                                                            require __DIR__ . '../../controllers/include_input.php';
                                                        ?>
                                                    </div>    
                                                </div>
                                            </div>

                                            <div class="row mb30">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php 
                                                            $id = 'numero_documento';
                                                            $label = 'Numero de Documento';
                                                            $type = 'text';
                                                            $required = 'required';
                                                            require __DIR__ . '../../controllers/include_input.php';
                                                        ?>
                                                    </div>    
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php 
                                                            $id = 'estado_civil';
                                                            $label = 'Estado Civil';
                                                            $type = 'text';
                                                            $required = 'required';
                                                            //require __DIR__ . '../../controllers/include_input.php';
                                                        ?>
                                                        <label for=""><?php echo $label; ?></label>
                                                        <select name="<?php echo $id; ?>" id="<?php echo $id; ?>" class="form-control" required>
                                                            <?php
                                                                if ($row['estado_civil'] != '') {
                                                                    echo '<option value="'.$row['estado_civil'].'" selected>'.$row['estado_civil'].'</option>';
                                                                }
                                                            ?>
                                                            <option value="">Seleccione</option>
                                                            <option value="Soltero">Soltero</option>
                                                            <option value="Casado">Casado</option>
                                                            <option value="Viudo">Viudo</option>
                                                            <option value="Divorciado">Divorciado</option>
                                                            <option value="Separado">Separado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <?php 
                                                            $id = 'fecha_nacimiento';
                                                            $label = 'Fecha de Nacimiento';
                                                            $type = 'date';
                                                            $required = 'required';
                                                            require __DIR__ . '../../controllers/include_input.php';
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-error-contrato oculto" role="alert"></div>
                                            <div class="right">
                                                
                                                <button id="btn-finalizar" class="btn-purpura pl15 pr15 pt8 pb8" type="submit">
                                                    <span class="f16">Preinscripción</span>
                                                </button>
                                            </div>
                                                
                                        </form>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div>
                                        <div class="center mb30 fw500 f20">Información de Contacto</div>
                                        <form action="" id="form-contrato-2">
                                            <div class="row mb30">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php 
                                                            $id = 'direccion_domicilio';
                                                            $label = 'Dirección Domicilio';
                                                            $type = 'text';
                                                            $required = 'required';
                                                            require __DIR__ . '../../controllers/include_input.php';
                                                        ?>
                                                    </div>    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php 
                                                            $id = 'ciudad_domicilio';
                                                            $label = 'Ciudad Domicilio';
                                                            $type = 'text';
                                                            $required = 'required';
                                                            require __DIR__ . '../../controllers/include_input.php';
                                                        ?>
                                                    </div>    
                                                </div>
                                            </div>

                                            <div class="row mb30">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php 
                                                            $id = 'telefono_celular';
                                                            $label = 'Telefono Celular';
                                                            $type = 'text';
                                                            $required = 'required';
                                                            require __DIR__ . '../../controllers/include_input.php';
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="alert alert-error-contrato oculto" role="alert"></div>
                                            <div class="right">
                                                <button class="pl10 pr10 pt8 pb8" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                                    <span class="f16"><i class="bi bi-caret-left-fill"></i></span>
                                                </button>
                                                <button  id="btn45" onclick="progressBar(45)" class="btn-lila pl15 pr15 pt8 pb8" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                                    <span class="f16">Siguiente</span>
                                                </button>
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
                                                        <?php 
                                                            $id = 'empresa';
                                                            $label = 'Empresa donde trabaja';
                                                            $type = 'text';
                                                            $required = 'required';
                                                            require __DIR__ . '../../controllers/include_input.php';
                                                        ?>
                                                    </div>    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php 
                                                            $id = 'cargo';
                                                            $label = 'Cargo';
                                                            $type = 'text';
                                                            $required = 'required';
                                                            require __DIR__ . '../../controllers/include_input.php';
                                                        ?>
                                                    </div>    
                                                </div>
                                            </div>

                                            <div class="row mb30">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php 
                                                            $id = 'direccion_laboral';
                                                            $label = 'Direccion Laboral';
                                                            $type = 'text';
                                                            $required = 'required';
                                                            require __DIR__ . '../../controllers/include_input.php';
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php 
                                                            $id = 'telefono_laboral';
                                                            $label = 'Teléfono Laboral';
                                                            $type = 'text';
                                                            $required = 'required';
                                                            require __DIR__ . '../../controllers/include_input.php';
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb30">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php 
                                                            $id = 'antiguedad';
                                                            $label = 'Antigüedad';
                                                            $type = 'text';
                                                            $required = 'required';
                                                            require __DIR__ . '../../controllers/include_input.php';
                                                        ?>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">                                                    
                                                    <div class="form-group">
                                                        <?php 
                                                            $id = 'ingreso_mensual';
                                                            $label = 'Ingreso Mensual';
                                                            $type = 'text';
                                                            $required = 'required';
                                                            require __DIR__ . '../../controllers/include_input.php';
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="alert alert-error-contrato oculto" role="alert"></div>
                                            <div class="right">
                                                <button class="pl10 pr10 pt8 pb8" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                                    <span class="f16"><i class="bi bi-caret-left-fill"></i></span>
                                                </button>
                                                <button  id="btn60" onclick="progressBar(60)" class="btn-lila pl15 pr15 pt8 pb8" type="submit" data-bs-target="#carouselExample" data-bs-slide="next">
                                                    <span class="f16">Siguiente</span>
                                                </button>
                                            </div>
                                                
                                        </form>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="center mb30 fw500 f20">Referencias</div>
                                    <form>
                                        <div class="row mb30">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'referencia_familiar';
                                                        $label = 'Referencia Familiar';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'parentesco_familiar';
                                                        $label = 'Parentesco';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'celular_familiar';
                                                        $label = 'Celular';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb30">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'referencia_personal';
                                                        $label = 'Referencia Personal';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'parentesco_personal';
                                                        $label = 'Parentesco';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'celular_personal';
                                                        $label = 'Celular';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right">
                                                <button class="pl10 pr10 pt8 pb8" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                                    <span class="f16"><i class="bi bi-caret-left-fill"></i></span>
                                                </button>
                                                <button id="btn85" onclick="progressBar(85)" class="btn-lila pl15 pr15 pt8 pb8" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                                    <span class="f16">Siguiente</span>
                                                </button>
                                        </div>
                                    </form>
                                </div>

                                <div class="carousel-item">
                                    <div class="center mb30 fw500 f20">Información de estudiantes</div>
                                    <form action="" id="form-preinscripcion">
                                        <div class="row mb30">
                                            <div class="col-md-6 justify-content-center pt30">
                                                <div class="form-check form-switch ml6">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkMismoAdquiriente" switch>
                                                    <label class="form-check-label" for="checkMismoAdquiriente">
                                                        Marque esta casilla si el estudiante es el miso titular.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb30">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'nombre_usuario_emw_principal';
                                                        $label = 'Nombre completo del estudiante.';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb30">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'identificacion_usuario_emw_principal';
                                                        $label = 'No. Documento de Identidad del estudiante.';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'email_usuario_emw_principal';
                                                        $label = 'Correo electrónico del estudiante.';
                                                        $type = 'email';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'celular_usuario_emw_principal';
                                                        $label = 'Celular';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row mb30 inputs_beneficiario oculto">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'nombre_usuario_emw_beneficiario';
                                                        $label = 'Nombre completo del estudiante beneficiario';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb30 inputs_beneficiario oculto">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'identificacion_usuario_emw_beneficiario';
                                                        $label = 'No. Documento de Identidad';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'email_usuario_emw_beneficiario';
                                                        $label = 'Correo electrónico.';
                                                        $type = 'email';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'celular_usuario_emw_beneficiario';
                                                        $label = 'Celular';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb30">
                                            <div class="col-md-3">
                                                <div class="btn-lila radius5 center pointer" id="btn-agregar-beneficiario">Agregar Beneficiario <span class="grey f12 ml5 mr5">(Opcional)</span><i class="bi bi-arrow-bar-down"></i></div>
                                                <div class="btn-lila radius5 center pointer oculto" id="btn-retirar-beneficiario">Retirar Beneficiario <span class="grey f12 ml5 mr5">(Opcional)</span><i class="bi bi-arrow-bar-up"></i></div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="preinscripcion" value="1">

                                        <div class="right">
                                                <button class="pl10 pr10 pt8 pb8" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                                    <span class="f16"><i class="bi bi-caret-left-fill"></i></span>
                                                </button>
                                                <button id="" class="btn-purpura pl15 pr15 pt8 pb8" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                                    <span class="f16">Finalizar</span>
                                                </button>
                                            </div>

                                        
                                    </form>
                                </div>

                                <div class="carousel-item">
                                    <div class="center mb30 fw500 f20">Datos de Codeudor</div>
                                    <form>
                                        <div class="row mb30">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'nombre_codeudor';
                                                        $label = 'Nombre Completo';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'identificacion_codeudor';
                                                        $label = 'No. Documento de Identidad';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'direccion_codeudor';
                                                        $label = 'Dirección';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb30">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'celular_codeudor';
                                                        $label = 'Celular';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'empresa_codeudor';
                                                        $label = 'Empresa donde trabaja';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <?php
                                                        $id = 'cargo_codeudor';
                                                        $label = 'Cargo';
                                                        $type = 'text';
                                                        $required = 'required';
                                                        require __DIR__ . '../../controllers/include_input.php';
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right">
                                                <button class="pl10 pr10 pt8 pb8" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                                    <span class="f16"><i class="bi bi-caret-left-fill"></i></span>
                                                </button>
                                                <button id="" class="btn-purpura pl15 pr15 pt8 pb8" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                                    <span class="f16">Finalizar</span>
                                                </button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                            
                        </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>


<?php include __DIR__ . '/footer.php'; ?>
<script src="<?php echo BASE_URL; ?>src/js/preinscripcion.js"></script>