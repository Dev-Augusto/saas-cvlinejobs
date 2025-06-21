@extends("layouts.app")
@section("title", "CVLineJobs | Modelos de Currículos")
@section("content")
<link href="/assets/css/cv-designer.css" rel="stylesheet">
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
                CVLINEJOBS |MODELOS DE CURRÍCULOS VITAE
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
               Tenha acesso a modelos de CV prontos, edite com facilidade e mantenha seus currículos organizados em um só luga
              </p>
            </div>
          </div>
        </div>
        <input type="hidden" name="idioma_cv" id="idioma_cv" value="Português">
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill p-1" role="tablist" id="idioma-selector">
                     @if($cv['idioma_cv'] == "Português")
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 active" data-idioma="Português" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                            <i class="fas fa-language"></i>
                            <span class="ms-1">Português</span>
                        </a>
                    </li>
                    @elseif($cv['idioma_cv'] == "Inglês")
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 active" data-idioma="Inglês" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                            <i class="fas fa-language"></i>
                            <span class="ms-1">Inglês</span>
                        </a>
                    </li>
                    @elseif($cv['idioma_cv'] == "Espanhol")
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 active" data-idioma="Espanhol" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                            <i class="fas fa-language"></i>
                            <span class="ms-1">Espanhol</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
      </div>
    </div>
    @if(session()->has("curriculo") || isset($update))
    @php $i = 1; @endphp
    <div class="row">
        <div class="col-12 mt-4">
            <div class="row">
              @php try { @endphp
                @if($cv['idioma_cv'] == "Português")
                    @while (@view("admin.pages.cv.models.portuguese.models-".($i >= 10 ? $i : "0".$i )))
                        <div class="col-md-5" style="border:1px solid #ccc; margin-bottom: 10px; width: 500px; height: auto; padding: 10px; font-size: 14px;">
                            <a href="{{ !isset($update) ? route('admin.cv.show', $i) : route('admin.cv.update.designer', ['id'=>$update, 'id_model'=>$i]) }}">
                                @include("admin.pages.cv.models.portuguese.models-" . ($i >= 10 ? $i : "0" . $i), $cv)
                            </a>
                        </div>
                        @php $i++; @endphp
                    @endwhile

                @elseif($cv['idioma_cv'] == "Inglês")
                    @while (@view("admin.pages.cv.models.englesh.models-".($i >= 10 ? $i : "0".$i )))
                        <div class="col-md-5" style="border:1px solid #ccc; margin-bottom: 10px; width: 500px; height: auto; padding: 10px; font-size: 14px;">
                            <a href="{{ !isset($update) ? route('admin.cv.show', $i) : route('admin.cv.update.designer', ['id'=>$update, 'id_model'=>$i]) }}">
                                @include("admin.pages.cv.models.englesh.models-".($i >= 10 ? $i : "0".$i ), $cv)
                            </a>
                        </div>
                        @php $i++; @endphp
                    @endwhile

                @elseif($cv['idioma_cv'] == "Espanhol")
                    @while (@view("admin.pages.cv.models.spain.models-".($i >= 10 ? $i : "0".$i )))
                        <div class="col-md-5" style="border:1px solid #ccc; margin-bottom: 10px; width: 500px; height: auto; padding: 10px; font-size: 14px;">
                            <a href="{{ !isset($update) ? route('admin.cv.show', $i) : route('admin.cv.update.designer', ['id'=>$update, 'id_model'=>$i]) }}">
                                @include("admin.pages.cv.models.spain.models-".($i >= 10 ? $i : "0".$i ), $cv)
                            </a>
                        </div>
                        @php $i++; @endphp
                    @endwhile

                @endif
              @php } catch (\Throwable $th) { @endphp

              @php } @endphp
            </div>
        </div>
    </div>
</div>
@endif
@endsection