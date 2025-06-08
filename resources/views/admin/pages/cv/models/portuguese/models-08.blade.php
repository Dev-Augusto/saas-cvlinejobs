<section>
    <div class="design-04">
        <div class="design-04-content">
            {{-- LADO ESQUERDO --}}
            <div class="div-04-left">
                
                {{-- Imagem de Perfil --}}
                <div class="img">
                    @include("admin.pages.cv.models.partials.img-profile", $cv)
                </div>

                {{-- Perfil Profissional --}}
                <div class="item-04">
                    <h2>Perfil</h2>
                    <li>{{ $cv['perfil_profissional'] }}</li>
                </div>

                {{-- Idiomas --}}
                <div class="item-04">
                    <h2>Idiomas</h2>
                    @foreach ($cv['idiomas'] as $idioma)
                        <li>{{ $idioma['nome'] }} — {{ ucfirst($idioma['nivel']) }}</li>
                    @endforeach
                </div>

                {{-- Habilidades --}}
                <div class="item-04">
                    <h2>Habilidades</h2>
                    @foreach ($cv['habilidades'] as $habilidade)
                        <li>{{ $habilidade }}</li>
                    @endforeach
                </div>
            </div>

            {{-- LADO DIREITO --}}
            <div class="div-04-right">

                {{-- Cabeçalho --}}
                <div class="item-04-header">
                    <h2>{{ $cv['nome'] }}</h2>
                    <div>
                        <p><span>Documento: </span>{{ $cv['documento'] }}</p>
                        <p><span>Nascimento: </span>{{ \Carbon\Carbon::parse($cv['data_nascimento'])->format('d/m/Y') }}</p>
                        <p><span>Gênero: </span>{{ ucfirst($cv['genero']) }}</p>
                    </div>
                </div>

                {{-- Formação Acadêmica --}}
                <div class="item-04">
                    <h2>Educação</h2>
                    <li>{{ $cv['curso'] }}</li>
                    <li>{{ $cv['instituicao'] }}</li>
                    <li>{{ $cv['classe'] }} ({{ $cv['inicio_formacao'] }} - {{ $cv['fim_formacao'] }})</li>
                </div>

                {{-- Experiência Profissional --}}
                <div class="item-04">
                    <h2>Experiência Profissional</h2>
                    @foreach ($cv['experiencias'] as $exp)
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
                    <p class="text-justify">{{ $cv['perfil_profissional'] }}</p>
                </div>

                {{-- Contactos --}}
                <div class="item-04">
                    <h2>Contatos</h2>
                    <li>{{ $cv['email'] }}</li>
                    <li>{{ $cv['telefone'] }}</li>
                    <li>{{ $cv['endereco'] }}</li>
                </div>
            </div>
        </div>
    </div>
</section>
