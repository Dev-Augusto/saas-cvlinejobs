<section>
    <div class="design-03">
        <div class="design-03-content">

            {{-- Cabeçalho --}}
            <div class="header-03" style="margin-bottom: -30px">
                <div class="name">
                    <span>CV</span>
                </div>
                <div class="name-ex" style="color:black">
                    <span>Curriculum Vitae</span>
                </div>
            </div>

            {{-- Conteúdo principal --}}
            <div class="items-03">
                <div class="left-items">

                    {{-- Identificação --}}
                    <div class="item-03">
                        <h2>Identificação</h2>
                        <ul>
                            @if (!empty($cv['nome']))
                                <li>Nome: {{ $cv['nome'] }}</li>
                            @endif
                            @if (!empty($cv['pai']) || !empty($cv['mae']))
                                <li>Filiação: {{ $cv['pai'] }} e {{ $cv['mae'] }}</li>
                            @endif
                            @if (!empty($cv['data_nascimento']))
                                <li>Data de nascimento: {{ date('d/m/Y', strtotime($cv['data_nascimento'])) }}</li>
                            @endif
                            @if (!empty($cv['naturalidade']))
                                <li>Naturalidade: {{ $cv['naturalidade'] }}</li>
                            @endif
                            @if (!empty($cv['nacionalidade']))
                                <li>Nacionalidade: {{ $cv['nacionalidade'] }}</li>
                            @endif
                            @if (!empty($cv['estado_civil']))
                                <li>Estado civil: {{ $cv['estado_civil'] }}</li>
                            @endif
                            @if (!empty($cv['endereco']))
                                <li>Residência: {{ $cv['endereco'] }}</li>
                            @endif
                            @if (!empty($cv['documento']))
                                <li>Nº do BI: {{ $cv['documento'] }}</li>
                            @endif
                        </ul>
                    </div>

                    {{-- Formação Académica --}}
                    <div class="item-03">
                        <h2>Formação Académica</h2>
                        <ul>
                            <li>{{ $cv["classe"] }} - {{ $cv["curso"] }}</li>
                            <li>{{ $cv["instituicao"] }}</li>
                            <li>{{ $cv["inicio_formacao"] }} - {{ $cv["fim_formacao"] }}</li>
                        </ul>
                    </div>

                    {{-- Habilidades (Noções Profissionais) --}}
                    @if (!empty($cv["habilidades"]))
                        <div class="item-03">
                            <h2>Noções Profissionais</h2>
                            <ul>
                                @foreach ($cv["habilidades"] as $hab)
                                    <li>{{ $hab }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>

                <div class="right-items">

                    {{-- Perfil Profissional --}}
                    @if (!empty($cv["perfil_profissional"]))
                        <div class="item-03">
                            <h2>Perfil</h2>
                            <ul>
                                <li class="text-justify">{{ $cv["perfil_profissional"] }}</li>
                            </ul>
                        </div>
                    @endif

                    {{-- Contactos --}}
                    <div class="item-03">
                        <h2>Contactos</h2>
                        <ul>
                            @if (!empty($cv["telefone"]))
                                <li>Telefone: {{ $cv["telefone"] }}</li>
                            @endif
                            @if (!empty($cv["email"]))
                                <li>Email: {{ $cv["email"] }}</li>
                            @endif
                        </ul>
                    </div>

                    {{-- Idiomas --}}
                    @if (!empty($cv["idiomas"]))
                        <div class="item-03">
                            <h2>Idiomas</h2>
                            <ul>
                                @foreach ($cv["idiomas"] as $idioma)
                                    <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Experiência Profissional --}}
                    @if (!empty($cv["experiencias"]))
                        <div class="item-03">
                            <h2>Experiência Profissional</h2>
                            <ul>
                                @foreach ($cv["experiencias"] as $exp)
                                    <li>
                                        <strong>{{ $exp['empresa'] }}</strong> - {{ $exp['cargo'] }}
                                        ({{ $exp['inicio'] }} - {{ $exp['fim'] }})<br>
                                        <em>{{ $exp['descricao'] }}</em>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Objectivo --}}
                    @if (!empty($cv["objectivo_profissional"]))
                        <div class="item-03">
                            <h2>Objectivo</h2>
                            <ul>
                                <li class="text-justify">{{ $cv["objectivo_profissional"] }}</li>
                            </ul>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</section>
