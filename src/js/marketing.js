//let dataTable = new DataTable('#tablaUsuarios');

$('#tablaUsuarios').DataTable({
    "order": [],
    "columnDefs": [
        {
            "targets": 0,
            "orderable": false
        }
    ]
});

function aprobar(id) {
    //$('#btn-contrato-' + id).toggleClass('oculto');
    //$('#btn-whatsapp-' + id).toggleClass('oculto');
    $check = $('#check-' + id);
    

    $('.botones-' + id).toggleClass('oculto');

    $aprobar = ($check.is(':checked') ? 'checked' : 'unchecked');
      
    $.ajax({
        url: 'aprobar',
        type: 'POST',
        data: {
            id: id,
            aprobar: $aprobar
        },
        success: function(data) {
            console.log(data.html);
            if (data.status == 'success') {
                //$('#btn-contrato-' + id).removeClass('btn-primary').addClass('btn-warning');
            }
        }
    });
}

function openContrato(id) {
    console.log('Contrato '+id);
    $.ajax({
        url: 'marketing',
        type: 'POST',
        data: {
            id: id
        },
        success: function(data) {
            console.log(data);
            $('.contratos-modal').css('display', 'block');
            $('.contratos-modal').html('<div class="btn-x p5" onclick="closeModalContratos()">X</div><div class="center box-videos-modal">'+data+'</div>');
        }
    });
    
}

function closeModalContratos(){
    $('.contratos-modal').css('display', 'none');
    $('.contratos-modal').html('');
}



$("#btnCrearPdf").click(function(e) {
    e.preventDefault();
    console.log('Creando PDF...');
    
    var $elementoParaConvertir = $('.sectionFormContrato'); // <-- Aquí puedes elegir cualquier elemento del DOM
    html2pdf()
        .set({
            margin: 0.25,
            filename: 'documento.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 3, // A mayor escala, mejores gráficos, pero más peso
                letterRendering: true,
            },
            jsPDF: {
                unit: "in",
                format: "a4",
                orientation: 'portrait' // landscape o portrait
            }
        })
        .from($elementoParaConvertir)
        .save()
        .catch(err => console.log(err))
        .finally(() => console.log("Proceso de generación de PDF finalizado"));
});