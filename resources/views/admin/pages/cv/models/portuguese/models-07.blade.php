<section>
    <div class="design-17">
        <div class="design-17-content">

            {{-- Cabeçalho --}}
            <div class="section-17-header">
                <h2>Curriculum Vitae</h2>
            </div>

            <div class="section-17-items">

                {{-- Dados Pessoais --}}
                <div class="section-17-item">
                    <h2>Dados Pessoais</h2>
                    <div class="descriptions">
                        @include("admin.pages.cv.models.partials.img-profile", $cv)
                        <ul>
                            <li><span>Nome:</span> {{ $cv['nome'] }}</li>
                            <li><span>Gênero:</span> {{ ucfirst($cv['genero']) }}</li>
                            <li><span>Data de Nascimento:</span> {{ \Carbon\Carbon::parse($cv['data_nascimento'])->format('d/m/Y') }}</li>
                            <li><span>Documento:</span> {{ $cv['documento'] }}</li>
                            <li><span>Email:</span> {{ $cv['email'] }}</li>
                            <li><span>Endereço:</span> {{ $cv['endereco'] }}</li>
                            <li><span>Telefone:</span> {{ $cv['telefone'] }}</li>
                        </ul>
                    </div>
                </div>

                {{-- Perfil Profissional --}}
                @if($cv['perfil_profissional'])
                <div class="section-17-item">
                    <h2>Perfil Profissional</h2>
                    <p>{{ $cv['perfil_profissional'] }}</p>
                </div>
                @endif

                {{-- Formação Acadêmica --}}
                @if($cv['curso'])
                <div class="section-17-item">
                    <h2>Formação Acadêmica</h2>
                    <ul>
                        <li>
                            {{ $cv['classe'] }} - {{ $cv['curso'] }},
                            {{ $cv['instituicao'] }} ({{ $cv['inicio_formacao'] }} - {{ $cv['fim_formacao'] }})
                        </li>
                    </ul>
                </div>
                @endif

                {{-- Experiência Profissional --}}
                @if(!empty($cv['experiencias']))
                <div class="section-17-item">
                    <h2>Experiência Profissional</h2>
                    <ul class="text-justify">
                        @foreach($cv['experiencias'] as $exp)
                            <li>
                                <strong>{{ $exp['cargo'] }}</strong> na <strong>{{ $exp['empresa'] }}</strong> 
                                ({{ $exp['inicio'] }} - {{ $exp['fim'] }})<br>
                                {{ $exp['descricao'] }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Habilidades Profissionais --}}
                @if(!empty($cv['habilidades']))
                <div class="section-17-item">
                    <h2>Habilidades Profissionais</h2>
                    <ul>
                        @foreach($cv['habilidades'] as $habilidade)
                            <li>{{ $habilidade }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Idiomas --}}
                @if(!empty($cv['idiomas']))
                <div class="section-17-item">
                    <h2>Idiomas</h2>
                    <ul>
                        @foreach($cv['idiomas'] as $idioma)
                            <li>{{ $idioma['nome'] }} — {{ ucfirst($idioma['nivel']) }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>

