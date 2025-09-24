// Archivo principal de JavaScript
console.log("¡Hola desde app.js!");

document.addEventListener('DOMContentLoaded', () => {
    // Aquí puedes agregar tu lógica de JavaScript
    console.log("El DOM ha sido cargado.");

    // Ejemplo de interacción
    const myButton = document.getElementById('myButton');
    if (myButton) {
        myButton.addEventListener('click', () => {
            alert('Botón clickeado!');
        });
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const pdfViewer = document.getElementById('pdf-viewer');
    const spinnerContainer = document.getElementById('spinner-container');

    if (pdfViewer && spinnerContainer) {
        // Mostrar el spinner al inicio
        spinnerContainer.style.display = 'flex';

        // Ocultar el spinner cuando el iframe haya cargado
        pdfViewer.onload = () => {
            spinnerContainer.style.display = 'none';
        };

        // En caso de error de carga del iframe (ej. PDF no encontrado), también ocultar el spinner
        pdfViewer.onerror = () => {
            console.error('Error al cargar el PDF.');
            spinnerContainer.style.display = 'none';
        };
    }
});


$('#ve1').on('click', function() {
    console.log("Ve1");
    $('.videos-modal').css('display', 'block');
    $('.videos-modal').html('<div class="btn-x p5" onclick="closeModalVideos()">X</div><div class="center box-videos-modal"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/gAUU2KSOcXY" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe><div>');
});

$('#ve2').on('click', function() {
    $('.videos-modal').css('display', 'block');
    $('.videos-modal').html('<div class="btn-x p5" onclick="closeModalVideos()">X</div><div class="center box-videos-modal"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/UcpmNuQF9nk" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe><div>');
});

$('#ve3').on('click', function() {
    $('.videos-modal').css('display', 'block');
    $('.videos-modal').html('<div class="btn-x p5" onclick="closeModalVideos()">X</div><div class="center box-videos-modal"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/0h_NBHFMVxw" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe><div>');
});

$('#ve4').on('click', function() {
    $('.videos-modal').css('display', 'block');
    $('.videos-modal').html('<div class="btn-x p5" onclick="closeModalVideos()">X</div><div class="center box-videos-modal"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/f-0HIsfUzlo?" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe><div>');
});


$('#vt1').on('click', function() {
    console.log("Ve1");
    $('.videos-modal').css('display', 'block');
    $('.videos-modal').html('<div class="btn-x p5" onclick="closeModalVideos()">X</div><div class="center box-videos-modal"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/a3oVpUsEKMg" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe><div>');
});

$('#vt2').on('click', function() {
    $('.videos-modal').css('display', 'block');
    $('.videos-modal').html('<div class="btn-x p5" onclick="closeModalVideos()">X</div><div class="center box-videos-modal"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/_qCsxXc59y0" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe><div>');
});

$('#vt3').on('click', function() {
    $('.videos-modal').css('display', 'block');
    $('.videos-modal').html('<div class="btn-x p5" onclick="closeModalVideos()">X</div><div class="center box-videos-modal"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/N7nwXjQfyy4" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe><div>');
});

$('#vt4').on('click', function() {
    $('.videos-modal').css('display', 'block');
    $('.videos-modal').html('<div class="btn-x p5" onclick="closeModalVideos()">X</div><div class="center box-videos-modal"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/9IKJ80zBLdQ" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe><div>');
});




function closeModalVideos(){
    $('.videos-modal').css('display', 'none');
    $('.videos-modal').html('');
}