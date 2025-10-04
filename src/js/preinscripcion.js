function  update(id){
    $('#icon-'+id).fadeIn(0);
    $.ajax({
        url: './preinscripcion',
        type: 'POST',
        data: {'campo': id , 'dato': $('#'+id).val()},
        dataType: 'json',
        success: function(response) {
            $('#icon-'+id).removeClass('bi-check').addClass('bi-check-all');
            $('#icon-'+id).fadeOut(3000);
            if (response.success == true) {
               console.log(response.message);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $(".alert-error-preinscripcion").addClass("alert-danger").removeClass("alert-success , oculto");
            $(".alert-error-preinscripcion").html('Error en la solicitud AJAX: ' + textStatus + ' - ' + errorThrown + '<br>Respuesta del servidor: ' + jqXHR.responseText);
            console.error("Error en la solicitud AJAX:", textStatus, errorThrown, jqXHR.responseText);
        }
    });
}

$("#btn-agregar-beneficiario").on('click', function() {
    $("#btn-agregar-beneficiario").addClass("oculto");
    $("#btn-retirar-beneficiario").removeClass("oculto");
    $(".inputs_beneficiario").slideDown();
});

$("#btn-retirar-beneficiario").on('click', function() {
    $("#btn-agregar-beneficiario").removeClass("oculto");
    $("#btn-retirar-beneficiario").addClass("oculto");
    $(".inputs_beneficiario").slideUp();
});

// Verificar si el checkbox mismo adquiriente esta seleccionado
$("#checkMismoAdquiriente").on('change', function() {
    if ($(this).is(":checked")) {
        $("#nombre_usuario_emw_principal").val($("#nombres").val());
        update('nombre_usuario_emw_principal');
        $("#identificacion_usuario_emw_principal").val($("#numero_documento").val());
        update('identificacion_usuario_emw_principal');
        $("#email_usuario_emw_principal").val($("#userName").val());
        update('email_usuario_emw_principal');
        $("#celular_usuario_emw_principal").val($("#telefono_celular").val());
        update('celular_usuario_emw_principal');
    }else{
        $("#nombre_usuario_emw_principal").val("");
        update('nombre_usuario_emw_principal');
        $("#identificacion_usuario_emw_principal").val("");
        update('identificacion_usuario_emw_principal');
        $("#email_usuario_emw_principal").val("");
        update('email_usuario_emw_principal');
        $("#celular_usuario_emw_principal").val("");
        update('celular_usuario_emw_principal');
    }
});

$('#btn-finalizar').on('click', function(e) {
    location.href = 'contrato';
});