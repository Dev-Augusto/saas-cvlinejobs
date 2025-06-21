<section class="cv-spanish-1">
  <div class="design-11">
    <div class="design-11-content">
      <div class="section-11-items">
        <div class="section-11-left">
          @if (!empty($cv['perfil_profissional']))
            <div class="section-11-item">
              <h2>Perfil Profesional</h2>
              <p>{{ $cv['perfil_profissional'] }}</p>
            </div>
          @endif

          @if (!empty($cv['idiomas']))
            <div class="section-11-item">
              <h2>Idiomas</h2>
              <ul>
                @foreach ($cv['idiomas'] as $idioma)
                  <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                @endforeach
              </ul>
            </div>
          @endif
        </div>

        <div class="section-11-right">
          <div class="section-11-description">
            <div class="section-11-name">
              <h2>{{ $cv['nome'] }}</h2>
              <ul>
                <li>Fecha de Nacimiento: {{ \Carbon\Carbon::parse($cv['data_nascimento'])->format('d/m/Y') }}</li>
                <li>Género: {{ ucfirst($cv['genero']) }}</li>
                <li>Email: {{ $cv['email'] }}</li>
                <li>Teléfono: {{ $cv['telefone'] }}</li>
                <li>Dirección: {{ $cv['endereco'] }}</li>
                <li>Documento: {{ $cv['documento'] }}</li>
              </ul>
            </div>

            <div class="section-11-img">
              @include('admin.pages.cv.models.partials.img-profile', $cv)
            </div>
          </div>

          <div class="section-11-item">
            <h2>Formación Académica</h2>
            <ul>
              <li>{{ $cv['curso'] }}</li>
              <li>{{ $cv['instituicao'] }}</li>
              <li>{{ $cv['inicio_formacao'] }} - {{ $cv['fim_formacao'] }}</li>
              <li>{{ $cv['classe'] }}</li>
            </ul>
          </div>

          @if (!empty($cv['habilidades']))
            <div class="section-11-item">
              <h2>Habilidades</h2>
              <ul>
                @foreach ($cv['habilidades'] as $habilidade)
                  <li>{{ $habilidade }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          @if (!empty($cv['experiencias']))
            <div class="section-11-item">
              <h2>Experiencia Profesional</h2>
              <ul>
                @foreach ($cv['experiencias'] as $exp)
                  <li>
                    <strong>{{ $exp['cargo'] }}</strong> en <strong>{{ $exp['empresa'] }}</strong><br>
                    <small>{{ $exp['inicio'] }} - {{ $exp['fim'] }}</small><br>
                    <p>{{ $exp['descricao'] }}</p>
                  </li>
                @endforeach
              </ul>
            </div>
          @endif

          @if (!empty($cv['perfil_profissional']))
            <div class="section-11-item">
              <h2>Objetivo Profesional</h2>
              <p>{{ $cv['perfil_profissional'] }}</p>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>