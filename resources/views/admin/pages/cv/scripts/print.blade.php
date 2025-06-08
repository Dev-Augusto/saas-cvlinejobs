<script>
function printCV(event) {
    event.preventDefault();
    
    const cvContent = document.getElementById('cv-content');
    if (!cvContent) {
        alert("Conteúdo do currículo não encontrado.");
        return;
    }

    // Pega todos os links e estilos do documento atual
    const styles = [...document.querySelectorAll('link[rel="stylesheet"], style')]
        .map(style => style.outerHTML)
        .join('\n');

    const newWindow = window.open('', '_blank');
    newWindow.document.write(`
        <html>
            <head>
                <title>CV - {{$cv['nome']}}</title>
                ${styles}
            </head>
            <body onload="window.print(); window.close();">
                ${cvContent.innerHTML}
            </body>
        </html>
    `);
    newWindow.document.close();
}



function downloadCV(event) {
    event.preventDefault(); // impedir navegação pelo href="#"
    
    const element = document.getElementById('cv-content');
    html2pdf().from(element).set({
        margin: 0.5,
        filename: 'curriculo.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
    }).save();
}
</script>