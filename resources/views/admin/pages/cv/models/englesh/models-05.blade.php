<!-- CV Model 2: Sidebar Modern Layout -->
<section class="cv-english-2">
  <div class="cv-layout">
    <aside class="cv-sidebar">
      <div class="cv-photo">
        @include("admin.pages.cv.models.partials.img-profile", $cv)
      </div>
      <h2>{{ $cv['nome'] }}</h2>
      <p>{{ $cv['documento'] }}</p>
      <ul class="cv-contact">
        <li><strong>Email:</strong> {{ $cv['email'] }}</li>
        <li><strong>Phone:</strong> {{ $cv['telefone'] }}</li>
        <li><strong>Address:</strong> {{ $cv['endereco'] }}</li>
      </ul>
      <div class="cv-languages">
        <h3>Languages</h3>
        <ul>
          @foreach ($cv['idiomas'] as $lang)
            <li>{{ $lang['nome'] }} - {{ ucfirst($lang['nivel']) }}</li>
          @endforeach
        </ul>
      </div>
    </aside>
    <main class="cv-main">
      <section>
        <h2>Professional Summary</h2>
        <p>{{ $cv['perfil_profissional'] }}</p>
      </section>
      <section>
        <h2>Work Experience</h2>
        @foreach ($cv['experiencias'] as $job)
            <div>
                <strong>{{ $job['cargo'] }} at {{ $job['empresa'] }}</strong>
                <p>{{ $job['inicio'] }} - {{ $job['fim'] }}</p>
                <p>{{ $job['descricao'] }}</p>
            </div>
        @endforeach
      </section>
      <section>
        <h2>Education</h2>
        <p>{{ $cv['classe'] }} - {{ $cv['instituicao'] }} ({{ $cv['inicio_formacao'] }} - {{ $cv['fim_formacao'] }})</p>
      </section>
      <section>
        <h2>Skills</h2>
        <ul>
          @foreach ($cv['habilidades'] as $skill)
            <li>{{ $skill }}</li>
          @endforeach
        </ul>
      </section>
    </main>
  </div>
</section>