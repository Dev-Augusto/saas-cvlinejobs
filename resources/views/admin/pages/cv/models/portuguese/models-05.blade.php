<section>
    <div class="design-02">
        <div class="design-02-content">
            {{-- Nome --}}
            @if (!empty(session('curriculo.nome')))
                <div class="title-02">
                    <h2>{{ session('curriculo.nome') }}</h2>
                </div>
            @endif

            {{-- Informações Pessoais --}}
            <div class="item-02">
                <ul style="list-style: none; padding: 0;">
                    @php
                        $dataNascimento = session('curriculo.data_nascimento') ? date('d/m/Y', strtotime(session('curriculo.data_nascimento'))) : null;
                    @endphp
                    <li>
                        {{ session('curriculo.genero') }}, {{ $dataNascimento }}
                    </li>
                    <li>
                        <span>Documento: </span>{{ session('curriculo.documento') }}
                    </li>
                    <li>
                        <span>Email: </span>{{ session('curriculo.email') }}
                    </li>
                    <li>
                        <span>Telefone: </span>{{ session('curriculo.telefone') }}
                    </li>
                    <li>
                        <span>Endereço: </span>{{ session('curriculo.endereco') }}
                    </li>
                </ul>
            </div>

            {{-- Perfil Profissional --}}
            @if (!empty(session('curriculo.perfil_profissional')))
                <div class="item-02">
                    <h2>Perfil Profissional</h2>
                    <ul>
                        <li class="text-justify">{{ session('curriculo.perfil_profissional') }}</li>
                    </ul>
                </div>
            @endif

            {{-- Formação Acadêmica --}}
            <div class="item-02">
                <h2>Formação Acadêmica</h2>
                <ul>
                    <li>{{ session('curriculo.classe') }} - {{ session('curriculo.curso') }}</li>
                    <li>{{ session('curriculo.instituicao') }}</li>
                    <li>{{ session('curriculo.inicio_formacao') }} - {{ session('curriculo.fim_formacao') }}</li>
                </ul>
            </div>

            {{-- Experiência Profissional --}}
            @if (!empty(session('curriculo.experiencias')))
                <div class="item-02">
                    <h2>Experiência Profissional</h2>
                    <ul>
                        @foreach (session('curriculo.experiencias') as $exp)
                            <li>
                                <strong>{{ $exp['empresa'] }}</strong> - {{ $exp['cargo'] }} ({{ $exp['inicio'] }} - {{ $exp['fim'] }})<br>
                                <em>{{ $exp['descricao'] }}</em>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Habilidades --}}
            @if (!empty(session('curriculo.habilidades')))
                <div class="item-02">
                    <h2>Habilidades</h2>
                    <ul>
                        @foreach (session('curriculo.habilidades') as $habilidade)
                            <li>{{ $habilidade }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Idiomas --}}
            @if (!empty(session('curriculo.idiomas')))
                <div class="item-02">
                    <h2>Idiomas</h2>
                    <ul>
                        @foreach (session('curriculo.idiomas') as $idioma)
                            <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <p><span>OBS: </span>Uma vez contratado na vossa empresa com humildade espero contribuir para a evolução da mesma.</p>
        </div>
    </div>
</section>
