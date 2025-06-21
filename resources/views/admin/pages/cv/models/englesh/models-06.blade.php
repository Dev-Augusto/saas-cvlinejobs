<!-- CV Model 3: Centered Top Image Layout -->
<section class="cv-english-3">
  <div class="cv3-wrapper">
    <div class="cv3-header">
      <div class="cv3-image">
        @include("admin.pages.cv.models.partials.img-profile", $cv)
      </div>
      <h1>{{ $cv['nome'] }}</h1>
      <h2>{{ $cv['documento'] }}</h2>
    </div>

    <div class="cv3-info">
      <p><strong>Email:</strong> {{ $cv['email'] }}</p>
      <p><strong>Phone:</strong> {{ $cv['telefone'] }}</p>
      <p><strong>Address:</strong> {{ $cv['endereco'] }}</p>
    </div>

    <div class="cv3-section">
      <h3>Professional Summary</h3>
      <p>{{ $cv['perfil_profissional'] }}</p>
    </div>

    <div class="cv3-section">
      <h3>Work Experience</h3>
      @foreach ($cv['experiencias'] as $job)
        <div class="cv3-job">
          <strong>{{ $job['cargo'] }} - {{ $job['empresa'] }}</strong><br>
          <span>{{ $job['inicio'] }} to {{ $job['fim'] }}</span>
          <p>{{ $job['descricao'] }}</p>
        </div>
      @endforeach
    </div>

    <div class="cv3-section">
      <h3>Education</h3>
      <p>{{ $cv['classe'] }} at {{ $cv['instituicao'] }} ({{ $cv['inicio_formacao'] }} - {{ $cv['fim_formacao'] }})</p>
    </div>

    <div class="cv3-section">
      <h3>Skills</h3>
      <ul>
        @foreach ($cv['habilidades'] as $skill)
          <li>{{ $skill }}</li>
        @endforeach
      </ul>
    </div>

    <div class="cv3-section">
      <h3>Languages</h3>
      <ul>
        @foreach ($cv['idiomas'] as $lang)
          <li>{{ $lang['nome'] }} - {{ ucfirst($lang['nivel']) }}</li>
        @endforeach
      </ul>
    </div>
  </div>
</section>