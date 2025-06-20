<section>
   <div class="design-06">
        <div class="design-06-content">
           
            {{-- Cabeçalho --}}
           <div class="design-06-header">
                <div class="header-06-left" style="text-align: right;">
                    @if(!empty($cv['nome']) || !empty($cv['endereco']) || !empty($cv['documento']) || !empty($cv['telefone']))
                        <h3>{{ $cv['nome'] }}</h3>
                        <ul type="none">
                            <li>{{ $cv['endereco'] }}</li>
                            <li>NIF: {{ $cv['documento'] }}</li>
                            <li>E-mail: {{ $cv['telefone'] }}</li>
                        </ul>
                    @endif
                </div>
                <div class="header-06-right">
                   <div class="img-06">
                        @include("admin.pages.cv.models.partials.img-profile", $cv)
                   </div>
                </div>
           </div>

           {{-- Conteúdo --}}
           <div class="section-06">

                {{-- Escolaridade --}}
                <div class="section-06-item">
                    <h1>ESCOLARIDADE</h1>
                    @if(!empty($cv['classe']) || !empty($cv['curso']) || !empty($cv['instituicao']))
                        <ul type="none" style="text-align: center;">
                            <li>
                                Frequentando a <span style="font-weight:lighter;font-family:'DejaVu Sans'; font-size:14px">{{ $cv['classe'] }}</span> no {{ $cv['instituicao'] }}
                            </li>
                            <li>
                                Curso em Formação: {{ $cv['curso'] }}
                            </li>
                        </ul>
                    @endif
                </div>

                {{-- Habilitações Profissionais --}}
                @if (!empty($cv["habilidades"]))
                    <div class="section-06-item">
                        <h1>HABILITAÇÕES PROFISSIONAIS</h1>
                        <ul type="circle">
                            @foreach ($cv["habilidades"] as $hab)
                                <li>{{ $hab }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Experiências Profissionais --}}
                @if (!empty($cv["experiencias"]))
                    <div class="section-06-item">
                        <h1>EXPERIÊNCIAS PROFISSIONAIS</h1>
                        <ul type="none" style="text-align: right;">
                            @foreach ($cv["experiencias"] as $exp)
                                <li>
                                    <strong>{{ $exp['empresa'] }}</strong> - {{ $exp['cargo'] }} ({{ $exp['inicio'] }} - {{ $exp['fim'] }})<br>
                                    <em>{{ $exp['descricao'] }}</em>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Perfil Profissional --}}
                @if (!empty($cv["perfil_profissional"]))
                    <div class="section-06-item">
                        <h1>PERFIL PROFISSIONAL</h1>
                        <ul type="circle">
                            <li>{{ $cv["perfil_profissional"] }}</li>
                        </ul>
                    </div>
                @endif

                {{-- Idiomas Falados --}}
                @if (!empty($cv["idiomas"]))
                    <div class="section-06-item">
                        <h1>IDIOMAS FALADOS</h1>
                        <ul type="none" style="text-align: right;">
                            @foreach ($cv["idiomas"] as $idioma)
                                <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Descrição do Objectivo --}}
                @if (!empty($cv["objectivo"]))
                    <div class="section-06-item">
                        <h1>DESCRIÇÃO DO OBJECTIVO</h1>
                        <p style="text-align: justify; text-indent: 15px;">{{ $cv["objectivo"] }}</p>
                    </div>
                @endif

           </div>

        </div>
   </div>
</section>
