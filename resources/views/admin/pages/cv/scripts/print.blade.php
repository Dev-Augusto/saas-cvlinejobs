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
    event.preventDefault();

    const element = document.getElementById('cv-content');
    if (!element) {
        alert("Conteúdo do currículo não encontrado!");
        return;
    }

    // Detecta se é um dispositivo móvel
    const isMobile = /Android|iPhone|iPad|iPod|Opera Mini|IEMobile|WPDesktop/i.test(navigator.userAgent);

    // Configurações comuns
    const baseOptions = {
        margin: 0.5,
        filename: 'curriculo.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
    };

    // Configurações específicas
    const mobileOptions = {
        ...baseOptions,
        html2canvas: {
            scale: 2,
            scrollY: 0,
            windowWidth: element.scrollWidth,
            windowHeight: element.scrollHeight
        }
    };

    const desktopOptions = {
        ...baseOptions,
        html2canvas: { scale: 2 }
    };

    // Usa a versão conforme o dispositivo
    const options = isMobile ? mobileOptions : desktopOptions;

    html2pdf().from(element).set(options).save();
}

</script>