@extends("layouts.app")
@section("title", "CVLineJobs | Curriculo Vitae ".$cv['nome'])
@section("content")
<link href="/assets/css/cv-designer.css" rel="stylesheet">
<style>
  #cv-content {
  width: 100%;
  min-height: auto;
  overflow: visible;
}
</style>
<div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('/assets/images/landing/slide-bg/bg-04.jpg'); background-size:cover;">
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
              <h5 class="mb-1" style="text-transform: uppercase;">
                CVLINEJOBS |CURRÍCULOS VITAE | {{ $cv['nome'] }}
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
               Tenha acesso a modelos de CV prontos, edite com facilidade e mantenha seus currículos organizados em um só luga
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill p-1" >
                    <li class="nav-item">
                        <a class=" mb-0 px-0 py-1 active" href="#" onclick="printCV(event)">
                            <i class="material-symbols-rounded fixed-plugin-button-nav">print</i>
                            <span class="ms-1">Imprimir</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class=" mb-0 px-0 py-1" onclick="downloadCV(event)" href="#">
                            <i class="material-symbols-rounded fixed-plugin-button-nav">download</i>
                            <span class="ms-1">Baixar</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
      </div>
    </div>
    @if(session()->has("curriculo"))
    <div class="row">
        <div class="col-12 mt-4">
            <div class="row">
                  @include("admin.pages.cv.models.partials.view-cv", ['cv'=>$cv, 'id'=>$id ?? $cv['templante_number']])
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-12 mt-4">
            <div class="row">
                  @include("admin.pages.cv.models.partials.view-cv", ['cv'=>$cv, 'id'=>$cv['templante_number']])
            </div>
        </div>
    </div>
    @endif
</div>
@include("admin.pages.cv.scripts.print", $cv)
@endsection