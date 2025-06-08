@extends("layouts.app")
@section("title", "CVLineJobs | Criar CV")
<style>
   .add-btn { cursor: pointer; color: white; }
  .img-upload-wrapper {
    width: 180px;
    height: 180px;
    border-radius: 1rem;
    background-color: #f5f5f5;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .img-upload-wrapper input[type="file"] {
    opacity: 0;
    position: absolute;
    width: 100%;
    height: 100%;
    cursor: pointer;
  }

  .img-upload-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: none;
  }

  .img-upload-icon {
    font-size: 2rem;
    color: #888;
  }
</style>
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
                CVLINEJOBS |CRIAR CURRÍCULO VITAE
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
               Tenha acesso a modelos de CV prontos, edite com facilidade e mantenha seus currículos organizados em um só luga
              </p>
            </div>
          </div>
        </div>
        <form action="{{ route("admin.cv.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
        <input type="hidden" name="idioma_cv" id="idioma_cv" value="Português">
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill p-1" role="tablist" id="idioma-selector">
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 active" data-idioma="Português" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                            <i class="fas fa-language"></i>
                            <span class="ms-1">Português</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1" data-idioma="Inglês" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                            <i class="fas fa-language"></i>
                            <span class="ms-1">Inglês</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1" data-idioma="Espanhol" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                            <i class="fas fa-language"></i>
                            <span class="ms-1">Espanhol</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @include('admin.includes.alerts')
        <div class="row">
            <div class="container my-5">
                    <div class="card mb-4">
                            <div class="card-header bg-primary text-white">
                                <i class="fas fa-user me-2"></i>Dados Pessoais
                            </div>
                            <div class="card-body row g-3">
                                <!-- IMAGEM DE PERFIL NA LARGURA DE UMA LINHA -->
                                <div class="col-md-2 d-flex flex-column align-items-start" >
                                <label class="form-label">Foto de Perfil</label>
                                <div class="img-upload-wrapper w-100">
                                    <input type="file" name="foto_perfil" accept="image/*" onchange="previewImagem(this)">
                                    <img id="preview" alt="Pré-visualização">
                                    <i class="fas fa-camera img-upload-icon"></i>
                                </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                <div class="col-md-5">
                                <label class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" name="nome" placeholder="Ex: João Pedro da Silva" required>
                                </div>
                                <div class="col-md-6">
                                <label class="form-label">NIF / BI</label>
                                <input type="text" class="form-control" name="documento" placeholder="Ex: 002245789LA045">
                                </div>
                                <div class="col-md-5">
                                <label class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" name="data_nascimento">
                                </div>
                                <div class="col-md-5">
                                <label class="form-label">Gênero</label>
                                <select class="form-select" name="genero">
                                    <option selected disabled>Selecione o gênero</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="feminino">Feminino</option>
                                    <option value="outro">Outro</option>
                                </select>
                                </div>
                                <div class="col-md-5">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Ex: joao@email.com" required>
                                </div>
                                <div class="col-md-5">
                                <label class="form-label">Endereço</label>
                                <input type="text" class="form-control" name="endereco" placeholder="Ex: Rua 7, Bairro Tal, Luanda">
                                </div>
                            </div>
                        </div>
                        <!-- RESTO DOS CAMPOS COMO ESTAVAM -->
                        <div class="col-md-5">
                                <label class="form-label">Telefone</label>
                                <input type="tel" class="form-control" name="telefone" placeholder="Ex: +244 923 456 789">
                        </div>
                    </div>
                </div>

                    <!-- Perfil Profissional -->
                    <div class="card mb-4">
                    <div class="card-header bg-secondary text-white">
                        <i class="fas fa-user-tie me-2"></i>Perfil Profissional
                    </div>
                    <div class="card-body">
                        <textarea class="form-control" name="perfil_profissional" rows="5" placeholder="Descreva quem você é como profissional..."></textarea>
                    </div>
                    </div>

                    <!-- Formação Acadêmica -->
                    <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <i class="fas fa-graduation-cap me-2"></i>Formação Acadêmica
                    </div>
                    <div class="card-body row g-3">
                        <div class="col-md-6">
                        <label>Nivel Acadêmico</label>
                        <input type="text" class="form-control" name="classe" placeholder="Ex: 7ª Classe, 1º Ano">
                        </div>
                        <div class="col-md-6">
                        <label>Curso</label>
                        <input type="text" class="form-control" name="curso" placeholder="Ex: Engenharia Informática">
                        </div>
                        <div class="col-md-6">
                        <label>Instituição</label>
                        <input type="text" class="form-control" name="instituicao" placeholder="Ex: Universidade Agostinho Neto">
                        </div>
                        <div class="col-md-3">
                        <label>Ano de Início</label>
                        <input type="text" class="form-control" name="inicio_formacao" placeholder="Ex: 2019">
                        </div>
                        <div class="col-md-3">
                        <label>Ano de Conclusão</label>
                        <input type="text" class="form-control" name="fim_formacao" placeholder="Ex: 2023">
                        </div>
                    </div>
                    </div>

                    <!-- Experiência Profissional -->
                    <div class="card mb-4">
                    <div class="card-header bg-warning text-dark">
                        <i class="fas fa-briefcase me-2"></i>Experiências Profissionais
                        <span class="add-btn float-end" onclick="addExperience()"><i class="fas fa-plus"></i> Adicionar</span>
                    </div>
                    <div class="card-body" id="experience-container"></div>
                    </div>

                    <!-- Habilidades -->
                    <div class="card mb-4">
                    <div class="card-header bg-info text-white">
                        <i class="fas fa-lightbulb me-2"></i>Habilidades de Competência
                        <span class="add-btn float-end" onclick="addSkill()"><i class="fas fa-plus"></i> Adicionar</span>
                    </div>
                    <div class="card-body" id="skills-container"></div>
                    </div>

                    <!-- Idiomas -->
                    <div class="card mb-4">
                    <div class="card-header bg-dark text-white">
                        <i class="fas fa-language me-2"></i>Idiomas
                        <span class="add-btn float-end" onclick="addLanguage()"><i class="fas fa-plus"></i> Adicionar</span>
                    </div>
                    <div class="card-body" id="language-container"></div>
                    </div>

                    <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark">
                        <i class="fas fa-save me-2"></i>Salvar Currículo
                    </button>
                  </div>
                </form>
            </div>
        </div>
      </div>
    </div>
@include("admin.pages.cv.scripts.add-inputs-to-form")
@endsection