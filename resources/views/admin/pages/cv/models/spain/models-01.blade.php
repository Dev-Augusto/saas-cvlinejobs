<section>
    <div class="design-11">
        <div class="design-11-content">
            <div class="section-11-items">
                {{-- Lado Esquerdo --}}
                <div class="section-11-left">
                    {{-- Perfil Profissional --}}
                    @if (!empty(session('curriculo')['perfil_profissional']))
                        <div class="section-11-item">
                            <h2>Perfil</h2>
                            <p>{{ session('curriculo')['perfil_profissional'] }}</p>
                        </div>
                    @endif

                    {{-- Idiomas --}}
                    @if (!empty(session('curriculo')['idiomas']))
                        <div class="section-11-item">
                            <h2>Idiomas</h2>
                            <ul>
                                @foreach (session('curriculo')['idiomas'] as $idioma)
                                    <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                {{-- Lado Direito --}}
                <div class="section-11-right">
                    {{-- Dados Pessoais --}}
                    <div class="section-11-description">
                        <div class="section-11-name">
                            <h2>{{ session('curriculo')['nome'] }}</h2>
                            <ul>
                                <li>Data de Nascimento: {{ \Carbon\Carbon::parse(session('curriculo')['data_nascimento'])->format('d/m/Y') }}</li>
                                <li>Gênero: {{ ucfirst(session('curriculo')['genero']) }}</li>
                                <li>Email: {{ session('curriculo')['email'] }}</li>
                                <li>Telefone: {{ session('curriculo')['telefone'] }}</li>
                                <li>Endereço: {{ session('curriculo')['endereco'] }}</li>
                                <li>Documento: {{ session('curriculo')['documento'] }}</li>
                            </ul>
                        </div>

                        <div class="section-11-img">
                            @include('admin.pages.cv.models.partials.img-profile')
                        </div>
                    </div>

                    {{-- Formação Acadêmica --}}
                    <div class="section-11-item">
                        <h2>Formação Acadêmica</h2>
                        <ul>
                            <li>{{ session('curriculo')['curso'] }}</li>
                            <li>{{ session('curriculo')['instituicao'] }}</li>
                            <li>{{ session('curriculo')['inicio_formacao'] }} - {{ session('curriculo')['fim_formacao'] }}</li>
                            <li>{{ session('curriculo')['classe'] }}</li>
                        </ul>
                    </div>

                    {{-- Habilidades --}}
                    @if (!empty(session('curriculo')['habilidades']))
                        <div class="section-11-item">
                            <h2>Habilidades</h2>
                            <ul>
                                @foreach (session('curriculo')['habilidades'] as $habilidade)
                                    <li>{{ $habilidade }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Experiência Profissional --}}
                    @if (!empty(session('curriculo')['experiencias']))
                        <div class="section-11-item">
                            <h2>Experiência Profissional</h2>
                            <ul>
                                @foreach (session('curriculo')['experiencias'] as $exp)
                                    <li>
                                        <strong>{{ $exp['cargo'] }}</strong> na <strong>{{ $exp['empresa'] }}</strong><br>
                                        <small>{{ $exp['inicio'] }} - {{ $exp['fim'] }}</small><br>
                                        <p>{{ $exp['descricao'] }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Objetivo Profissional --}}
                    @if (!empty(session('curriculo')['perfil_profissional']))
                        <div class="section-11-item">
                            <h2>Objetivo</h2>
                            <p>{{ session('curriculo')['perfil_profissional'] }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
