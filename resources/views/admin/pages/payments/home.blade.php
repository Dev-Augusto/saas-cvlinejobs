@extends("layouts.app")
@section("title", "CVLineJobs | Pagamentos & Licenças")
@section("content")
<div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('/assets/images/landing/payments/img-payment.webp');">
        <span class="mask  bg-gradient-dark  opacity-6"></span>
      </div>
      <div class="card card-body mx-2 mx-md-2 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="/adm/img/logos/cvlinejobs.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                CVLINEJOBS | PAGAMENTOS & LICENÇAS
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
                Pague sua licença e mantenha-se ativo na plataforma, com acesso contínuo a todas as funcionalidades.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active"  href="#" type="button" data-bs-toggle="modal" data-bs-target="#payment">
                    <i class="material-symbols-rounded text-lg position-relative">money</i>
                    <span class="ms-1">Efectuar Pagamento</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        @include('admin.includes.alerts')
        <div class="row">
            <div class="col-12 mt-4">
              <div class="row">
                <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Lista de Licenças</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Preço</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data de Pagamento</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data de Expiração</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <p class="text-xs text-secondary mb-0">{{number_format($item->price, 2, ',', '.')}} KZ</p>
                                </div>
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ date('d/m/Y', strtotime($item->payment_date)) }}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                @if($item->status == 'activa')
                                    <span class="badge badge-sm bg-gradient-success">{{$item->status}}</span>
                                @elseif($item->status == 'pendente')
                                    <span class="badge badge-sm bg-gradient-warning">{{$item->status}}</span>
                                @else
                                    <span class="badge badge-sm bg-gradient-danger">{{$item->status}}</span>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                <span class="text-secondary text-xs font-weight-bold">{{ date('d/m/Y', strtotime($item->payment_expiration)) }}</span>
                            </td>
                            <td class="align-middle"> 
                                <a href="javascript:;" type="button" data-bs-toggle="modal" data-bs-target="#view-payment{{ $item->id }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="visualizar">
                                ver
                                </a>
                            </td>
                        </tr>
                        @include('admin.pages.payments.modals.view-payment',['item'=>$item])
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
              </div>
            </div>
            <div class="col-lg-12">
                <nav>
                    <ul class="pagination pagination-sm justify-content-center">
                        {{ $data->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>
      </div>
@include('admin.pages.payments.modals.payment')
@include('admin.pages.payments.scripts.count-month')
@endsection