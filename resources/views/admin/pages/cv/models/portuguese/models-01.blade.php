<link href="{{public_path("assets/css/cv-designer.css")}}" rel="stylesheet">
<section>
    <div class="design-01" id="cv-content">
        <div class="design-01-content">
            <div class="header-desing-01">
                <h2>Curriculum Vitae</h2>
            </div>

            <div class="section-design-01">
                {{-- INFORMAÇÕES PESSOAIS --}}
                <div class="design-01-item">
                    <h2>Informações Pessoais</h2>
                    <ul>
                        @if (!empty($cv['nome']))
                            <li><span>Nome:</span> {{ $cv['nome'] }}</li>
                        @endif
                        @if (!empty($cv['data_nascimento']))
                            <li><span>Data de Nascimento:</span> {{ date('d/m/Y', strtotime($cv['data_nascimento'])) }}</li>
                        @endif
                        @if (!empty($cv['genero']))
                            <li><span>Gênero:</span> {{ ucfirst($cv['genero']) }}</li>
                        @endif
                        @if (!empty($cv['documento']))
                            <li><span>Documento:</span> {{ $cv['documento'] }}</li>
                        @endif
                        @if (!empty($cv['endereco']))
                            <li><span>Endereço:</span> {{ $cv['endereco'] }}</li>
                        @endif
                        @if (!empty($cv['email']))
                            <li><span>Email:</span> {{ $cv['email'] }}</li>
                        @endif
                        @if (!empty($cv['telefone']))
                            <li><span>Telefone:</span> {{ $cv['telefone'] }}</li>
                        @endif
                    </ul>
                </div>

                {{-- FORMAÇÃO ACADÊMICA --}}
                <div class="design-01-item">
                    <h2>Formação Académica</h2>
                    <ul>
                        <li>{{ $cv['classe'] ?? '' }} no curso de {{ $cv['curso'] ?? '' }}</li>
                        <li>{{ $cv['instituicao'] ?? '' }} ({{ $cv['inicio_formacao'] ?? '' }} - {{ $cv['fim_formacao'] ?? '' }})</li>
                    </ul>
                </div>

                {{-- FORMAÇÃO PROFISSIONAL --}}
                @if (!empty($cv['habilidades']) && is_array($cv['habilidades']))
                <div class="design-01-item">
                    <h2>Formação Profissional</h2>
                    <ul>
                        @foreach ($cv['habilidades'] as $habilidade)
                            <li>{{ $habilidade }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- EXPERIÊNCIA PROFISSIONAL --}}
                @if (!empty($cv['experiencias']) && is_array($cv['experiencias']))
                <div class="design-01-item">
                    <h2>Experiência Profissional</h2>
                    <ul>
                        @foreach ($cv['experiencias'] as $exp)
                            <li>
                                <strong>{{ $exp['empresa'] }}</strong> - {{ $exp['cargo'] }}<br>
                                <small>{{ $exp['inicio'] }} - {{ $exp['fim'] }}</small><br>
                                <span>{{ $exp['descricao'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- IDIOMAS --}}
                @if (!empty($cv['idiomas']) && is_array($cv['idiomas']))
                <div class="design-01-item">
                    <h2>Idiomas</h2>
                    <ul>
                        @foreach ($cv['idiomas'] as $idioma)
                            <li>{{ $idioma['nome'] }} — {{ ucfirst($idioma['nivel']) }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- PERFIL PROFISSIONAL --}}
                @if (!empty($cv['perfil_profissional']))
                <div class="design-01-item">
                    <h2>Perfil</h2>
                    <p class="text-justify">{{ $cv['perfil_profissional'] }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
