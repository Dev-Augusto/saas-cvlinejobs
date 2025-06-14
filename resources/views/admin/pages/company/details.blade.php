@extends("layouts.app")
@section("title", "CVLineJobs | Empresas | ".$company->name)
@section("content")
<div class="container-fluid py-2">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-xl-6 mb-xl-0 mb-4">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl">
                  <span class="mask bg-gradient-dark opacity-10"></span>
                  <div class="card-body position-relative z-index-1 p-3">
                    <i class="material-symbols-rounded text-white p-2">home</i>
                    <h5 class="text-white mt-4 mb-5 pb-2 text-uppercase">{{strtoupper($company->name)}}</h5>
                    <div class="d-flex">
                      <div class="d-flex">
                        <div class="me-4">
                          <p class="text-white text-sm opacity-8 mb-0">Proprietário</p>
                          <h6 class="text-white mb-0">{{ $company->owner }}</h6>
                        </div>
                        <div>
                          <p class="text-white text-sm opacity-8 mb-0">NIF da Empresa</p>
                          <h6 class="text-white mb-0">{{ $company->nif_number }}</h6>
                        </div>
                      </div>
                      <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                        <img class="w-60 mt-2" src="{{ asset('adm/img/companys/logotipos/' . $company->image) }}" alt="logo">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="row">
                <div class="col-md-6 col-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded opacity-10">account_balance</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">CV'S</h6>
                      <span class="text-xs">Curriculos Gerados</span>
                      <hr class="horizontal dark my-3">
                       <span class="text-xs">{{ $cvs }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-dark shadow text-center border-radius-lg">
                        <i class="material-symbols-rounded opacity-10">account_balance_wallet</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Pagamentos</h6>
                      <span class="text-xs">Licenças</span>
                      <hr class="horizontal dark my-3">
                      <span class="text-xs text-success">{{ number_format($payments, 2, ',', '.') }} KZ</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-body p-3">
                  <div class="row">
                    <img height="400px" width="100%" src="{{ asset('adm/img/companys/logotipos/' . $company->image) }}" alt="logo">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Licenças</h6>
                </div>
                <div class="col-6 text-end">
                  <button class="btn btn-outline-primary btn-sm mb-0">Pagamentos</button>
                </div>
              </div>
            </div>
            <div class="card-body p-3 pb-0">
              <ul class="list-group">
                @foreach ($licenses as $item)
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark font-weight-bold text-sm">{{date('d/m/Y', strtotime($item->payment_date))}}</h6>
                    <span class="text-xs">{{ number_format($item->price, 2, ',', '.') }} - {{$item->month == 1 ? $item->month.' Mês' : $item->month.' Meses'}}</span>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                        @if($item->status == 'activa')
                            <span class="badge badge-sm bg-gradient-success">{{ strtoupper($item->status)}}</span>
                        @elseif($item->status == 'pendente')
                            <span class="badge badge-sm bg-gradient-warning">{{ strtoupper($item->status)}}</span>
                        @else
                            <span class="badge badge-sm bg-gradient-danger">{{ strtoupper($item->status)}}</span>
                        @endif
                    <button data-bs-toggle="modal" data-bs-target="#view-payment{{ $item->id }}" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4">
                        <i class="material-symbols-rounded text-lg position-relative me-1">picture_as_pdf</i> PDF</button>
                  </div>
                </li>
                @include('admin.pages.company.modals.payment', ['item'=>$item, 'company'=>$company])
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
@endsection