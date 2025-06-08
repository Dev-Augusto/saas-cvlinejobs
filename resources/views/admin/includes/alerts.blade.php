{{-- Sucesso --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{!! session('success') !!}</strong>
    </div>
@endif

{{-- Erro --}}
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('error') }}</strong>
    </div>
@endif

{{-- Aviso --}}
@if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session('warning') }}</strong>
    </div>
@endif

{{-- Informação --}}
@if (session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{ session('info') }}</strong>
    </div>
@endif

{{-- Erros de validação (withErrors) --}}
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li><strong>{{ $error }}</strong></li>
            @endforeach
        </ul>
    </div>
@endif
