<section>
    <div class="design-14">
        <div class="design-14-content">
            <div class="section-14-lados">

                {{-- LADO ESQUERDO --}}
                <div class="section-14-left">
                    <div class="img-perfil">
                       @include("admin.pages.cv.models.partials.img-profile", $cv)
                    </div>

                    <div class="description">
                        <ul>
                            @if (!empty($cv['data_nascimento']))
                                <li><span>Was Born:</span> {{ \Carbon\Carbon::parse($cv['data_nascimento'])->format('d/m/Y') }}</li>
                            @endif

                            @if (!empty($cv['endereco']))
                                <li><span>Address:</span> {{ $cv['endereco'] }}</li>
                            @endif

                            @if (!empty($cv['genero']))
                                <li><span>Gender:</span> {{ ucfirst($cv['genero']) }}</li>
                            @endif
                        </ul>
                    </div>
                </div>

                {{-- LADO DIREITO --}}
                <div class="section-14-right">
                    <div class="name-perfil">
                        <h2>{{ $cv['nome'] ?? 'Nome não disponível' }}</h2>
                    </div>

                    <div class="section-14-items">
                        {{-- Formação Académica --}}
                        <div class="section-14-item">
                            <h2>Academic Field</h2>
                            <ul>
                                <li>{{ $cv['classe'] ?? '' }}</li>
                                <li>{{ $cv['curso'] ?? '' }} - {{ $cv['instituicao'] ?? '' }}</li>
                                <li>{{ $cv['inicio_formacao'] ?? '' }} - {{ $cv['fim_formacao'] ?? '' }}</li>
                            </ul>
                        </div>

                        {{-- Experiência Profissional --}}
                        <div class="section-14-item">
                            <h2>Professional Experience</h2>
                            @if (!empty($cv['experiencias']))
                                <ul>
                                    @foreach ($cv['experiencias'] as $exp)
                                        <li>
                                            <strong>{{ $exp['cargo'] }}</strong> na {{ $exp['empresa'] }} ({{ $exp['inicio'] }} - {{ $exp['fim'] }})<br>
                                            <small>{{ $exp['descricao'] }}</small>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        {{-- Habilidades --}}
                        <div class="section-14-item">
                            <h2>Professional Skills</h2>
                            <ul>
                                @foreach ($cv['habilidades'] ?? [] as $habilidade)
                                    <li>{{ $habilidade }}</li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Idiomas --}}
                        <div class="section-14-item">
                            <h2>Languages</h2>
                            <ul>
                                @foreach ($cv['idiomas'] ?? [] as $idioma)
                                    <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- Contactos --}}
                        <div class="section-14-item">
                            <h2>Contacts</h2>
                            <ul>
                                @foreach (explode('|', $cv['telefone']) as $numero)
                                    <li>{{ trim($numero) }}</li>
                                @endforeach
                                <li>{{ $cv['email'] }}</li>
                            </ul>
                        </div>

                        {{-- Perfil Profissional --}}
                        <div class="section-14-item">
                            <h2>Profile</h2>
                            <p class="desc">{{ $cv['perfil_profissional'] ?? '' }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
