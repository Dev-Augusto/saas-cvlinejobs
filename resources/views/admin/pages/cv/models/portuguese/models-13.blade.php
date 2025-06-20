<section>
    <div class="cv-euro-01">
        <div class="cv-euro-01-content">

            <!-- Cabeçalho com Nome, Cargo Desejado e Imagem -->
            <div class="cv-header-with-image">
                <div class="cv-header-text">
                    <h1>{{ $cv['nome'] }}</h1>
                    <p>{{ $cv['documento'] }}</p>
                </div>
                <div class="cv-photo">
                   @include("admin.pages.cv.models.partials.img-profile", $cv)
                </div>
            </div>

            <!-- Contatos -->
            <ul class="cv-contact">
                <li>Email: {{ $cv['email'] }}</li>
                <li>Telefone: {{ $cv['telefone'] }}</li>
                <li>Endereço: {{ $cv['endereco'] }}</li>
                <li>Data de nascimento: {{ date('d/m/Y', strtotime($cv['data_nascimento'])) }}</li>
            </ul>

            <!-- Perfil Profissional -->
            <div class="cv-section">
                <h2>Perfil Profissional</h2>
                <p>{{ $cv['perfil_profissional'] }}</p>
            </div>

            <!-- Experiência -->
            <div class="cv-section">
                <h2>Experiência Profissional</h2>
                @foreach ($cv['experiencias'] as $exp)
                    <div class="cv-entry">
                        <strong>{{ $exp['cargo'] }} — {{ $exp['empresa'] }}</strong>
                        <p>{{ $exp['inicio'] }} - {{ $exp['fim'] }}</p>
                        <p>{{ $exp['descricao'] }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Formação Acadêmica -->
            <div class="cv-section">
                <h2>Educação</h2>
                <p><strong>{{ $cv['curso'] }}</strong> - {{ $cv['instituicao'] }} ({{ $cv['inicio_formacao'] }} - {{ $cv['fim_formacao'] }})</p>
            </div>

            <!-- Idiomas -->
            <div class="cv-section">
                <h2>Idiomas</h2>
                <ul>
                    @foreach ($cv['idiomas'] as $idioma)
                        <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</section>