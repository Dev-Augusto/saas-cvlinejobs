<section>
   <div class="design-12">
        <div class="design-12-content">
          
          {{-- Cabeçalho --}}
          <div class="section-12-header">
              @if(!empty($cv['nome']) || !empty($cv['endereco']) || !empty($cv['documento']) || !empty($cv['telefone']))
              <div class="description">
                  <h2>{{ $cv['nome'] }}</h2>
                  <p>NIF: {{ $cv['documento'] }}</p>
                  <p>{{ $cv['telefone'] }}</p>
                  <p>{{ $cv['endereco'] }}</p>
              </div>
              @endif
              
              <div class="perfil-img">
                    @include("admin.pages.cv.models.partials.img-profile", $cv)
              </div>
          </div>

          {{-- Conteúdo --}}
          <div class="section-12-items">

              {{-- Formação Académica --}}
              @if(!empty($cv['classe']) || !empty($cv['curso']) || !empty($cv['instituicao']))
              <div class="section-12-item">
                 <h2>Formação Académica</h2>
                 <ul>
                     <li>
                         <span style="font-weight:lighter;font-family:'DejaVu Sans'; font-size:14px">
                             {{ $cv['classe'] }}
                         </span>
                     </li>
                     <li>{{ $cv['curso'] }}</li>
                     <li>{{ $cv['instituicao'] }}</li>
                 </ul>
              </div>
              @endif

              {{-- Habilidades Profissionais --}}
              @if (!empty($cv['habilidades']))
              <div class="section-12-item">
                  <h2>Habilidades Profissionais</h2>
                  <ul>
                      @foreach ($cv['habilidades'] as $hab)
                          <li>{{ $hab }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif

              {{-- Experiências Profissionais --}}
              @if (!empty($cv['experiencias']))
              <div class="section-12-item">
                  <h2>Experiências Profissionais</h2>
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

              {{-- Perfil Profissional --}}
              @if (!empty($cv["perfil_profissional"]))
              <div class="section-12-item">
                   <h2>Perfil</h2>
                   <ul>
                        <li>{{ $cv["perfil_profissional"] }}</li>
                   </ul>
              </div>
              @endif

               @if (!empty($cv["objectivo_profissional"]))
              <div class="section-12-item">
                   <h2>Objectivo Profissional</h2>
                   <ul>
                        <li>{{ $cv["objectivo_profissional"] }}</li>
                   </ul>
              </div>
              @endif

              {{-- Idiomas --}}
              @if (!empty($cv['idiomas']))
              <div class="section-12-item">
                   <h2>Idioma</h2>
                   <ul>
                      @foreach ($cv['idiomas'] as $idioma)
                          <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                      @endforeach
                   </ul>
              </div>
              @endif

              {{-- Objectivo --}}
              @if (!empty($cv['objectivo']))
              <div class="section-12-item">
                <h2>Objectivo</h2>
                <p>{{ $cv['objectivo'] }}</p>
              </div>
              @endif

          </div>
        </div>
   </div>
</section>