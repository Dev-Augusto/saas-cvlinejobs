<section>
<!-- CV Model 6: Spanish Card Layout -->
<div class="cv-preview container p-4 shadow rounded bg-white">
  {{-- Datos Personales --}}
  <h2 class="mb-3">{{ $cv['nome'] }}</h2>
  <p><strong>Documento:</strong> {{ $cv['documento'] }}</p>
  <p><strong>Fecha de Nacimiento:</strong> {{ \Carbon\Carbon::parse($cv['data_nascimento'])->format('d/m/Y') }}</p>
  <p><strong>Género:</strong> {{ ucfirst($cv['genero']) }}</p>
  <p><strong>Correo Electrónico:</strong> {{ $cv['email'] }}</p>
  <p><strong>Teléfono:</strong> {{ $cv['telefone'] }}</p>
  <p><strong>Dirección:</strong> {{ $cv['endereco'] }}</p>

  {{-- Perfil Profesional --}}
  <div class="mt-4">
    <h4>Perfil Profesional</h4>
    <p>{{ $cv['perfil_profissional'] }}</p>
  </div>

  {{-- Formación Académica --}}
  <div class="mt-4">
    <h4>Formación Académica</h4>
    <p><strong>Curso:</strong> {{ $cv['curso'] }} ({{ $cv['classe'] }})</p>
    <p><strong>Institución:</strong> {{ $cv['instituicao'] }}</p>
    <p><strong>Período:</strong> {{ $cv['inicio_formacao'] }} - {{ $cv['fim_formacao'] }}</p>
  </div>

  {{-- Experiencia Profesional --}}
  @if(!empty($cv['experiencias']))
    <div class="mt-4">
      <h4>Experiencia Profesional</h4>
      @foreach($cv['experiencias'] as $exp)
        <div class="mb-3">
          <p><strong>Empresa:</strong> {{ $exp['empresa'] }}</p>
          <p><strong>Puesto:</strong> {{ $exp['cargo'] }}</p>
          <p><strong>Período:</strong> {{ $exp['inicio'] }} - {{ $exp['fim'] }}</p>
          <p><strong>Descripción:</strong> {{ $exp['descricao'] }}</p>
        </div>
      @endforeach
    </div>
  @endif

  {{-- Habilidades --}}
  @if(!empty($cv['habilidades']))
    <div class="mt-4">
      <h4>Habilidades</h4>
      <ul>
        @foreach($cv['habilidades'] as $habilidade)
          <li>{{ $habilidade }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Idiomas --}}
  @if(!empty($cv['idiomas']))
    <div class="mt-4">
      <h4>Idiomas</h4>
      <ul>
        @foreach($cv['idiomas'] as $idioma)
          <li>{{ $idioma['nome'] }} - <em>{{ ucfirst($idioma['nivel']) }}</em></li>
        @endforeach
      </ul>
    </div>
  @endif
</div>
</section>