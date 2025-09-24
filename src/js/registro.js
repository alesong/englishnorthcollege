console.log("Hola desde registro.js");
$(document).ready(function() {
    console.log("la hora es: " + new Date());
})


$("#registroForm").on('submit', function(e) {
    e.preventDefault();
    console.log("Formulario de registro enviado");
    console.log($(this).serialize());

    
    $.ajax({
              
        url: './registro',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            
            console.log("La espuesta es: "+response.message);
        }
        
    });
    
});