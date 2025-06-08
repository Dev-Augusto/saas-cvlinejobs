<section>
    <div class="design-15">
        <div class="design-15-content">
            <div class="section-15-lados">
                {{-- Lado Esquerdo --}}
                <div class="section-15-left">
                    <div class="img-perfil">
                         @include("admin.pages.cv.models.partials.img-profile")
                    </div>

                    <div class="description">
                        @php
                            $dados = session('curriculo');
                        @endphp

                        @if (!empty($dados['nome']) || !empty($dados['documento']) || !empty($dados['endereco']) || !empty($dados['data_nascimento']) || !empty($dados['telefone']))
                            <h2>{{ $dados['nome'] }}</h2>
                            <ul>
                                <li>NIF: {{ $dados['documento'] }}</li>
                                <li>{{ $dados['endereco'] }}</li>
                                <li>{{ $dados['genero'] ?? '' }}</li>
                                <li>{{ \Carbon\Carbon::parse($dados['data_nascimento'])->format('d/m/Y') }}</li>
                                <li>{{ $dados['telefone'] }}</li>
                            </ul>
                        @endif
                    </div>
                </div>

                {{-- Lado Direito --}}
                <div class="section-15-right">
                    <div class="section-15-items">

                        {{-- Habilidades Profissionais --}}
                        @if (!empty($dados['habilidades']))
                            <div class="section-15-item">
                                <h2>Habilitações Profissionais</h2>
                                <ul>
                                    @foreach ($dados['habilidades'] as $habilidade)
                                        <li>{{ $habilidade }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Formação Acadêmica --}}
                        <div class="section-15-item">
                            <h2>Formação</h2>
                            <ul>
                                <li><strong>Classe:</strong> {{ $dados['classe'] }}</li>
                                <li><strong>Curso:</strong> {{ $dados['curso'] }}</li>
                                <li><strong>Instituição:</strong> {{ $dados['instituicao'] }}</li>
                                <li><strong>Período:</strong> {{ $dados['inicio_formacao'] }} - {{ $dados['fim_formacao'] }}</li>
                            </ul>
                        </div>

                        {{-- Experiências Profissionais --}}
                        @if (!empty($dados['experiencias']))
                            <div class="section-15-item">
                                <h2>Experiências Profissionais</h2>
                                <ul>
                                    @foreach ($dados['experiencias'] as $exp)
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
                        @if (!empty($dados['idiomas']))
                            <div class="section-15-item">
                                <h2>Línguas Faladas</h2>
                                <ul>
                                    @foreach ($dados['idiomas'] as $idioma)
                                        <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        {{-- Perfil Profissional --}}
                        @if (!empty($dados['perfil_profissional']))
                            <div class="section-15-item">
                                <h2>Perfil Profissional</h2>
                                <p>{{ $dados['perfil_profissional'] }}</p>
                            </div>
                        @endif

                        {{-- Contato --}}
                        @if (!empty($dados['email']) || !empty($dados['telefone']))
                            <div class="section-15-item">
                                <h2>Contato</h2>
                                <ul>
                                    <li><strong>Email:</strong> {{ $dados['email'] }}</li>
                                    <li><strong>Telefone:</strong> {{ $dados['telefone'] }}</li>
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
