@if (!empty(session('curriculo')['foto_perfil_temp']))
    <img src="{{ asset('storage/' . session('curriculo')['foto_perfil_temp']) }}" alt="Foto de Perfil">
@else
    <img src="{{ asset('/adm/img/logos/cvlinejobs.png') }}" alt="Foto de Perfil">
@endif