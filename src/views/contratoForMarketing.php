<style>
    
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
        /*display: inline-block;*/
    }
    .clear-firma{
        border-radius: 0px 0px 0px 10px;
        border: none;
        
    }
    .save-firma{
        border-radius: 0px 0px 10px 0px;
        border: none;
    }
    .espacio-firma{
        display: inline-block;
    }

    .linea-punteada{
        border: 2px solid #505050ff;
        border-style: dashed;
        width: 100%+30px;
        margin: 60px -15px;
    }
    .c-9c3{
        color: #9c3;
    }
    .bg-9c3{
        background-color: #9c3;
    }
    #form-firma{
        text-align: left;
    }
</style>


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
                                    <div>INSTITUCIÓN EDUCATIVA NORTH COLLEGE DE SANTANDERM SAS</div>
                                    <div>Sede Admnistrativa</div>
                                    <div>INSTITUCIÓN EDUCATIVA PARA EL TRABAJO Y EL DESARROLLO HUMANO</div>
                                    <div>RESOLUCIÓN 00228 DEL 6 DE ENERO DE 2023 SECRETARIA DE EDUCACIÓN DE SANTANDER</div>
                                    <div>Calle 16 No. 12-46 Celular 3142187981</div>
                                    <div>Santander - Colombia</div>
                                </div>
                            </div>
                            
                            <hr class="-ml20 -mr20">
                            
                            <div class="row pl10 pr10 -mt1">
                                <div class="col-md-3 b1 inlineBlock p0 -ml1">
                                    <div><label class="f10 pl5">FECHA DEL CONTRATO</label></div>
                                    <input type="text" class="col100 b0" id="" value="<?php if(isset($row['fecha_contrato']) && $row['fecha_contrato'] != '') {echo date($row['fecha_contrato']);}else{echo date('Y-m-d');} ?>" readonly>
                                </div>
                                <div class="col-md-9 right">
                                    <div class="consecutivo"><?php echo $id_usuario+100; ?></div>
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
                                        //require __DIR__ . '../../controllers/include_input_contrato.php';
                                    ?>
                                    <div>
                                        
<!----------------------------------------------->                                        
    <label id="label-<?php echo $id; ?>" class="f10 pl5" for="<?php echo $id; ?>"><?php echo $label; ?><i id="icon-<?php echo $id; ?>" class="bi bi-check ml5 oculto"></i></label>
</div>
<input type="<?php echo $type; ?>" class="col100 b0 pl5" id="<?php echo $id; ?>" name="<?php echo $id; ?>" onchange="update('<?php echo $id; ?>')" value="<?php echo $row_email[$id]; ?>">
<!----------------------------------------------->



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

                            <div class="row pl10 pr10 pt10 -mt1 f15">
                                <div class="col-md-3  p10 -ml1 center">
                                    <label class="form-check-label justificado fw600" for="">PROGRAMA</label>
                                </div>
                                <div class="col-md-3  p10 -ml1 center">
                                    <label class="form-check-label justificado" for="checkTrimodular">TRIMODULAR</label>
                                    <input class="form-check-input ml10" type="checkbox" <?php if(isset($row['checkTrimodular']) && $row['checkTrimodular'] == 1){ echo 'checked'; } ?> type="checkbox"  id="checkTrimodular" >
                                </div>
                                <div class="col-md-3  p10 -ml1 center">
                                    <label class="form-check-label justificado" for="checkBimodular">BIMODULAR</label>
                                    <input class="form-check-input ml10" type="checkbox" <?php if(isset($row['checkBimodular']) && $row['checkBimodular'] == 1){ echo 'checked'; }else{} ?> type="checkbox" id="checkBimodular" >
                                </div>
                                <div class="col-md-3  p10 -ml1 center">
                                    <label class="form-check-label justificado" for="checkUnimodular">UNIMODULAR</label>
                                    <input class="form-check-input ml10" type="checkbox" <?php if(isset($row['checkUnimodular']) && $row['checkUnimodular'] == 1){ echo 'checked'; }else{} ?> type="checkbox" id="checkUnimodular" >
                                </div>
                            </div>

                            <div class="justificado mt20 f10" style="line-height: 1.1;">
                            <?php include __DIR__ . '/compraventa.php'; ?>
                            </div>
                            

                        </div>
                    </div>

                    
                    <form id="form-firma" class="mt20">
                        <div class="row m0 -mt5 mb20 radius5 b2 c-9c3 center">
                            <div class="col-md-1 p0 center f10 b1 -ml bg-9c3 c-9c3 pt20 pb20"><span class="white fw-bold mt10">PLAN DE PAGO</span></div>
                            <div class="col b1  p0">
                                <div><label class="f10 pl5 tc-333">VALOR DEL PRGRAMA</label></div>
                                
                                <div class="input-group">
                                <span class="input-group-text radius0">$</span>
                                <input type="number" class="form-control radius0" id="input_valor_programa" aria-label="Amount (to the nearest dollar)" value="<?php echo $row['input_valor_programa'] ?? ''; ?>" required>
                                
                                </div>

                                
                            </div>
                            <div class="col b1  p0">
                                <div><label class="f10 pl5 tc-333">VALOR CUOTA INICIAL</label></div>
                                <div class="input-group">
                                <span class="input-group-text radius0">$</span>
                                <input type="number" class="form-control radius0" id="input_valor_cuota_inicial" aria-label="Amount (to the nearest dollar)" value="<?php echo $row['input_valor_cuota_inicial'] ?? ''; ?>" required>
                                
                                </div>
                            </div>
                            <div class="col b1  p0">
                                <div><label class="f10 pl5 tc-333">VALOR CUOTAS MENSUALES</label></div>
                                <div class="input-group">
                                <span class="input-group-text radius0">$</span>
                                <input type="number" class="form-control radius0" id="input_valor_cuotas_mensuales" aria-label="Amount (to the nearest dollar)" value="<?php echo $row['input_valor_cuotas_mensuales'] ?? ''; ?>" required>
                                
                                </div>
                            </div>
                            <div class="col b1  p0">
                                <div><label class="f10 pl5 tc-333">NÚMERO DE CUOTRAS MENSUALES</label></div>
                                <div class="input-group">
                                
                                <input type="number" class="form-control radius0" id="input_numero_cuotas" aria-label="Amount (to the nearest dollar)" value="<?php echo $row['input_numero_cuotas'] ?? ''; ?>" required>
                                
                                </div>
                            </div>
                        </div>
                        <div class="form-check ml6">
                            <input class="form-check-input" type="checkbox" value="" id="checkOfertaEmpresa" <?php if(isset($row['checkOfertaEmpresa']) && $row['checkOfertaEmpresa'] == 1){ echo 'checked'; } ?> required>
                            <label class="form-check-label justificado" for="checkOfertaEmpresa">
                                Acepto la adquisición por los términos y oferta realizada por la empresa.
                            </label>
                        </div>
                        <div class="form-check ml6">
                            <input class="form-check-input" type="checkbox" value="" id="checkPrivacidad" <?php if(isset($row['checkPrivacidad']) && $row['checkPrivacidad'] == 1){ echo 'checked'; } ?> required>
                            <label class="form-check-label justificado" for="checkPrivacidad">
                                Acepto la política de privacidad y tratamiento de datos.
                            </label>
                        </div>
                        <div class="mt20">
                            <p>En constancia de lo pactado y autorizado se suscribe el presente contrato con firma digital:</p>
                            
                        </div>
                    
                        <?php
                        if( isset($row['firma']) && $row['firma']!=''){
                            //insertar imagen base64 en la firma
                            //extraer firma
                            $firma = $row['firma'];
                            echo '<div class="espacio-firma"><img src="'.$firma.'" class="img-firma"></div>';
                        } else {
                            ?>
                            <div class="box-firma oculto">
                                <span class="absolute ml10 mt5 tc-555">FIRMA TITULAR</span>
                                <canvas id="signature-pad"></canvas>
                                <div class="row -mt5">
                                    <div class="col pr0" id=""><button id="clear-firma" type="button" class="btn btn-primary col100 clear-firma"><i class="bi bi-eraser-fill"></i></button></div>
                                    <div class="col pl0" id=""><button type="submit" class="btn btn-lila col100 save-firma"><i class="bi bi-check-circle-fill "></i></button></div>
                                </div>
                                
                            </div>
                            <div class="espacio-firma"><div class="b1 p50 tc-bbb fw-700">ESPACIO PARA LA FIRMA</div></div>
                            <?php
                        }
                        ?>
                        <div class="f14">
                            <strong>
                                <?php 
                                    if( isset($row['nombres']) && $row['nombres']!=''){
                                        echo $row['nombres'].'<br>';
                                    } else {
                                        echo 'Nombre del adquirente<br>';
                                    }
                                    echo 'C.C: '.$row['numero_documento'] ?? 'Número de documento<br>';
                                ?>
                            </strong>
                        </div>


                        <div class="linea-punteada <?php if(!isset($row['firma']) || $row['firma']==''){ echo 'oculto'; } ?>"></div>

                        <div class="box-pagare bg-white p20 radius5 mt20 <?php if(!isset($row['firma']) || $row['firma']==''){ echo 'oculto'; } ?>">
                            <div class="row">
                                    <div class="col-md-12">
                                        <div class="row pl10 pr10 -mt1">
                                        <div class="col-md-3 inlineBlock p0 -ml1">
                                            <div><label class="f18 fw700 pl5">PAGARÉ</label></div>
                                        </div>
                                        <div class="col-md-9 right">
                                            <div class="consecutivo"><?php echo $id_usuario+100; ?></div>
                                        </div>
                                    </div>
                                    <p class="justificado lh2 m0">
                                        En (los) suscrito(s)________________________________________ 
                                        Por medio de este PAGARÉ me(nos) obligo(abligamos) incondicionalmente a pagar a la orden de INSTITUCION EDUCATIVA NORTH COLLEGE DE SANTANDER S.A.S. 
                                        la suma de_____________________________________________________
                                        ($___________________) el día_________________ de_____________________ del año________________________________ 
                                        en la ciudad de____________________________ o en otro lugar que se me(nos) requiera para el pago, con intereses moratiorios a la tasa equivalente hasta el doble del corriente bancario, pero sin exeder, en todo caso, los limites legales.
                                        En constancia de lo anterior, suscribo(suscribimos) el presente PAGARÉ en_____________________ a los_________ días del mes de___________ del año______________
                                    </p>
                                </div>
                                <?php
                                if( isset($row['firma']) && $row['firma']!=''){
                            //insertar imagen base64 en la firma
                            //extraer firma
                            $firma = $row['firma'];
                            echo '<div class="espacio-firma" style="display: inline-block;"><img src="'.$firma.'" class="img-firma"></div>';
                        }
                                ?>
                                <div class="f14">
                                    <strong>
                                        <?php 
                                            if( isset($row['nombres']) && $row['nombres']!=''){
                                                echo $row['nombres'].'<br>';
                                            } else {
                                                echo 'Nombre del adquirente<br>';
                                            }
                                            echo 'C.C: '.$row['numero_documento'] ?? 'Número de documento<br>';
                                        ?>
                                    </strong>
                                </div>
                            </div>

                            <div class="right">
                                <input type="hidden" name="progreso" value="4">
                                
                            </div>

                        </div>

                        
                    </form>

                </div>
            </section>
            <button id="btnCrearPdf" class="mt30 f-right f16 mb50 p4"><i class="bi bi-file-earmark-pdf-fill red mr5"></i>Descargar Contrato</button>
        </div>
    </div>
</section>


<?php include __DIR__ . '/footer.php'; ?>
<script src="<?php echo BASE_URL; ?>src/js/preinscripcion.js"></script> <!-- Se necesita este archivo para el formulario -->
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.5/dist/signature_pad.umd.min.js"></script>
<script src="<?php echo BASE_URL; ?>src/js/firmaDigital.js"></script>
<script src="<?php echo BASE_URL; ?>src/js/html2pdf.bundle.min.js"></script>
<script src="<?php echo BASE_URL; ?>src/js/contrato.js"></script>