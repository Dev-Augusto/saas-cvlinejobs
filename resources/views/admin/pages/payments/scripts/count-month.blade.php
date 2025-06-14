<script>
    const precoInput = document.getElementById('preco');
    const mesesInput = document.getElementById('meses');
    const dataExpiracaoInput = document.getElementById('data_expiracao');

    precoInput.addEventListener('input', function() {
        let preco = parseInt(precoInput.value) || 0;

        // Corrigir para múltiplo de 5000
        if (preco % 5000 !== 0) {
            preco = Math.round(preco / 5000) * 5000;
            precoInput.value = preco;
        }

        const meses = preco / 5000;
        mesesInput.value = meses;

        // Calcula a data de expiração
        const hoje = new Date();
        hoje.setMonth(hoje.getMonth() + meses);

        const ano = hoje.getFullYear();
        const mes = String(hoje.getMonth() + 1).padStart(2, '0');
        const dia = String(hoje.getDate()).padStart(2, '0');
        const dataExpiracao = `${ano}-${mes}-${dia}`;

        dataExpiracaoInput.value = dataExpiracao;
    });
</script>