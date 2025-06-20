<section>
   <div class="design-13">
        <div class="design-13-content">

          {{-- Cabeçalho com nome e contactos --}}
          @if(!empty($cv['nome']) || !empty($cv['documento']) || !empty($cv['telefone']) || !empty($cv['endereco']))
          <div class="section-13-name">
              <h2>{{ $cv['nome'] }}</h2>
              <ul>
                  <li>NIF: {{ $cv['documento'] }}</li>
                  <li>{{ $cv['telefone'] }}</li>
                  <li>{{ $cv['endereco'] }}</li>
              </ul>
          </div>
          @endif

          {{-- Corpo do CV --}}
          <div class="section-13-items">

              {{-- Objectivo --}}
              @if(!empty($cv['objectivo']))
              <div class="section-13-item">
                <h2>Descrição do Objectivo</h2>
                <p>{{ $cv['objectivo'] }}</p>
              </div>
              @endif

              {{-- Académico --}}
              @if(!empty($cv['classe']) || !empty($cv['curso']) || !empty($cv['instituicao']))
              <div class="section-13-item">
                <h2>Académico</h2>
                <p>
                    {{ $cv['classe'] }} no(a) {{ $cv['instituicao'] }}<br>
                    {{ $cv['curso'] }}
                </p>
              </div>
              @endif

              {{-- Habilitações --}}
              @if (!empty($cv['habilidades']))
              <div class="section-13-item">
                 <h2>Habilitações</h2>
                 <ul>
                    @foreach ($cv['habilidades'] as $hab)
                        <li>{{ $hab }}</li>
                    @endforeach
                 </ul>
              </div>
              @endif

              {{-- Experiências --}}
              @if (!empty($cv['experiencias']))
              <div class="section-13-item">
                 <h2>Experiências</h2>
                 <ul>
                    @foreach ($cv['experiencias'] as $exp)
                        <li>
                            <strong>{{ $exp['empresa'] }}</strong> - {{ $exp['cargo'] }}
                            ({{ $exp['inicio'] }} - {{ $exp['fim'] }})<br>
                            <em>{{ $exp['descricao'] }}</em>
                        </li>
                    @endforeach
                 </ul>
              </div>
              @endif

              {{-- Idioma --}}
              @if (!empty($cv['idiomas']))
              <div class="section-13-item">
                  <h2>Idioma</h2>
                  <p>Tenho como língua(s) falada(s)</p><br>
                  <ul>
                      @foreach ($cv['idiomas'] as $idioma)
                          <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif

              {{-- Perfil --}}
              @if (!empty($cv['perfil_profissional']))
              <div class="section-13-item">
                 <h2>Perfil</h2>
                 <ul>
                    <li>{{ $cv['perfil_profissional'] }}</li>
                 </ul>
              </div>
              @endif

          </div>
        </div>
   </div>
</section>
