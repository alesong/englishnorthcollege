$('#pagosForm').on('submit', function(e) {
    e.preventDefault();
    console.log("Formulario de pagos enviado");
    console.log($(this).serialize());
    $("#btn-consultar-pagos").html('<div class="spinner-border text-light" role="status">  <span class="visually-hidden">Loading...</span></div>');
    $('#btn-consultar-pagos').attr('disabled', true);
    
    $.ajax({
              
        url: './pagos',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            $('html').css('overflow', 'auto');
            $('body').css('overflow', 'auto');
            $('.sectionhomepage').css('overflow', 'auto');
            
            $("#btn-consultar-pagos").html('Consultar');
            $('#btn-consultar-pagos').attr('disabled', false);
            if (response.success == false) {
                $("#alert-error-login").addClass("alert-danger").removeClass("alert-success , oculto");
                $("#alert-error-login").html(response.message);
            }

            $('.card').slideUp();
            $('#resultado-pagos').slideDown();
            
            if (response.success == true) {
                $("#alert-error-login").addClass("alert-success").removeClass("alert-danger , oculto");
                $("#btn-login").attr('disabled', true);
                $("#alert-error-login").html(response.message);
                console.log(response.data.estado);
                console.log(response);
                console.log(response.data);
                console.log(response.data.fecha_pago);
                
                console.log('resultados '+response.data.length);
                
                $('#tbody-pagos').html('');
                for (var i = 0; i < response.data.length; i++) {
                    mes = response.data[i].pago_oportuno;
                    mes = mes.split('-')[1];
                    //Pomer nombre del mes
                    var meses = {
                        '01': 'Enero',
                        '02': 'Febrero',
                        '03': 'Marzo',
                        '04': 'Abril',
                        '05': 'Mayo',
                        '06': 'Junio',
                        '07': 'Julio',
                        '08': 'Agosto',
                        '09': 'Septiembre',
                        '10': 'Octubre',
                        '11': 'Noviembre',
                        '12': 'Diciembre'
                    };
                    
                    estado_boton = ''; //por defecto
                    estado_cuenta = '';  //por defecto
                    if(response.data[i].estado == 'Pendiente' || response.data[i].estado == 'pendiente'){

                        console.log('Pago Oportuno: '+new Date(response.data[i].pago_oportuno));
                        console.log('Hoy: '+new Date(response.hoy));
                        console.log('Hoy-15: '+new Date(response.hoy_menos_15));
                        console.log('Hoy+15: '+new Date(response.hoy_mas_15));

                        //convertir a segundos
                        var hoy = new Date(response.hoy);
                        var hoy_menos_15 = new Date(response.hoy_menos_15);
                        var pago_oportuno = new Date(response.data[i].pago_oportuno);
                        var hoy_mas_15 = new Date(response.hoy_mas_15);

                        //convertir fechas a segundos
                        hoy = hoy.getTime()/1000;
                        hoy_menos_15 = hoy_menos_15.getTime()/1000;
                        pago_oportuno = pago_oportuno.getTime()/1000;
                        hoy_mas_15 = hoy_mas_15.getTime()/1000;
                        console.log('hoy: '+hoy);
                        console.log('hoy_menos_15: '+hoy_menos_15);
                        console.log('pago_oportuno: '+pago_oportuno);
                        console.log('hoy_mas_15: '+hoy_mas_15);

                        if(hoy < pago_oportuno){
                            console.log(i+' hoy < pago_oportuno ');
                            estado_boton = '<a type="button" class="bg-ddd pt6 pb6 pl12 pr12 b0 radius6 gray">Pagar</a>';
                            estado_cuenta = '<span class="">Pendiente</span>';
                        }
                        
                        
                        if(hoy_mas_15 > pago_oportuno){
                            console.log(i+' hoy_menos_15 > pago_oportuno ');
                            estado_boton = '<button type="button" class="btn btn-primary b0">Pagar</button>';
                            estado_cuenta = '<span class="text-warning">Por pagar</span>';
                        
                            if(hoy > pago_oportuno){
                                console.log(i+' hoy > pago_oportuno ');
                                estado_boton = '<button type="button" class="btn btn-primary b0">Pagar</button>';
                                estado_cuenta = '<span class="text-danger">En mora</span>';    
                            }
                        }

                        console.log('-----------------------');
                        
                    }

                    mes = meses[mes];
                    anio = response.data[i].pago_oportuno;
                    anio = anio.split('-')[0];
                    consepto = 'Mensualidad ' + mes+' '+anio;
                    var row = '<tr>';
                    row += '<td>' + consepto + '</td>';
                    row += '<td>' + response.data[i].pago_oportuno + '</td>'; 
                    row += '<td>' + response.data[i].valor_cuota + '</td>';
                    row += '<td>' + estado_cuenta + '</td>';  
                    row += '<td>' + estado_boton + '</td>';
                    row += '</tr>';
                    $('#tbody-pagos').append(row);
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btn-consultar-pagos").html('Consultar');
            $('#btn-consultar-pagos').attr('disabled', false);
            $("#alert-error-login").addClass("alert-danger").removeClass("alert-success , oculto");
            $("#alert-error-login").html('Error en la solicitud AJAX: ' + textStatus + ' - ' + errorThrown + '<br>Respuesta del servidor: ' + jqXHR.responseText);
            console.error("Error en la solicitud AJAX:", textStatus, errorThrown, jqXHR.responseText);
        }
    });
    
});