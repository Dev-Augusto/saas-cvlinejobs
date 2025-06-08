@php
    $cv = session('curriculo');
@endphp

<section>
    <div class="design-19">
        <div class="design-19-content">
            <div class="section-19-header">
                <h4>Curriculum Vitae</h4>
            </div>

            <div class="section-19-items">

                {{-- Dados Pessoais --}}
                <div class="section-19-item">
                    <h2>Personal Data</h2>
                    <ul class="person-19">
                        @if(!empty($cv['nome'])) <li><span>Name:</span> {{ $cv['nome'] }}</li> @endif
                        @if(!empty($cv['telefone'])) <li><span>Telephone:</span> {{ $cv['telefone'] }}</li> @endif
                        @if(!empty($cv['email'])) <li><span>Email:</span> {{ $cv['email'] }}</li> @endif
                        @if(!empty($cv['documento'])) <li><span>Nº Passaport:</span> {{ $cv['documento'] }}</li> @endif
                        @if(!empty($cv['data_nascimento'])) <li><span>Was Born:</span> {{ date('d/m/Y', strtotime($cv['data_nascimento'])) }}</li> @endif
                        @if(!empty($cv['genero'])) <li><span>Gender:</span> {{ ucfirst($cv['genero']) }}</li> @endif
                        @if(!empty($cv['endereco'])) <li><span>Address:</span> {{ $cv['endereco'] }}</li> @endif
                    </ul>
                </div>

                {{-- Formação Acadêmica --}}
                <div class="section-19-item">
                    <h2>Academic Field</h2>
                    <ul>
                        @if(!empty($cv['curso'])) <li><strong>Course:</strong> {{ $cv['curso'] }}</li> @endif
                        @if(!empty($cv['classe'])) <li><strong>Grade:</strong> {{ $cv['classe'] }}</li> @endif
                        @if(!empty($cv['instituicao'])) <li><strong>Institute:</strong> {{ $cv['instituicao'] }}</li> @endif
                        @if(!empty($cv['inicio_formacao']) && !empty($cv['fim_formacao']))
                            <li><strong>Time:</strong> {{ $cv['inicio_formacao'] }} - {{ $cv['fim_formacao'] }}</li>
                        @endif
                    </ul>
                </div>

                {{-- Experiência Profissional --}}
                <div class="section-19-item">
                    <h2>Professional Experience</h2>
                    @if(!empty($cv['experiencias']) && is_array($cv['experiencias']))
                        <ul>
                            @foreach ($cv['experiencias'] as $exp)
                                <li>
                                    <strong>{{ $exp['cargo'] }}</strong> on company {{ $exp['empresa'] }} ({{ $exp['inicio'] }} - {{ $exp['fim'] }})<br>
                                    <em>{{ $exp['descricao'] }}</em>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                {{-- Habilidades e Certificados --}}
                <div class="section-19-item">
                    <h2>Professional Skills</h2>
                    @if(!empty($cv['habilidades']) && is_array($cv['habilidades']))
                        <ul>
                            @foreach ($cv['habilidades'] as $habilidade)
                                <li>{{ $habilidade }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                {{-- Idiomas --}}
                <div class="section-19-item">
                    <h2>languages</h2>
                    @if(!empty($cv['idiomas']) && is_array($cv['idiomas']))
                        <ul>
                            @foreach ($cv['idiomas'] as $idioma)
                                <li>{{ $idioma['nome'] }} - level: {{ ucfirst($idioma['nivel']) }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                {{-- Perfil Profissional --}}
                <div class="section-19-item">
                    <h2>Profile</h2>
                    @if(!empty($cv['perfil_profissional']))
                        <p>{{ $cv['perfil_profissional'] }}</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</section>
