@php
    $cv = session('curriculo');
@endphp

<section>
    <div class="design-18">
        <div class="design-18-content">
            
            {{-- Cabeçalho --}}
            <div class="section-18-header">
                <h2>Curriculum Vitae</h2>
            </div>   

            {{-- Nome e Foto --}}
            <div class="section-18-description">
                <h2>{{ $cv['nome'] ?? 'Nome não informado' }}</h2>
                @include("admin.pages.cv.models.partials.img-profile")
            </div>

            {{-- Informações Pessoais --}}
            <div class="section-18-table">
                <table border="1">
                    <tr>
                        <td>
                            <ul>
                                @if(!empty($cv['telefone']))
                                    <li><span>Tel: </span>{{ $cv['telefone'] }}</li>
                                @endif
                                @if(!empty($cv['endereco']))
                                    <li>{{ $cv['endereco'] }}</li>
                                @endif
                                @if(!empty($cv['documento']))
                                    <li><span>NIF:</span> {{ $cv['documento'] }}</li>
                                @endif
                            </ul>
                        </td>
                        <td>
                            {{-- Características (se existirem) --}}
                            @isset($cv['caracteristicas'])
                                <ul>
                                    @foreach($cv['caracteristicas'] as $caracteristica)
                                        @if(!empty($caracteristica))
                                            <li>{{ $caracteristica }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endisset
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            @if(!empty($cv['perfil_profissional']))
                                <p>{{ $cv['perfil_profissional'] }}</p>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>

            {{-- Secções adicionais --}}
            <div class="section-18-items">

                {{-- Perfil Profissional --}}
                <div class="section-18-item">
                    <h2>Perfil Profissional</h2>
                    @if(!empty($cv['perfil_profissional']))
                        <p>{{ $cv['perfil_profissional'] }}</p>
                    @endif
                </div>

                {{-- Formação Acadêmica --}}
                <div class="section-18-item">
                    <h2>Formação</h2>
                    @if(!empty($cv['curso']) || !empty($cv['instituicao']))
                        <ul>
                            <li>
                                <span style="font-weight: lighter; font-family: 'DejaVu Sans'; font-size: 14px">
                                    {{ $cv['classe'] ?? '' }} / {{ $cv['curso'] ?? '' }}
                                </span>, na {{ $cv['instituicao'] ?? '' }} 
                                ({{ $cv['inicio_formacao'] ?? '?' }} - {{ $cv['fim_formacao'] ?? '?' }})
                            </li>
                        </ul>
                    @endif
                </div>

                {{-- Idiomas --}}
                <div class="section-18-item">
                    <h2>Idiomas</h2>
                    @if(!empty($cv['idiomas']))
                        <ul>
                            @foreach($cv['idiomas'] as $idioma)
                                <li>{{ $idioma['nome'] }} — {{ ucfirst($idioma['nivel']) }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                {{-- Experiência Profissional --}}
                <div class="section-18-item">
                    <h2>Experiência Profissional</h2>
                    @if(!empty($cv['experiencias']))
                        <ul>
                            @foreach($cv['experiencias'] as $exp)
                                <li>
                                    <strong>{{ $exp['cargo'] ?? '' }}</strong> na <strong>{{ $exp['empresa'] ?? '' }}</strong>
                                    ({{ $exp['inicio'] ?? '?' }} - {{ $exp['fim'] ?? '?' }})<br>
                                    <small>{{ $exp['descricao'] ?? '' }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                {{-- Habilidades --}}
                <div class="section-18-item">
                    <h2>Habilidades</h2>
                    @if(!empty($cv['habilidades']))
                        <ul>
                            @foreach($cv['habilidades'] as $habilidade)
                                <li>{{ $habilidade }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

            </div>

        </div>
    </div>
</section>
