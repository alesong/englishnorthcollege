$(document).ready(function() {
    const loginForm = $('#loginForm');
    const registerForm = $('#registerForm');
    const showRegisterFormBtn = $('#showRegisterForm');
    const showLoginFormBtn = $('#showLoginForm');
    const formTitle = $('#formTitle');

    showRegisterFormBtn.on('click', function() {
        loginForm.hide();
        registerForm.show();
        formTitle.text('Registrarse');
    });

    showLoginFormBtn.on('click', function() {
        registerForm.hide();
        loginForm.show();
        formTitle.text('Iniciar Sesión');
    });

    // Validación y envío del formulario de registro con AJAX
    registerForm.on('submit', function(e) {
        e.preventDefault(); // Evitar el envío normal del formulario

        // Validaciones básicas del lado del cliente
        const password = $('#registerPassword').val();
        const confirmPassword = $('#confirmPassword').val();

        if (password !== confirmPassword) {
            alert('Las contraseñas no coinciden.');
            return;
        }

        // Recopilar datos del formulario
        const formData = $(this).serialize();

        $.ajax({
            url: 'api/apilogin.php', // Archivo PHP para procesar el registro
            type: 'POST',
            data: formData,
            dataType: 'json', // Esperamos una respuesta JSON del servidor
            success: function(response) {
                if (response.success) {
                    alert('Registro exitoso: ' + response.message);
                    // Opcional: redirigir al usuario o mostrar el formulario de login
                    registerForm.hide();
                    loginForm.show();
                    formTitle.text('Iniciar Sesión');
                } else {
                    alert('Error en el registro: ' + response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error al conectar con el servidor: ' + textStatus);
                console.error('AJAX Error:', textStatus, errorThrown, jqXHR.responseText);
            }
        });
    });
});