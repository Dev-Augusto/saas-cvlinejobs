<section>
<!-- CV Model 7: Creative Sidebar Layout -->
<div class="cv-sidebar-layout">
  <div class="cv-sidebar">
    @if(isset($cv['foto_perfil']))
      <div class="cv-photo">
        @include("admin.pages.cv.models.partials.img-profile", $cv)
      </div>
    @endif
    <h2>{{ $cv['nome'] }}</h2>
    <ul class="cv-contacts">
      <li><strong>Correo:</strong> {{ $cv['email'] }}</li>
      <li><strong>Tel:</strong> {{ $cv['telefone'] }}</li>
      <li><strong>Dirección:</strong> {{ $cv['endereco'] }}</li>
      <li><strong>Documento:</strong> {{ $cv['documento'] }}</li>
    </ul>
    <div class="cv-languages">
      <h3>Idiomas</h3>
      <ul>
        @foreach($cv['idiomas'] as $idioma)
          <li>{{ $idioma['nome'] }} ({{ ucfirst($idioma['nivel']) }})</li>
        @endforeach
      </ul>
    </div>
  </div>
  <div class="cv-main">
    <section>
      <h3>Perfil Profesional</h3>
      <p>{{ $cv['perfil_profissional'] }}</p>
    </section>

    <section>
      <h3>Formación Académica</h3>
      <p>{{ $cv['curso'] }} - {{ $cv['instituicao'] }} ({{ $cv['inicio_formacao'] }} - {{ $cv['fim_formacao'] }})</p>
      <p><strong>Nivel:</strong> {{ $cv['classe'] }}</p>
    </section>

    @if(!empty($cv['experiencias']))
      <section>
        <h3>Experiencia Profesional</h3>
        @foreach($cv['experiencias'] as $exp)
          <div class="cv-exp">
            <p><strong>{{ $exp['cargo'] }}</strong> - {{ $exp['empresa'] }}</p>
            <p><em>{{ $exp['inicio'] }} a {{ $exp['fim'] }}</em></p>
            <p>{{ $exp['descricao'] }}</p>
          </div>
        @endforeach
      </section>
    @endif

    @if(!empty($cv['habilidades']))
      <section>
        <h3>Habilidades</h3>
        <ul>
          @foreach($cv['habilidades'] as $habilidade)
            <li>{{ $habilidade }}</li>
          @endforeach
        </ul>
      </section>
    @endif
  </div>
</div>
</section>