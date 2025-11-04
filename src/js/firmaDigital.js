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

      checkTrimodular = document.getElementById('checkTrimodular').checked;
      checkBimodular = document.getElementById('checkBimodular').checked;
      checkUnimodular = document.getElementById('checkUnimodular').checked;

      input_valor_programa = document.getElementById('input_valor_programa').value;
      input_valor_cuota_inicial = document.getElementById('input_valor_cuota_inicial').value;
      input_valor_cuotas_mensuales = document.getElementById('input_valor_cuotas_mensuales').value;
      input_numero_cuotas = document.getElementById('input_numero_cuotas').value;

      checkOfertaEmpresa = document.getElementById('checkOfertaEmpresa').checked;
      checkPrivacidad = document.getElementById('checkPrivacidad').checked;

      


      // Obtener la firma como imagen base64
      const firmaImagen = signaturePad.toDataURL("image/png");
      
      $.ajax({
        url: 'contrato',
        type: 'POST',
        data: {
          checkTrimodular: checkTrimodular,
          checkBimodular: checkBimodular,
          checkUnimodular: checkUnimodular,
          input_valor_programa: input_valor_programa,
          input_valor_cuota_inicial: input_valor_cuota_inicial,
          input_valor_cuotas_mensuales: input_valor_cuotas_mensuales,
          input_numero_cuotas: input_numero_cuotas,
          checkOfertaEmpresa: checkOfertaEmpresa,
          checkPrivacidad: checkPrivacidad,
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