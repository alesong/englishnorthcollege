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
      border: 0px solid #9c3;
      border-bottom: none;
      border-radius: 10px 10px 0px 0px;
      width: 300px;
      height: 200px;
      background-color: #fff;
      cursor: url('img/pen.cur'), pointer;
    }
    .buttons {
      margin-top: 10px;
    }
    .consecutivo{
        font-size: 1rem;
        color: rgba(204, 51, 51, 1);
        font-weight: bold;
        /*border: 2px solid #ff3b3bff;*/
        border-radius: 10px;
        padding: 5px 10px;
        display: inline-block;
        text-align: center;
    }
    .box-firma{
        border-radius: 10px;
        border: 0px solid #9c3;
        display: inline-block;
    }
    .clear-firma{
        border-radius: 0px 0px 0px 10px;
        border: none;
        
    }
    .save-firma{
        border-radius: 0px 0px 10px 0px;
        border: none;
    }
    
    .linea-punteada{
        border: 2px solid #505050ff;
        border-style: dashed;
        width: 100%+30px;
        margin: 60px -15px;
    }
</style>
<section class="sectionUser">
    <div class="container">
        <div class="row left">
            <div class="col-md-12 right">
            <span class="mr10 white"><?php echo $user; ?></span>
            <a href="logout" id="btn-logout" type="button" class="btn btn-lila f14 mt4 mb4">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <div class="row justify-content-center">
            <section class="sectionFormContrato mt30 mb30 pb30">
                <div class="container f12 pb30">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-1 absolute"><img src="img/logoNCtransparent.png" class="img-logo-form img100 mt20" alt="logo"></div>
                                <div class="col-12 center mt30" style="line-height: 1.1;">
                                    <div class=""><strong>CONTRATO DE MATRICULA</strong></div>
                                    <div>INSTITUCIÓN EDUCATIVA NORTH COLLEGE SANTANDERM SAS</div>
                                    <div>Sede Admnistrativa</div>
                                    <div>INSTITUCIÓN EDUCATIVA PARA EL TRABAJO Y EL DESARROLLO HUMANO</div>
                                    <div>RESOLUCIÓN 00228 DEL 6 DE ENERO DE 2023 SECRETARIA DE EDUCACIÓN DE SANTANDER</div>
                                    <div>Calle 16 No. 12-46 Celular 3142187981</div>
                                    <div>Santander - Colombia</div>
                                </div>
                            </div>
                            
                            <hr class="-ml20 -mr20">
                            <div class="right">
                                <div class="consecutivo">001</div>
                            </div>
                            <div class="row pl10 pr10 -mt1">
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <div><label class="f10 pl5">FECHA DEL CONTRATO</label></div>
                                    <input type="text" class="col100 b0" id="" value="">
                                </div>
                            </div>
                            <div class="row pl10 pr10 mt10">
                                <div class="col-md-6 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'nombres';
                                        $label = 'NOMBRE DEL ADQUIRENTE';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                
                                <div class="col-md-2 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'profesion';
                                        $label = 'PROFESION';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>

                                <div class="col-md-2 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'numero_documento';
                                        $label = 'NIT / CC';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>

                                <div class="col-md-2 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'estado_civil';
                                        $label = 'ESTADO CIVIL';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                            </div>    
                            
                            <div class="row pl10 pr10 -mt1">
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'fecha_nacimiento';
                                        $label = 'FECHA DE NACIMIENTO';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'direccion_domicilio';
                                        $label = 'DIRECCIÓN DOMICILIO';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'email';
                                        $label = 'E-MAIL';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'telefono_celular';
                                        $label = 'CELULAR';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                            </div>
                            
                            <div class="row pl10 pr10 -mt1">
                                <div class="col-md-2 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'empresa';
                                        $label = 'EMPRESA';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-2 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'direccion_laboral';
                                        $label = 'DIRECCION EMPRESA';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-2 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'telefono_laboral';
                                        $label = 'TELÉFONO';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-2 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'antiguedad';
                                        $label = 'ANTIGÜEDAD';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-2 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'cargo';
                                        $label = 'CARGO';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-2 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'ingreso_mensual';
                                        $label = 'INGRESO MENSUAL';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                            </div>

                            <div class="row pl10 pr10 -mt1">
                                <div class="col-md-2 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'referencia_familiar';
                                        $label = 'REFERENCIA FAMILIAR';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-2 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'parentesco_familiar';
                                        $label = 'PARENTESCO';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-2 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'celular_familiar';
                                        $label = 'CELULAR';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-2 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'referencia_personal';
                                        $label = 'REFERENCIA PERSONAL';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-2 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'parentesco_personal';
                                        $label = 'PARENTESCO';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-2 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'celular_personal';
                                        $label = 'CELULAR';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                            </div>
                            
                            <div class="row pl10 pr10 -mt1">
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'nombre_usuario_emw_principal';
                                        $label = 'USUARIO';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'identificacion_usuario_emw_principal';
                                        $label = 'IDENTIFICACIÓN';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'email_usuario_emw_principal';
                                        $label = 'E-MAIL';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'celular_usuario_emw_principal';
                                        $label = 'CELULAR';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                            </div>

                            <div class="row pl10 pr10 -mt1">
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'nombre_usuario_emw_beneficiario';
                                        $label = 'BENEFICIARIO';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'identificacion_usuario_emw_beneficiario';
                                        $label = 'IDENTIFICACIÓN';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'email_usuario_emw_beneficiario';
                                        $label = 'E-MAIL';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'celular_usuario_emw_beneficiario';
                                        $label = 'CELULAR';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                            </div>

                            <div class="row pl10 pr10 -mt1">
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'nombre_codeudor';
                                        $label = 'CODEUDOR';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'identificacion_codeudor';
                                        $label = 'IDENTIFICACIÓN';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'direccion_codeudor';
                                        $label = 'DOMICILIO';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'celular_codeudor';
                                        $label = 'CELULAR';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                            </div>

                            <div class="row pl10 pr10 -mt1">
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'empresa_codeudor';
                                        $label = 'EMPRESA CODEUDOR';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'cargo_codeudor';
                                        $label = 'CARGO';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'direccion_codeudor';
                                        $label = 'DOMICILIO';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <?php 
                                        $id = 'celular_codeudor';
                                        $label = 'TELÉFONO';
                                        $type = 'text';
                                        require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                </div>
                            </div>


                            <div class="justificado mt20" style="line-height: 1.1;">
                            <?php include __DIR__ . '/compraventa.php'; ?>
                            </div>
                            

                        </div>
                    </div>

                    
                    <form id="form-firma" class="mt20">
                        <div class="row m0 -mt5 mb20 radius5">
                            <div class="col-md-1 p0 center f10 b1 -ml1">PLAN DE PAGO</div>
                            <div class="col b1 -ml1 p0">
                                <div><label class="f10 pl5">VALOR DEL PRGRAMA</label></div>
                                <input type="text" class="col100 b0 p0 radius0 center" id="" value="">
                            </div>
                            <div class="col b1 -ml1 p0">
                                <div><label class="f10 pl5">VALOR CUOTA INICIAL</label></div>
                                <input type="text" class="col100 b0 p0 radius0 center" id="" value="">
                            </div>
                            <div class="col b1 -ml1 p0">
                                <div><label class="f10 pl5">VALOR CUOTAS MENSUALES</label></div>
                                <input type="text" class="col100 b0 p0 radius0 center" id="" value="">
                            </div>
                            <div class="col b1 -ml1 p0">
                                <div><label class="f10 pl5">NÚMERO DE CUOTRAS MENSUALES</label></div>
                                <input type="text" class="col100 b0 p0 radius0 center" id="" value="">
                            </div>
                        </div>
                        <div class="form-check ml6">
                            <input class="form-check-input" type="checkbox" value="" id="checkDefault1" >
                            <label class="form-check-label justificado" for="checkDefault1">
                                Acepto la adquisición por los términos y oferta realizada por la empresa.
                            </label>
                        </div>
                        <div class="form-check ml6">
                            <input class="form-check-input" type="checkbox" value="" id="checkDefault2" >
                            <label class="form-check-label justificado" for="checkDefault2">
                                Acepto la Política de Tratamiento de datos y privacidad.
                            </label>
                        </div>
                        <div class="mt20">
                            <p>En constancia de lo pactado y autorizado se suscribe el presente contrato con firma electrónica:</p>
                            
                        </div>
                    <div class="box-firma">
                        <canvas id="signature-pad"></canvas>
                        <div class="row -mt5">
                            <div class="col pr0" id=""><button id="clear-firma" type="button" class="btn btn-primary col100 clear-firma"><i class="bi bi-eraser-fill"></i></button></div>
                            <div class="col pl0" id=""><button type="submit" class="btn btn-lila col100 save-firma"><i class="bi bi-check-circle-fill "></i></button></div>
                        </div>
                        
                    </div>
                    <div class="espacio-firma bb2 oculto"></div>
                    
                    <div class="f14">
                        <strong>
                            <?php 
                                if( isset($row['nombres']) && $row['nombres']!=''){
                                    echo $row['nombres'].'<br>';
                                } else {
                                    echo 'Nombre del adquirente<br>';
                                }
                                echo 'C.C: '.$row['numero_documento'] ?? 'Número de documento<br>' ;
                            ?>
                        </strong>
                    </div>

                    <div class='linea-punteada oculto'></div>

                    <div class="box-pagare bg-white p20 radius5 mt20 oculto">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="f22 fw-bold">PAGARÉ</div>
                                <p class="justificado lh3">
                                    En (los) suscrito(s)________________________________ 
                                    Por medio de este PAGARÉ me(nos) obligo(abligamos) incondicionalmente a pagar a la orden de INSTITUCION EDUCATIVA HORTH COLLEGE S.A.S. 
                                    la suma de_____________________________________________________
                                    $___________________ el día_________________ de_____________________ del año________________________________ 
                                    en la ciudad de____________________________ o en otro lugar que se me(nos) requiera para el pago, con intereses moratiorios a la tasa equivalente hasta el doble del corriente bancario, pero sin exeder, en todo caso, los limites legales.
                                    En constancia de lo anterior, suscribo(suscribimos) el presente pagaré en_____________________ a los_________ días del mes de___________ del año______________
                                </p>
                            </div>
                            <div class="espacio-firma"></div>
                            <div class="fw-bold">Firma Titular C.C: </div>
                        </div>
                    </div>

                    </form>

                    

                    <form id="form-contrato-4" class="">

                        
                            

                        <div class="alert alert-error-contrato oculto" role="alert"></div>
                        <div class="right">
                            <input type="hidden" name="progreso" value="4">
                            <button id="btn-contrato-siguiente-4" type="submit" class="btn btn-lila" data-bs-slide="next">Finalizar</button>
                        </div>
                    </form>

                </div>
            </section>
        </div>
    </div>
</section>


<?php include __DIR__ . '/footer.php'; ?>
<script src="<?php echo BASE_URL; ?>src/js/preinscripcion.js"></script> <!-- Se necesita este archivo para el formulario -->
<script src="<?php echo BASE_URL; ?>src/js/contrato.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.5/dist/signature_pad.umd.min.js"></script>
<script src="<?php echo BASE_URL; ?>src/js/firmaDigital.js"></script>