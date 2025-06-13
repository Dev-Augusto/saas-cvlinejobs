@extends("layouts.app")
@section("title", "CVLineJobs | CV")
@section("content")
<div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('/assets/images/landing/slide-bg/cvs.png');">
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
                CVLINEJOBS | CURRÍCULO VITAE
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
                Ideal para quem quer criar currículos modernos, rápidos e prontos para impressão ou envio
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 "  href="{{ route("admin.cv.create") }}">
                    <i class="material-symbols-rounded text-lg position-relative">table_view</i>
                    <span class="ms-1">Novo CV</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="material-symbols-rounded text-lg position-relative">table_view</i>
                    <span class="ms-1">Nova CA</span>
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
                @php $i = 1 @endphp
                @foreach ($data as $item)
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                  <div class="card card-blog card-plain">
                    <div class="card-header p-0 m-2">
                      <a class="d-block shadow-xl border-radius-xl">
                        <img src="/assets/images/landing/cv/img-00.png" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                      </a>
                    </div>
                    <div class="card-body p-3">
                      <p class="mb-0 text-sm">Currículo #{{$i}}</p>
                      <a href="javascript:;">
                        <h5>
                          {{ substr($item->name, 0, 15) }}...
                        </h5>
                      </a>
                      <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('admin.cv.details', $item->id) }}" class="btn btn-outline-primary btn-sm mb-0">
                            Visualisar
                        </a>
                        <a href="{{ route('admin.cv.edite', $item->id) }}" class="btn btn-outline-primary btn-sm mb-0">
                            Editar
                        </a>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#delete-cv{{$item->id}}" class="btn btn-outline-primary btn-sm mb-0">
                            Eliminar
                        </button>
                      </div>
                    </div>
                  </div>
                </div> 
                @php $i++ @endphp
                @endforeach
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
@foreach ($data as $item)
    @include('admin.pages.cv.modals.delete-cv', ['item' => $item])
@endforeach
@endsection