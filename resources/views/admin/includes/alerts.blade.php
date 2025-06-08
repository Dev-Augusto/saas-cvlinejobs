{{-- Sucesso --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{!! session('success') !!}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- Erro --}}
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- Aviso --}}
@if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ session('warning') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- Informação --}}
@if (session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{ session('info') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
        </button>
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
        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
