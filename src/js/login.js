$('#loginForm').on('submit', function(e) {
    e.preventDefault();
    console.log("Formulario de login enviado");
    console.log($(this).serialize());
    $("#btn-login").html('<div class="spinner-border text-light" role="status">  <span class="visually-hidden">Loading...</span></div>');
    $('#btn-login').attr('disabled', true);
    
    $.ajax({
              
        url: './login',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            
            $("#btn-login").html('Iniciar Sesión');
            $('#btn-login').attr('disabled', false);
            if (response.success == false) {
                $("#alert-error-login").addClass("alert-danger").removeClass("alert-success , oculto");
                $("#alert-error-login").html(response.message);
            }
            
            if (response.success == true) {
                $("#alert-error-login").addClass("alert-success").removeClass("alert-danger , oculto");
                $("#btn-login").attr('disabled', true);
                $("#alert-error-login").html(response.message);
                location.href = response.location;
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btn-login").html('Iniciar Sesión');
            $('#btn-login').attr('disabled', false);
            $("#alert-error-login").addClass("alert-danger").removeClass("alert-success , oculto");
            $("#alert-error-login").html('Error en la solicitud AJAX: ' + textStatus + ' - ' + errorThrown + '<br>Respuesta del servidor: ' + jqXHR.responseText);
            console.error("Error en la solicitud AJAX:", textStatus, errorThrown, jqXHR.responseText);
        }
    });
    
});