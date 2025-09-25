console.log("Hola desde registro.js");
$(document).ready(function() {
    console.log("la hora es: " + new Date());
})


$("#registroForm").on('submit', function(e) {
    e.preventDefault();
    console.log("Formulario de registro enviado");
    console.log($(this).serialize());
    $("#btn-registarse").html('<div class="spinner-border text-light" role="status">  <span class="visually-hidden">Loading...</span></div>');
    $('#btn-registarse').attr('disabled', true);
    
    $.ajax({
              
        url: './registro',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            $("#btn-registarse").html('Registrarse');
            $('#btn-registarse').attr('disabled', false);
            if (response.success == false) {
                $("#alert-error-registro").addClass("alert-danger").removeClass("alert-success , oculto");
                $("#msg-server").html(response.message);
            }
            if (response.message == 'Las contraseñas no coinciden.') {
                $("#alert-error-registro").addClass("alert-danger").removeClass("alert-success , oculto");
                $('.input-password').addClass('is-invalid');
                $("#msg-server").html(response.message);
            }
            if (response.success == true) {
                $("#alert-error-registro").addClass("alert-success").removeClass("alert-danger , oculto");
                $("#btn-registarse").attr('disabled', true);
                $("#msg-server").html(response.message);
                $(".form-verify").removeClass("oculto");

            }
        }
        
    });
    
});

$('#verificarCodigo').on('click', function() {
    
    console.log("Verificando el código...");
    $("#verificarCodigo").html('<div class="spinner-border text-light" role="status">  <span class="visually-hidden">Loading...</span></div>');
    //$('#verificarCodigo').attr('disabled', true);
    $.ajax({
        url: './verificar',
        type: 'POST',
        data: {
            email: $('#basic-url').val(),
            codigo: $('#codigo').val()
        },
        dataType: 'json',
        success: function(response) {
            if (response.success == true) {
                $("#alert-error-registro").addClass("alert-success").removeClass("alert-danger , oculto");
                $("#msg-server").html(response.message);
                $("btn-registarse").attr('disabled' , true);
                $("#verificarCodigo").html('<i class="bi bi-check-lg f22"></i>');
                //redireccionar a la pagina de contrato en 3 segundos
                setTimeout(function() {
                    $("#msg-server").html("<h2>Verificación Exitosa 3</h2>");
                }, 1000);
                setTimeout(function() {
                    $("#msg-server").html("<h2>Verificación Exitosa 2</h2>");
                }, 2000);
                setTimeout(function() {
                    $("#msg-server").html("<h2>Verificación Exitosa 1</h2>");
                }, 3000);
                setTimeout(function() {
                    $("#msg-server").html("<h2>Verificación Exitosa 0</h2>");
                }, 4000);
                setTimeout(function() {
                    window.location.href = "contrato";
                }, 4000);
            }
            if (response.success == false) {
                $("#alert-error-registro").addClass("alert-danger").removeClass("alert-success , oculto");
                $("#msg-server").html(response.message);
                $("#verificarCodigo").attr("disabled" , false);
                $("#verificarCodigo").html('Verificar');
                
            }
        }
    });
});

