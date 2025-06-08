<section>
    <div class="design-08">
        <div class="design-08-content">

            {{-- Header com dados pessoais --}}
            <div class="section-08-header">
                @if(!empty($cv['documento']) || !empty($cv['endereco']) || !empty($cv['telefone']))
                    <ul type="none">
                        <li>{{ $cv['endereco'] ?? '' }}</li>
                        <li>{{ $cv['telefone'] ?? '' }}</li>
                        <li>BI: {{ $cv['documento'] ?? '' }}</li>
                    </ul>
                @endif
            </div>

            {{-- Foto e nome --}}
            <div class="section-08-perfil">
                <div class="perfil-img">
                    @include("admin.pages.cv.models.partials.img-profile", $cv)
                </div>

                @if(!empty($cv['nome']))
                    <div class="nome">
                        <h2>{{ $cv['nome'] }}</h2>
                    </div>
                @endif
            </div>

            {{-- Conteúdo principal --}}
            <div class="section-08-items">
                <div class="section-08-left">
                    {{-- Formação Acadêmica --}}
                    @if(!empty($cv['classe']) || !empty($cv['curso']) || !empty($cv['instituicao']))
                        <div class="section-08-item">
                            <h2>Academic Formation</h2>
                            <ul type="none">
                                <li>{{ $cv['classe'] ?? '' }}</li>
                                <li>{{ $cv['curso'] ?? '' }}</li>
                                <li>{{ $cv['instituicao'] ?? '' }}</li>
                                <li>{{ $cv['inicio_formacao'] ?? '' }} - {{ $cv['fim_formacao'] ?? '' }}</li>
                            </ul>
                        </div>
                    @endif

                    {{-- Habilidades Profissionais --}}
                    @if(!empty($cv['habilidades']))
                        <div class="section-08-item">
                            <h2>Professional Skills</h2>
                            <ul type="none">
                                @foreach($cv['habilidades'] as $habilidade)
                                    <li>{{ $habilidade }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Experiências Profissionais --}}
                    @if(!empty($cv['experiencias']))
                        <div class="section-08-item">
                            <h2>Professional Experience</h2>
                            <ul type="none">
                                @foreach($cv['experiencias'] as $exp)
                                    <li>
                                        <strong>{{ $exp['cargo'] ?? '' }}</strong> em {{ $exp['empresa'] ?? '' }} ({{ $exp['inicio'] ?? '' }} - {{ $exp['fim'] ?? '' }})<br>
                                        <span>{{ $exp['descricao'] ?? '' }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="section-08-right">
                    {{-- Perfil Profissional --}}
                    @if(!empty($cv['perfil_profissional']))
                        <div class="section-08-item">
                            <h2>Profile</h2>
                            <p>{{ $cv['perfil_profissional'] }}</p>
                        </div>
                    @endif

                    {{-- Idiomas --}}
                    @if(!empty($cv['idiomas']))
                        <div class="section-08-item">
                            <h2>Languages</h2>
                            <ul type="none">
                                @foreach($cv['idiomas'] as $idioma)
                                    <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Contactos --}}
                    @if(!empty($cv['telefone']))
                        <div class="section-08-item">
                            <h2>Contacts</h2>
                            <ul type="none">
                                @foreach(explode('|', $cv['telefone']) as $numero)
                                    <li>{{ trim($numero) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Objetivo / Descrição --}}
            @if(!empty($cv['perfil_profissional']))
                <div class="section-08-item-obj">
                    <h2>Description</h2>
                    <p>{{ $cv['perfil_profissional'] }}</p>
                </div>
            @endif

        </div>
    </div>
</section>
