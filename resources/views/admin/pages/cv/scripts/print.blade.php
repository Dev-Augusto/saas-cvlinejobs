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

    // Abre nova janela (ou aba)
    const newWindow = window.open('', '_blank');
    newWindow.document.write(`
        <html>
            <head>
                <title>CV - ${document.title || 'Currículo'}</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
                ${styles}
                <style>
                    /* Força o conteúdo a ocupar a largura total na impressão */
                    body {
                        -webkit-print-color-adjust: exact;
                        print-color-adjust: exact;
                        margin: 0;
                        padding: 0;
                        width: 100%;
                    }
                    #cv-content {
                        width: 100%;
                        max-width: 100%;
                        overflow: visible;
                    }

                    @page {
                        size: A4;
                        margin: 1cm;
                    }

                    @media print {
                        html, body {
                            height: auto !important;
                            overflow: visible !important;
                        }
                    }
                </style>
            </head>
            <body>
                <div id="cv-content">
                    ${cvContent.innerHTML}
                </div>
                <script>
                    // Aguarda o carregamento dos estilos antes de imprimir
                    window.onload = function() {
                        setTimeout(function() {
                            window.print();
                            window.close();
                        }, 600);
                    }
                <\/script>
            </body>
        </html>
    `);

    newWindow.document.close();
}

function downloadCV(event) {
    event.preventDefault(); // impede navegação pelo href="#"
    
    const element = document.getElementById('cv-content');

    const opt = {
        margin: 0.5,
        filename: 'curriculo.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: {
            scale: 2,
            scrollY: 0,
            windowWidth: element.scrollWidth,
            windowHeight: element.scrollHeight
        },
        jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
    };

    html2pdf().from(element).set(opt).save();
}

</script>