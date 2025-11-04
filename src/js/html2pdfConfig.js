//import html2pdf from "html2pdf.js";

$("#btnCrearPdf").click(function() {
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

