$('#form-contrato').on('submit', function(e) {
    e.preventDefault();
    console.log("Formulario de contrato enviado");
    console.log($(this).serialize());
    $("#btn-contrato-siguiente-1").html('<div class="spinner-border text-light" role="status">  <span class="visually-hidden">Loading...</span></div>');
    $('#btn-contrato-siguiente-1').attr('disabled', true);

    $.ajax({
        url: './contrato',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            
            if (response.success == false) {
                $("#btn-contrato-siguiente-1").html('Siguiente');
                $('#btn-contrato-siguiente-1').attr('disabled', false);
                $(".alert-error-contrato").addClass("alert-danger").removeClass("alert-success , oculto");
                $(".alert-error-contrato").html(response.message);
            }
            
            if (response.success == true) {
                $("#btn-contrato-siguiente-1").html('<i class="bi bi-arrow-right"></i>');
                $("#alert-error-contrato").addClass("alert-success").removeClass("alert-danger , oculto");
                $("#btn-contrato-siguiente-1").attr('disabled', true);
                $(".alert-error-contrato").html(response.message);

                // avanzar carousel
                setTimeout(function() {
                    $("#carouselExample").carousel('next');
                }, 0); // Redirigir después de 0.5 segundos
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btn-contrato-siguiente-1").html('Siguiente');
            $('#btn-contrato-siguiente-1').attr('disabled', false);
            $(".alert-error-contrato").addClass("alert-danger").removeClass("alert-success , oculto");
            $(".alert-error-contrato").html('Error en la solicitud AJAX: ' + textStatus + ' - ' + errorThrown + '<br>Respuesta del servidor: ' + jqXHR.responseText);
            console.error("Error en la solicitud AJAX:", textStatus, errorThrown, jqXHR.responseText);
        }
    });
});

$('#form-contrato-2').on('submit', function(e) {
    e.preventDefault();
    console.log("Formulario de contrato enviado");
    console.log($(this).serialize());
    $("#btn-contrato-siguiente-2").html('<div class="spinner-border text-light" role="status">  <span class="visually-hidden">Loading...</span></div>');
    $('#btn-contrato-siguiente-2').attr('disabled', true);

    $.ajax({
        url: './contrato',
        type: 'POST',
        data: $(this).serialize(),        
        dataType: 'json',
        success: function(response) {
            
            if (response.success == false) {
                $("#btn-contrato-siguiente-2").html('Siguiente');
                $('#btn-contrato-siguiente-2').attr('disabled', false);
                $(".alert-error-contrato").addClass("alert-danger").removeClass("alert-success , oculto");
                $(".alert-error-contrato").html(response.message);
            }
            
            if (response.success == true) {
                $("#btn-contrato-siguiente-2").html('<i class="bi bi-arrow-right"></i>');
                $("#alert-error-contrato").addClass("alert-success").removeClass("alert-danger , oculto");
                $("#btn-contrato-siguiente-2").attr('disabled', true);
                $(".alert-error-contrato").html(response.message);

                // avanzar carousel
                setTimeout(function() {
                    $("#carouselExample").carousel('next');
                }, 0); // Redirigir después de 0.5 segundos
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btn-contrato-siguiente-2").html('Siguiente');
            $('#btn-contrato-siguiente-2').attr('disabled', false);
            $(".alert-error-contrato").addClass("alert-danger").removeClass("alert-success , oculto");
            $(".alert-error-contrato").html('Error en la solicitud AJAX: ' + textStatus + ' - ' + errorThrown + '<br>Respuesta del servidor: ' + jqXHR.responseText);
            console.error("Error en la solicitud AJAX:", textStatus, errorThrown, jqXHR.responseText);
        }
    });
});

$('#form-contrato-3').on('submit', function(e) {
    e.preventDefault();
    console.log("Formulario de contrato enviado");
    console.log($(this).serialize());    
    $("#btn-contrato-siguiente-3").html('<div class="spinner-border text-light" role="status">  <span class="visually-hidden">Loading...</span></div>');
    $('#btn-contrato-siguiente-3').attr('disabled', true);

    $.ajax({
        url: './contrato',
        type: 'POST',
        data: $(this).serialize(),        
        dataType: 'json',        
        success: function(response) {
            
            if (response.success == false) {
                $("#btn-contrato-siguiente-3").html('Siguiente');
                $('#btn-contrato-siguiente-3').attr('disabled', false);
                $(".alert-error-contrato").addClass("alert-danger").removeClass("alert-success , oculto");
                $(".alert-error-contrato").html(response.message);
            }
            
            if (response.success == true) {
                $("#btn-contrato-siguiente-3").html('<i class="bi bi-arrow-right"></i>');
                $("#alert-error-contrato").addClass("alert-success").removeClass("alert-danger , oculto");
                $("#btn-contrato-siguiente-3").attr('disabled', true);
                $(".alert-error-contrato").html(response.message);

                // avanzar carousel
                setTimeout(function() {
                    $("#carouselExample").carousel('next');
                }, 0); // Redirigir después de 0.5 segundos
            }
        },        
        error: function(jqXHR, textStatus, errorThrown) {
            $("#btn-contrato-siguiente-3").html('Siguiente');
            $('#btn-contrato-siguiente-3').attr('disabled', false);
            $(".alert-error-contrato").addClass("alert-danger").removeClass("alert-success , oculto");
            $(".alert-error-contrato").html('Error en la solicitud AJAX: ' + textStatus + ' - ' + errorThrown + '<br>Respuesta del servidor: ' + jqXHR.responseText);
            console.error("Error en la solicitud AJAX:", textStatus, errorThrown, jqXHR.responseText);
        }
    });
}); 