@php
    $cv = session('curriculo');
@endphp
<section class="cv-preview">
    <div class="cv-container">

        {{-- Cabeçalho --}}
        <header class="cv-header">
            <div class="cv-header-info">
                <h1>{{ $cv['nome'] ?? 'Nome não informado' }}</h1>
                <p><strong>NIF:</strong> {{ $cv['documento'] ?? '-' }}</p>
            </div>

            <div class="cv-header-photo">
                @include("admin.pages.cv.models.partials.img-profile")
            </div>
        </header>

        {{-- Informações Pessoais --}}
        <section class="cv-section">
            <h2>Informações Pessoais</h2>
            <ul>
                <li><strong>Data de Nascimento:</strong> {{ date('d/m/Y', strtotime($cv['data_nascimento'])) }}</li>
                <li><strong>Gênero:</strong> {{ ucfirst($cv['genero']) }}</li>
                <li><strong>Email:</strong> {{ $cv['email'] }}</li>
                <li><strong>Telefone:</strong>
                    @foreach (explode('|', $cv['telefone']) as $numero)
                        {{ trim($numero) }}@if (!$loop->last) | @endif
                    @endforeach
                </li>
                <li><strong>Endereço:</strong> {{ $cv['endereco'] }}</li>
            </ul>
        </section>

        {{-- Perfil Profissional --}}
        @if (!empty($cv['perfil_profissional']))
            <section class="cv-section">
                <h2>Perfil Profissional</h2>
                <p>{{ $cv['perfil_profissional'] }}</p>
            </section>
        @endif

        {{-- Formação Acadêmica --}}
        <section class="cv-section">
            <h2>Formação Acadêmica</h2>
            <p><strong>Curso:</strong> {{ $cv['curso'] }} ({{ $cv['classe'] }})</p>
            <p><strong>Instituição:</strong> {{ $cv['instituicao'] }}</p>
            <p><strong>Período:</strong> {{ $cv['inicio_formacao'] }} - {{ $cv['fim_formacao'] }}</p>
        </section>

        {{-- Experiência Profissional --}}
        @if (!empty($cv['experiencias']))
            <section class="cv-section">
                <h2>Experiência Profissional</h2>
                @foreach ($cv['experiencias'] as $exp)
                    <div class="cv-block">
                        <p><strong>{{ $exp['cargo'] }}</strong> — {{ $exp['empresa'] }}</p>
                        <p><em>{{ $exp['inicio'] }} - {{ $exp['fim'] }}</em></p>
                        <p>{{ $exp['descricao'] }}</p>
                    </div>
                @endforeach
            </section>
        @endif

        {{-- Habilidades --}}
        @if (!empty($cv['habilidades']))
            <section class="cv-section">
                <h2>Habilidades</h2>
                <ul>
                    @foreach ($cv['habilidades'] as $habilidade)
                        <li>{{ $habilidade }}</li>
                    @endforeach
                </ul>
            </section>
        @endif

        {{-- Idiomas --}}
        @if (!empty($cv['idiomas']))
            <section class="cv-section">
                <h2>Idiomas</h2>
                <ul>
                    @foreach ($cv['idiomas'] as $idioma)
                        <li>{{ $idioma['nome'] }} — {{ ucfirst($idioma['nivel']) }}</li>
                    @endforeach
                </ul>
            </section>
        @endif

    </div>
</section>
