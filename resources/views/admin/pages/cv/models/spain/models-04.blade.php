@php
    $cv = session('curriculo');
@endphp

<div class="cv-preview container mt-4">
    {{-- Foto de Perfil --}}
    @if(isset($cv['foto_perfil']))
        <div class="text-center mb-4">
            <img src="{{ asset('storage/temp/' . $cv['foto_perfil']->hashName()) }}" alt="Foto de Perfil" class="rounded-circle shadow" width="150" height="150">
        </div>
    @endif

    {{-- Dados Pessoais --}}
    <section class="mb-4">
        <h4 class="fw-bold">Dados Pessoais</h4>
        <p><strong>Nome:</strong> {{ $cv['nome'] ?? '-' }}</p>
        <p><strong>Documento:</strong> {{ $cv['documento'] ?? '-' }}</p>
        <p><strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse($cv['data_nascimento'])->format('d/m/Y') ?? '-' }}</p>
        <p><strong>Gênero:</strong> {{ ucfirst($cv['genero'] ?? '-') }}</p>
        <p><strong>Email:</strong> {{ $cv['email'] ?? '-' }}</p>
        <p><strong>Telefone:</strong> {{ $cv['telefone'] ?? '-' }}</p>
        <p><strong>Endereço:</strong> {{ $cv['endereco'] ?? '-' }}</p>
    </section>

    {{-- Perfil Profissional --}}
    @if(!empty($cv['perfil_profissional']))
        <section class="mb-4">
            <h4 class="fw-bold">Perfil Profissional</h4>
            <p>{{ $cv['perfil_profissional'] }}</p>
        </section>
    @endif

    {{-- Formação Acadêmica --}}
    <section class="mb-4">
        <h4 class="fw-bold">Formação Acadêmica</h4>
        <p><strong>Curso:</strong> {{ $cv['curso'] ?? '-' }}</p>
        <p><strong>Classe:</strong> {{ $cv['classe'] ?? '-' }}</p>
        <p><strong>Instituição:</strong> {{ $cv['instituicao'] ?? '-' }}</p>
        <p><strong>Período:</strong> {{ $cv['inicio_formacao'] ?? '-' }} - {{ $cv['fim_formacao'] ?? '-' }}</p>
    </section>

    {{-- Experiência Profissional --}}
    @if(!empty($cv['experiencias']))
        <section class="mb-4">
            <h4 class="fw-bold">Experiência Profissional</h4>
            @foreach($cv['experiencias'] as $exp)
                <div class="mb-2">
                    <p><strong>Empresa:</strong> {{ $exp['empresa'] }}</p>
                    <p><strong>Cargo:</strong> {{ $exp['cargo'] }}</p>
                    <p><strong>Período:</strong> {{ $exp['inicio'] }} - {{ $exp['fim'] }}</p>
                    <p><strong>Descrição:</strong> {{ $exp['descricao'] }}</p>
                </div>
                <hr>
            @endforeach
        </section>
    @endif

    {{-- Habilidades --}}
    @if(!empty($cv['habilidades']))
        <section class="mb-4">
            <h4 class="fw-bold">Habilidades</h4>
            <ul>
                @foreach($cv['habilidades'] as $skill)
                    <li>{{ $skill }}</li>
                @endforeach
            </ul>
        </section>
    @endif

    {{-- Idiomas --}}
    @if(!empty($cv['idiomas']))
        <section class="mb-4">
            <h4 class="fw-bold">Idiomas</h4>
            <ul>
                @foreach($cv['idiomas'] as $lang)
                    <li>{{ $lang['nome'] }} — <em>{{ ucfirst($lang['nivel']) }}</em></li>
                @endforeach
            </ul>
        </section>
    @endif
</div>
