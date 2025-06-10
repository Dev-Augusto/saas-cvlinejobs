@if($cv['idioma_cv'] == "Português")
    @if (@view("admin.pages.cv.models.portuguese.models-".($id >= 10 ? $id : "0".$id )))
        <div class="col-md-12" >
            <div id="cv-content">
                @include("admin.pages.cv.models.portuguese.models-" . ($id >= 10 ? $id : "0" . $id), $cv)
            </div>
        </div>
    @endif
@elseif($cv['idioma_cv'] == "Inglês")
        @if(@view("admin.pages.cv.models.englesh.models-".($id >= 10 ? $id : "0".$id )))
            <div class="col-md-12">
                @include("admin.pages.cv.models.englesh.models-".($id >= 10 ? $id : "0".$id ), $cv)
            </div>
        @endif
@elseif($cv['idioma_cv'] == "Espanhol")
        @if (@view("admin.pages.cv.models.spain.models-".($id >= 10 ? $id : "0".$id )))
            <div class="col-md-12" >
                @include("admin.pages.cv.models.spain.models-".($id >= 10 ? $id : "0".$id ), $cv)
            </div>
        @endif
@endif