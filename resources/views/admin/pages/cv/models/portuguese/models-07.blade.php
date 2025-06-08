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
                        @include("admin.pages.cv.models.partials.img-profile")
                        <ul>
                            <li><span>Nome:</span> {{ session('curriculo.nome') }}</li>
                            <li><span>Gênero:</span> {{ ucfirst(session('curriculo.genero')) }}</li>
                            <li><span>Data de Nascimento:</span> {{ \Carbon\Carbon::parse(session('curriculo.data_nascimento'))->format('d/m/Y') }}</li>
                            <li><span>Documento:</span> {{ session('curriculo.documento') }}</li>
                            <li><span>Email:</span> {{ session('curriculo.email') }}</li>
                            <li><span>Endereço:</span> {{ session('curriculo.endereco') }}</li>
                            <li><span>Telefone:</span> {{ session('curriculo.telefone') }}</li>
                        </ul>
                    </div>
                </div>

                {{-- Perfil Profissional --}}
                @if(session('curriculo.perfil_profissional'))
                <div class="section-17-item">
                    <h2>Perfil Profissional</h2>
                    <p>{{ session('curriculo.perfil_profissional') }}</p>
                </div>
                @endif

                {{-- Formação Acadêmica --}}
                @if(session('curriculo.curso'))
                <div class="section-17-item">
                    <h2>Formação Acadêmica</h2>
                    <ul>
                        <li>
                            {{ session('curriculo.classe') }} - {{ session('curriculo.curso') }},
                            {{ session('curriculo.instituicao') }} ({{ session('curriculo.inicio_formacao') }} - {{ session('curriculo.fim_formacao') }})
                        </li>
                    </ul>
                </div>
                @endif

                {{-- Experiência Profissional --}}
                @if(!empty(session('curriculo.experiencias')))
                <div class="section-17-item">
                    <h2>Experiência Profissional</h2>
                    <ul class="text-justify">
                        @foreach(session('curriculo.experiencias') as $exp)
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
                @if(!empty(session('curriculo.habilidades')))
                <div class="section-17-item">
                    <h2>Habilidades Profissionais</h2>
                    <ul>
                        @foreach(session('curriculo.habilidades') as $habilidade)
                            <li>{{ $habilidade }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Idiomas --}}
                @if(!empty(session('curriculo.idiomas')))
                <div class="section-17-item">
                    <h2>Idiomas</h2>
                    <ul>
                        @foreach(session('curriculo.idiomas') as $idioma)
                            <li>{{ $idioma['nome'] }} — {{ ucfirst($idioma['nivel']) }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>
