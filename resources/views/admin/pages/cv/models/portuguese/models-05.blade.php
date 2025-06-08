<section>
    <div class="design-02">
        <div class="design-02-content">
            {{-- Nome --}}
            @if (!empty($cv['nome']))
                <div class="title-02">
                    <h2>{{ $cv['nome'] }}</h2>
                </div>
            @endif

            {{-- Informações Pessoais --}}
            <div class="item-02">
                <ul style="list-style: none; padding: 0;">
                    @php
                        $dataNascimento = $cv['data_nascimento'] ? date('d/m/Y', strtotime($cv['data_nascimento'])) : null;
                    @endphp
                    <li>
                        {{ $cv['genero'] }}, {{ $dataNascimento }}
                    </li>
                    <li>
                        <span>NIF: </span>{{ $cv['documento'] }}
                    </li>
                    <li>
                        <span>Email: </span>{{ $cv["email"] }}
                    </li>
                    <li>
                        <span>Telefone: </span>{{ $cv["telefone"] }}
                    </li>
                    <li>
                        <span>Endereço: </span>{{ $cv["endereco"] }}
                    </li>
                </ul>
            </div>

            {{-- Perfil Profissional --}}
            @if (!empty($cv["perfil_profissional"]))
                <div class="item-02">
                    <h2>Perfil Profissional</h2>
                    <ul>
                        <li class="text-justify">{{ $cv["perfil_profissional"] }}</li>
                    </ul>
                </div>
            @endif

            {{-- Formação Acadêmica --}}
            <div class="item-02">
                <h2>Formação Acadêmica</h2>
                <ul>
                    <li>{{ $cv["classe"] }} - {{ $cv["curso"] }}</li>
                    <li>{{ $cv["instituicao"] }}</li>
                    <li>{{ $cv["inicio_formacao"] }} - {{ $cv["fim_formacao"] }}</li>
                </ul>
            </div>

            {{-- Experiência Profissional --}}
            @if (!empty($cv["experiencias"]))
                <div class="item-02">
                    <h2>Experiência Profissional</h2>
                    <ul>
                        @foreach ($cv["experiencias"] as $exp)
                            <li>
                                <strong>{{ $exp['empresa'] }}</strong> - {{ $exp['cargo'] }} ({{ $exp['inicio'] }} - {{ $exp['fim'] }})<br>
                                <em>{{ $exp['descricao'] }}</em>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Habilidades --}}
            @if (!empty($cv["habilidades"]))
                <div class="item-02">
                    <h2>Habilidades</h2>
                    <ul>
                        @foreach ($cv["habilidades"] as $habilidade)
                            <li>{{ $habilidade }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Idiomas --}}
            @if (!empty($cv["idiomas"]))
                <div class="item-02">
                    <h2>Idiomas</h2>
                    <ul>
                        @foreach ($cv["idiomas"] as $idioma)
                            <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <p><span>OBS: </span>Uma vez contratado na vossa empresa com humildade espero contribuir para a evolução da mesma.</p>
        </div>
    </div>
</section>