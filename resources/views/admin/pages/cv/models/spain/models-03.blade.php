@php
    $cv = session('curriculo');
@endphp

<div class="cv-preview container p-4 shadow rounded bg-white">
    {{-- Foto de Perfil --}}
    @if(isset($cv['foto_perfil']))
        <div class="text-center mb-4">
            <img src="{{ asset('storage/temp/' . $cv['foto_perfil']->getClientOriginalName()) }}" 
                 alt="Foto de Perfil" 
                 class="img-thumbnail rounded-circle" 
                 width="150" height="150">
        </div>
    @endif

    {{-- Dados Pessoais --}}
    <h2 class="mb-3">{{ $cv['nome'] }}</h2>
    <p><strong>Documento:</strong> {{ $cv['documento'] }}</p>
    <p><strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse($cv['data_nascimento'])->format('d/m/Y') }}</p>
    <p><strong>Gênero:</strong> {{ ucfirst($cv['genero']) }}</p>
    <p><strong>Email:</strong> {{ $cv['email'] }}</p>
    <p><strong>Telefone:</strong> {{ $cv['telefone'] }}</p>
    <p><strong>Endereço:</strong> {{ $cv['endereco'] }}</p>

    {{-- Perfil Profissional --}}
    <div class="mt-4">
        <h4>Perfil Profissional</h4>
        <p>{{ $cv['perfil_profissional'] }}</p>
    </div>

    {{-- Formação Acadêmica --}}
    <div class="mt-4">
        <h4>Formação Acadêmica</h4>
        <p><strong>Curso:</strong> {{ $cv['curso'] }} ({{ $cv['classe'] }})</p>
        <p><strong>Instituição:</strong> {{ $cv['instituicao'] }}</p>
        <p><strong>Período:</strong> {{ $cv['inicio_formacao'] }} - {{ $cv['fim_formacao'] }}</p>
    </div>

    {{-- Experiência Profissional --}}
    @if(!empty($cv['experiencias']))
        <div class="mt-4">
            <h4>Experiência Profissional</h4>
            @foreach($cv['experiencias'] as $exp)
                <div class="mb-3">
                    <p><strong>Empresa:</strong> {{ $exp['empresa'] }}</p>
                    <p><strong>Cargo:</strong> {{ $exp['cargo'] }}</p>
                    <p><strong>Período:</strong> {{ $exp['inicio'] }} - {{ $exp['fim'] }}</p>
                    <p><strong>Descrição:</strong> {{ $exp['descricao'] }}</p>
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
