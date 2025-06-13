<input type="hidden" name="idioma_cv" id="idioma_cv" value="Português">
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill p-1" role="tablist" id="idioma-selector">
                     @if(isset($cv))
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active" data-idioma="Modelo" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                <i class="fas fa-language"></i>
                                <span class="ms-1">Actual</span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 {{ isset($cv) ? ($cv->lang == 'Português' ? 'active' : '') : '' }}" data-idioma="Português" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                            <i class="fas fa-language"></i>
                            <span class="ms-1">Português</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 {{ isset($cv) ? ($cv->lang == 'Inglês' ? 'active' : '') : '' }}" data-idioma="Inglês" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                            <i class="fas fa-language"></i>
                            <span class="ms-1">Inglês</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 {{ isset($cv) ? ($cv->lang == 'Espanhol' ? 'active' : '') : '' }}" data-idioma="Espanhol" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                            <i class="fas fa-language"></i>
                            <span class="ms-1">Espanhol</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>