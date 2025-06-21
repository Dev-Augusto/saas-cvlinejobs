<!-- CV Model 1: Simple Professional -->
<section class="cv-english-1">
  <div class="cv-container">
    <div class="cv-header">
      <h1>{{ $cv['nome'] }}</h1>
      <p>{{ $cv['documento'] }}</p>
    </div>
    <ul class="cv-info">
      <li>Email: {{ $cv['email'] }}</li>
      <li>Phone: {{ $cv['telefone'] }}</li>
      <li>Address: {{ $cv['endereco'] }}</li>
    </ul>
    <div class="cv-section">
      <h2>Professional Summary</h2>
      <p>{{ $cv['perfil_profissional'] }}</p>
    </div>
    <div class="cv-section">
      <h2>Work Experience</h2>
      @foreach ($cv['experiencias'] as $job)
        <div>
          <strong>{{ $job['cargo'] }} at {{ $job['empresa'] }}</strong>
          <p>{{ $job['inicio'] }} - {{ $job['fim'] }}</p>
          <p>{{ $job['descricao'] }}</p>
        </div>
      @endforeach
    </div>
    <div class="cv-section">
      <h2>Education</h2>
      <p>{{ $cv['classe'] }} - {{ $cv['instituicao'] }} ({{ $cv['inicio_formacao'] }} - {{ $cv['fim_formacao'] }})</p>
    </div>
    <div class="cv-section">
      <h2>Skills</h2>
      <ul>
        @foreach ($cv['habilidades'] as $skill)
          <li>{{ $skill }}</li>
        @endforeach
      </ul>
    </div>
    <div class="cv-section">
      <h2>Languages</h2>
      <ul>
        @foreach ($cv['idiomas'] as $lang)
          <li>{{ $lang['nome'] }} - {{ ucfirst($lang['nivel']) }}</li>
        @endforeach
      </ul>
    </div>
  </div>
</section>