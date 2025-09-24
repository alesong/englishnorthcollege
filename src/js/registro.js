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
                $("#alert-error-registro").addClass("alert-danger").removeClass("alert-success , oculto").html(response.message);
                $("#alert-error-registro").html(response.message);
            }
            if (response.message == 'Las contraseñas no coinciden.') {
                $("#alert-error-registro").addClass("alert-danger").removeClass("alert-success , oculto").html(response.message);
                $("#alert-error-registro").html(response.message);
                $('.input-password').addClass('is-invalid');
            }
            if (response.success == true) {
                $("#alert-error-registro").addClass("alert-success").removeClass("alert-danger , oculto").html(response.message);
                $("#alert-error-registro").html(response.message);
            }
        }
        
    });
    
});