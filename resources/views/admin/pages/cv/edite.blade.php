@extends("layouts.app")
@section("title", "CVLineJobs | Editar Currículo vitae de ".$cv->name)
<link href="/adm/css/style-img.css" rel="stylesheet"/>
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
                CVLINEJOBS | EDITAR CURRÍCULO VITAE | {{ $cv->name }}
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
               Tenha acesso a modelos de CV prontos, edite com facilidade e mantenha seus currículos organizados em um só luga
              </p>
            </div>
          </div>
        </div>
        <form action="{{ route("admin.cv.update", $cv->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
        @include('admin.pages.cv.partials.languages')
        @include('admin.includes.alerts')
        <div class="row">
            <div class="container my-5">
                @include('admin.pages.cv.partials.inputs', ['cv'=>$cv])
            </div>
      </div>
    </div>
@include("admin.pages.cv.scripts.add-inputs-to-form")
@endsection