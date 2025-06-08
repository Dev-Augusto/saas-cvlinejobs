<section>
    <div class="design-15">
        <div class="design-15-content">
            <div class="section-15-lados">
                {{-- Lado Esquerdo --}}
                <div class="section-15-left">
                    <div class="img-perfil">
                        @include("admin.pages.cv.models.partials.img-profile", $cv)
                    </div>

                    <div class="description">
                        @if (!empty($cv['nome']) || !empty($cv['documento']) || !empty($cv['endereco']) || !empty($cv['data_nascimento']) || !empty($cv['telefone']))
                            <h2>{{ $cv['nome'] }}</h2>
                            <ul>
                                <li>NIF: {{ $cv['documento'] }}</li>
                                <li>{{ $cv['endereco'] }}</li>
                                <li>{{ $cv['genero'] ?? '' }}</li>
                                <li>{{ \Carbon\Carbon::parse($cv['data_nascimento'])->format('d/m/Y') }}</li>
                                <li>{{ $cv['telefone'] }}</li>
                            </ul>
                        @endif
                    </div>
                </div>

                {{-- Lado Direito --}}
                <div class="section-15-right">
                    <div class="section-15-items">

                        {{-- Habilidades Profissionais --}}
                        @if (!empty($cv['habilidades']))
                            <div class="section-15-item">
                                <h2>Habilitações Profissionais</h2>
                                <ul>
                                    @foreach ($cv['habilidades'] as $habilidade)
                                        <li>{{ $habilidade }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Formação Acadêmica --}}
                        <div class="section-15-item">
                            <h2>Formação</h2>
                            <ul>
                                <li><strong>Classe:</strong> {{ $cv['classe'] }}</li>
                                <li><strong>Curso:</strong> {{ $cv['curso'] }}</li>
                                <li><strong>Instituição:</strong> {{ $cv['instituicao'] }}</li>
                                <li><strong>Período:</strong> {{ $cv['inicio_formacao'] }} - {{ $cv['fim_formacao'] }}</li>
                            </ul>
                        </div>

                        {{-- Experiências Profissionais --}}
                        @if (!empty($cv['experiencias']))
                            <div class="section-15-item">
                                <h2>Experiências Profissionais</h2>
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

                        {{-- Idiomas --}}
                        @if (!empty($cv['idiomas']))
                            <div class="section-15-item">
                                <h2>Línguas Faladas</h2>
                                <ul>
                                    @foreach ($cv['idiomas'] as $idioma)
                                        <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        {{-- Perfil Profissional --}}
                        @if (!empty($cv['perfil_profissional']))
                            <div class="section-15-item">
                                <h2>Perfil Profissional</h2>
                                <p>{{ $cv['perfil_profissional'] }}</p>
                            </div>
                        @endif

                        {{-- Contato --}}
                        @if (!empty($cv['email']) || !empty($cv['telefone']))
                            <div class="section-15-item">
                                <h2>Contato</h2>
                                <ul>
                                    <li><strong>Email:</strong> {{ $cv['email'] }}</li>
                                    <li><strong>Telefone:</strong> {{ $cv['telefone'] }}</li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
