<section>
    <div class="design-08">
        <div class="design-08-content">

            {{-- Header com dados pessoais --}}
            <div class="section-08-header">
                @php
                    $curriculo = session('curriculo');
                @endphp

                @if(!empty($curriculo['documento']) || !empty($curriculo['endereco']) || !empty($curriculo['telefone']))
                    <ul type="none">
                        <li>{{ $curriculo['endereco'] ?? '' }}</li>
                        <li>{{ $curriculo['telefone'] ?? '' }}</li>
                        <li>BI: {{ $curriculo['documento'] ?? '' }}</li>
                    </ul>
                @endif
            </div>

            {{-- Foto e nome --}}
            <div class="section-08-perfil">
                <div class="perfil-img">
                    @include("admin.pages.cv.models.partials.img-profile")
                </div>

                @if(!empty($curriculo['nome']))
                    <div class="nome">
                        <h2>{{ $curriculo['nome'] }}</h2>
                    </div>
                @endif
            </div>

            {{-- Conteúdo principal --}}
            <div class="section-08-items">
                <div class="section-08-left">
                    {{-- Formação Acadêmica --}}
                    @if(!empty($curriculo['classe']) || !empty($curriculo['curso']) || !empty($curriculo['instituicao']))
                        <div class="section-08-item">
                            <h2>Academic Formation</h2>
                            <ul type="none">
                                <li>{{ $curriculo['classe'] ?? '' }}</li>
                                <li>{{ $curriculo['curso'] ?? '' }}</li>
                                <li>{{ $curriculo['instituicao'] ?? '' }}</li>
                                <li>{{ $curriculo['inicio_formacao'] ?? '' }} - {{ $curriculo['fim_formacao'] ?? '' }}</li>
                            </ul>
                        </div>
                    @endif

                    {{-- Habilidades Profissionais --}}
                    @if(!empty($curriculo['habilidades']))
                        <div class="section-08-item">
                            <h2>Professional Skills</h2>
                            <ul type="none">
                                @foreach($curriculo['habilidades'] as $habilidade)
                                    <li>{{ $habilidade }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Experiências Profissionais --}}
                    @if(!empty($curriculo['experiencias']))
                        <div class="section-08-item">
                            <h2>Professional Experience</h2>
                            <ul type="none">
                                @foreach($curriculo['experiencias'] as $exp)
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
                    @if(!empty($curriculo['perfil_profissional']))
                        <div class="section-08-item">
                            <h2>Profile</h2>
                            <p>{{ $curriculo['perfil_profissional'] }}</p>
                        </div>
                    @endif

                    {{-- Idiomas --}}
                    @if(!empty($curriculo['idiomas']))
                        <div class="section-08-item">
                            <h2>Languages</h2>
                            <ul type="none">
                                @foreach($curriculo['idiomas'] as $idioma)
                                    <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Contactos --}}
                    @if(!empty($curriculo['telefone']))
                        <div class="section-08-item">
                            <h2>Contacts</h2>
                            <ul type="none">
                                @foreach(explode('|', $curriculo['telefone']) as $numero)
                                    <li>{{ trim($numero) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Objetivo / Descrição --}}
            @if(!empty($curriculo['perfil_profissional']))
                <div class="section-08-item-obj">
                    <h2>Description</h2>
                    <p>{{ $curriculo['perfil_profissional'] }}</p>
                </div>
            @endif

        </div>
    </div>
</section>
