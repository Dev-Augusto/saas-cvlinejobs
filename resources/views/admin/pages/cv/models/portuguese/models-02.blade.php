@php
    $cv = session('curriculo');
@endphp
<section>
    <div class="design-10">
        <div class="design-10-content">
            {{-- Cabeçalho --}}
            <div class="section-10-header">
                <div class="section-10-description">
                    @if (!empty($cv['nome']) || !empty($cv['documento']))
                        <h4 style="color:#ccc">{{ $cv['nome'] }}</h4>
                        <p>NIF: {{ $cv['documento'] }}</p>
                    @endif
                </div>
                <div class="section-10-image">
                    @include("admin.pages.cv.models.partials.img-profile")
                </div>
            </div>

            {{-- Conteúdo principal --}}
            <div class="section-10-items">
                {{-- Lado Esquerdo --}}
                <div class="section-10-left">
                    {{-- Identidade --}}
                    <div class="section-10-item">
                        <h2>Identidade</h2>
                        <ul>
                            <li>Nascido em {{ \Carbon\Carbon::parse($cv['data_nascimento'])->format('d/m/Y') }}</li>
                            <li>Gênero: {{ ucfirst($cv['genero']) }}</li>
                            <li>Endereço: {{ $cv['endereco'] }}</li>
                        </ul>
                    </div>

                    {{-- Habilidades --}}
                    <div class="section-10-item">
                        <h2>Habilidades</h2>
                        <ul>
                            @foreach ($cv['habilidades'] as $habilidade)
                                <li>{{ $habilidade }}</li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Experiência Profissional --}}
                    <div class="section-10-item">
                        <h2>Experiência Profissional</h2>
                        <ul>
                            @foreach ($cv['experiencias'] as $exp)
                                <li>
                                    <strong>{{ $exp['cargo'] }}</strong> na <strong>{{ $exp['empresa'] }}</strong><br>
                                    {{ $exp['inicio'] }} - {{ $exp['fim'] }}<br>
                                    <span>{{ $exp['descricao'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Perfil Profissional --}}
                    @if (!empty($cv['perfil_profissional']))
                        <div class="section-10-item">
                            <h2>Perfil Profissional</h2>
                            <p>{{ $cv['perfil_profissional'] }}</p>
                        </div>
                    @endif
                </div>

                {{-- Lado Direito --}}
                <div class="section-10-right">
                    {{-- Idiomas --}}
                    <div class="section-10-item">
                        <h2>Idiomas</h2>
                        <ul>
                            @foreach ($cv['idiomas'] as $idioma)
                                <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Formação Acadêmica --}}
                    <div class="section-10-item">
                        <h2>Formação Acadêmica</h2>
                        <p>{{ $cv['classe'] }} em {{ $cv['curso'] }} na {{ $cv['instituicao'] }} ({{ $cv['inicio_formacao'] }} - {{ $cv['fim_formacao'] }})</p>
                    </div>
                </div>
            </div>

            {{-- Rodapé com Contatos --}}
            <div class="section-10-footer">
                <ul>
                    @foreach (explode('|', $cv['telefone']) as $telefone)
                        <li>{{ trim($telefone) }}</li>
                    @endforeach
                    <li>{{ $cv['email'] }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
