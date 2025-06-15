@extends("layouts.app")
@section("title", "CVLineJobs | Admin")
@section('content')
<div class="container-fluid py-2">
      <div class="row">
        @include('admin.includes.alerts')
        <div class="ms-3">
          <h3 class="mb-0 h4 font-weight-bolder">Dashboard</h3>
          <p class="mb-4">
            Bem-Vindo ao trabalho <strong>{{ Auth::user()->name }}</strong>, e encontre os melhores serviços.
          </p>
        </div>
        <div class="col-xl-{{ Auth::user()->is_admin == 1 ? '3' : '4' }} col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="text-sm mb-0 text-capitalize">Currículos Criados</p>
                  <h4 class="mb-0">{{ $cvs }}</h4>
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                  <i class="material-symbols-rounded opacity-10">weekend</i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-{{ Auth::user()->is_admin == 1 ? '3' : '4' }} col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="text-sm mb-0 text-capitalize">Modelos de Currículo</p>
                  <h4 class="mb-0">30</h4>
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                  <i class="material-symbols-rounded opacity-10">table_view</i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-{{ Auth::user()->is_admin == 1 ? '3' : '4' }} col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="text-sm mb-0 text-capitalize">Licenças Pagas</p>
                  <h4 class="mb-0">{{ $licenseCount }}</h4>
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                  <i class="material-symbols-rounded opacity-10">receipt_long</i>
                </div>
              </div>
            </div>
          </div>
        </div>
        @if(Auth::user()->is_admin)
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="text-sm mb-0 text-capitalize">Empresas</p>
                  <h4 class="mb-0">{{ $company }}</h4>
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                  <i class="material-symbols-rounded opacity-10">home</i>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
      <div class="row mb-4 mt-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                  <div class="col-md-12">
                    <img src="/adm/img/logos/cvlinejobs.png" class="w-100" alt="">
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Pagamentos de Licenças</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">Pague</span> a licença
              </p>
            </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                  @foreach ($licenses as $item)
                  <span class="timeline-step">
                    <i class="material-symbols-rounded text-success text-gradient">notifications</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">{{ number_format($item->price, 2, ',', '.') }} KZ - 
                      @if($item->status == 'activa')
                          <span class="badge badge-sm bg-gradient-success">{{$item->status}}</span>
                      @elseif($item->status == 'pendente')
                          <span class="badge badge-sm bg-gradient-warning">{{$item->status}}</span>
                      @else
                          <span class="badge badge-sm bg-gradient-danger">{{$item->status}}</span>
                      @endif
                    </h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Exp: {{ date('d/m/Y', strtotime($item->payment_expiration)) }}</p>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection