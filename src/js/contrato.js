$("#btnCrearPdf").click(function(e) {
    e.preventDefault();
    console.log('Creando PDF...');

    var $elementoParaConvertir = document.querySelector('.sectionFormContrato');

    html2pdf()
        .set({
            margin: 0,
            filename: 'Contrato_NC.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, letterRendering: true },
            jsPDF: { unit: "in", format: "a4", orientation: 'portrait' }
        })
        .from($elementoParaConvertir)
        .save()
        .then(() => console.log("Proceso de generación de PDF finalizado"))
        .catch(err => console.log(err));
});
