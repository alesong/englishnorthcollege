const canvas = document.getElementById('signature-pad');
    const signaturePad = new SignaturePad(canvas);

    // Asegurar que el canvas tenga el tamaño correcto
    function resizeCanvas() {
      const ratio = Math.max(window.devicePixelRatio || 1, 1);
      canvas.width = canvas.offsetWidth * ratio;
      canvas.height = canvas.offsetHeight * ratio;
      canvas.getContext("2d").scale(ratio, ratio);
      signaturePad.clear(); // limpiar después de redimensionar
    }
    window.onresize = resizeCanvas;
    resizeCanvas();

    // Botón de borrar
    document.getElementById('clear-firma').addEventListener('click', () => {
      signaturePad.clear();
    });

    // Guardar en el submit del formulario
    document.getElementById('form-firma').addEventListener('submit', (e) => {
      e.preventDefault();

      if (signaturePad.isEmpty()) {
        alert("Por favor, firme antes de enviar.");
        return;
      }

      // Obtener la firma como imagen base64
      const firmaImagen = signaturePad.toDataURL("image/png");
      
      $.ajax({
        url: 'contrato',
        type: 'POST',
        data: {
          firma: firmaImagen
        },
        success: function(data) {
          console.log(data);
          $('.box-firma').html('<img src="' + data['signature_path'] + '" class="img-firma">');
          $('.espacio-firma').html('<img src="' + data['signature_path'] + '" class="img-firma">');
          $('.linea-punteada').removeClass('oculto');
          $('.box-pagare').slideDown();
          $('.box-firma').addClass('bb2');
        }
      });
    });