<!-- CV Model 5: Spanish Layout Design 18 -->
<section class="cv-spanish-2">
  <div class="design-18">
    <div class="design-18-content">
      <div class="section-18-header">
        <h2>Currículum Vitae</h2>
      </div>

      <div class="section-18-description">
        <h2>{{ $cv['nome'] ?? 'Nombre no informado' }}</h2>
        @include("admin.pages.cv.models.partials.img-profile", $cv)
      </div>

      <div class="section-18-table">
        <table border="1">
          <tr>
            <td>
              <ul>
                @if(!empty($cv['telefone']))
                  <li><span>Tel: </span>{{ $cv['telefone'] }}</li>
                @endif
                @if(!empty($cv['endereco']))
                  <li>{{ $cv['endereco'] }}</li>
                @endif
                @if(!empty($cv['documento']))
                  <li><span>NIF:</span> {{ $cv['documento'] }}</li>
                @endif
              </ul>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              @if(!empty($cv['perfil_profissional']))
                <p>{{ $cv['perfil_profissional'] }}</p>
              @endif
            </td>
          </tr>
        </table>
      </div>

      <div class="section-18-items">
        <div class="section-18-item">
          <h2>Perfil Profesional</h2>
          @if(!empty($cv['perfil_profissional']))
            <p>{{ $cv['perfil_profissional'] }}</p>
          @endif
        </div>

        <div class="section-18-item">
          <h2>Formación</h2>
          @if(!empty($cv['curso']) || !empty($cv['instituicao']))
            <ul>
              <li>
                <span style="font-weight: lighter; font-family: 'DejaVu Sans'; font-size: 14px">
                  {{ $cv['classe'] ?? '' }} / {{ $cv['curso'] ?? '' }}
                </span>, en {{ $cv['instituicao'] ?? '' }}
                ({{ $cv['inicio_formacao'] ?? '?' }} - {{ $cv['fim_formacao'] ?? '?' }})
              </li>
            </ul>
          @endif
        </div>

        <div class="section-18-item">
          <h2>Idiomas</h2>
          @if(!empty($cv['idiomas']))
            <ul>
              @foreach($cv['idiomas'] as $idioma)
                <li>{{ $idioma['nome'] }} — {{ ucfirst($idioma['nivel']) }}</li>
              @endforeach
            </ul>
          @endif
        </div>

        <div class="section-18-item">
          <h2>Experiencia Profesional</h2>
          @if(!empty($cv['experiencias']))
            <ul>
              @foreach($cv['experiencias'] as $exp)
                <li>
                  <strong>{{ $exp['cargo'] ?? '' }}</strong> en <strong>{{ $exp['empresa'] ?? '' }}</strong>
                  ({{ $exp['inicio'] ?? '?' }} - {{ $exp['fim'] ?? '?' }})<br>
                  <small>{{ $exp['descricao'] ?? '' }}</small>
                </li>
              @endforeach
            </ul>
          @endif
        </div>

        <div class="section-18-item">
          <h2>Habilidades</h2>
          @if(!empty($cv['habilidades']))
            <ul>
              @foreach($cv['habilidades'] as $habilidade)
                <li>{{ $habilidade }}</li>
              @endforeach
            </ul>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
