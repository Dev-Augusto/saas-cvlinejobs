@if(!empty($cv['foto_perfil']))
    <img src="{{ asset('storage/adm/img/cv-images/' . $cv['foto_perfil']) }}" alt="Foto de Perfil">
@elseif (!empty($cv['foto_perfil_temp']))
    <img src="{{ asset('storage/' . $cv['foto_perfil_temp']) }}" alt="Foto de Perfil">
@else
    <img src="{{ asset('/adm/img/logos/cvlinejobs.png') }}" alt="Foto de Perfil">
@endif