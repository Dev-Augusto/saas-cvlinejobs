<section>
    <div class="design-04">
        <div class="design-04-content">
            {{-- LADO ESQUERDO --}}
            <div class="div-04-left">
                
                {{-- Imagem de Perfil --}}
                <div class="img">
                    @include("admin.pages.cv.models.partials.img-profile")
                </div>

                {{-- Perfil Profissional --}}
                <div class="item-04">
                    <h2>Perfil</h2>
                    <li>{{ session('curriculo')['perfil_profissional'] }}</li>
                </div>

                {{-- Idiomas --}}
                <div class="item-04">
                    <h2>Idiomas</h2>
                    @foreach (session('curriculo')['idiomas'] as $idioma)
                        <li>{{ $idioma['nome'] }} — {{ ucfirst($idioma['nivel']) }}</li>
                    @endforeach
                </div>

                {{-- Habilidades --}}
                <div class="item-04">
                    <h2>Habilidades</h2>
                    @foreach (session('curriculo')['habilidades'] as $habilidade)
                        <li>{{ $habilidade }}</li>
                    @endforeach
                </div>
            </div>

            {{-- LADO DIREITO --}}
            <div class="div-04-right">

                {{-- Cabeçalho --}}
                <div class="item-04-header">
                    <h2>{{ session('curriculo')['nome'] }}</h2>
                    <div>
                        <p><span>Documento: </span>{{ session('curriculo')['documento'] }}</p>
                        <p><span>Nascimento: </span>{{ \Carbon\Carbon::parse(session('curriculo')['data_nascimento'])->format('d/m/Y') }}</p>
                        <p><span>Gênero: </span>{{ ucfirst(session('curriculo')['genero']) }}</p>
                    </div>
                </div>

                {{-- Formação Acadêmica --}}
                <div class="item-04">
                    <h2>Educação</h2>
                    <li>{{ session('curriculo')['curso'] }}</li>
                    <li>{{ session('curriculo')['instituicao'] }}</li>
                    <li>{{ session('curriculo')['classe'] }} ({{ session('curriculo')['inicio_formacao'] }} - {{ session('curriculo')['fim_formacao'] }})</li>
                </div>

                {{-- Experiência Profissional --}}
                <div class="item-04">
                    <h2>Experiência Profissional</h2>
                    @foreach (session('curriculo')['experiencias'] as $exp)
                        <li>
                            <strong>{{ $exp['cargo'] }}</strong> na <strong>{{ $exp['empresa'] }}</strong><br>
                            <small>{{ $exp['inicio'] }} - {{ $exp['fim'] }}</small><br>
                            <span>{{ $exp['descricao'] }}</span>
                        </li>
                    @endforeach
                </div>

                {{-- Objectivo Profissional --}}
                <div class="item-04">
                    <h2>Objetivo</h2>
                    <p class="text-justify">{{ session('curriculo')['perfil_profissional'] }}</p>
                </div>

                {{-- Contactos --}}
                <div class="item-04">
                    <h2>Contatos</h2>
                    <li>{{ session('curriculo')['email'] }}</li>
                    <li>{{ session('curriculo')['telefone'] }}</li>
                    <li>{{ session('curriculo')['endereco'] }}</li>
                </div>
            </div>
        </div>
    </div>
</section>
