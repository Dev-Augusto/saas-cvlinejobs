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
                                    <img id="preview" @if(isset($cv->image)) src="{{ asset('storage/adm/img/cv-images/' . $cv->image) }}" style="display: block;" @endif alt="Pré-visualização">
                                    <i class="fas fa-camera img-upload-icon"></i>
                                </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                <div class="col-md-5">
                                <label class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" name="nome" value="{{ $cv->name ?? '' }}" placeholder="Ex: João Pedro da Silva" required>
                                </div>
                                <div class="col-md-6">
                                <label class="form-label">NIF / BI</label>
                                <input type="text" class="form-control" name="documento" value="{{ $cv->document ?? '' }}" placeholder="Ex: 002245789LA045">
                                </div>
                                <div class="col-md-5">
                                <label class="form-label">Data de Nascimento</label>
                                <input type="date" value="{{ isset($cv) ? date('Y-m-d', strtotime($cv->born)) : ''  }}" class="form-control" name="data_nascimento">
                                </div>
                                <div class="col-md-5">
                                <label class="form-label">Gênero</label>
                                <select class="form-select" name="genero">
                                    <option selected disabled>Selecione o gênero</option>
                                    <option value="masculino" {{ isset($cv) ? ($cv->gender == 'masculino' ? 'selected' : '') : '' }}>Masculino</option>
                                    <option value="feminino" {{ isset($cv) ? ($cv->gender == 'femenino' ? 'selected' : '') : '' }}>Feminino</option>
                                    <option value="outro" {{ isset($cv) ? ($cv->gender == 'outro' ? 'selected' : '') : '' }}>Outro</option>
                                </select>
                                </div>
                                <div class="col-md-5">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $cv->email ?? '' }}" placeholder="Ex: joao@email.com" required>
                                </div>
                                <div class="col-md-5">
                                <label class="form-label">Endereço</label>
                                <input type="text" class="form-control" name="endereco" value="{{ $cv->address ?? ''}}" placeholder="Ex: Rua 7, Bairro Tal, Luanda">
                                </div>
                            </div>
                        </div>
                        <!-- RESTO DOS CAMPOS COMO ESTAVAM -->
                        <div class="col-md-5">
                                <label class="form-label">Telefone</label>
                                <input type="tel" class="form-control" name="telefone" value="{{ $cv->telephone ?? '' }}" placeholder="Ex: +244 923 456 789">
                        </div>
                    </div>
                </div>

                    <!-- Perfil Profissional -->
                    <div class="card mb-4">
                    <div class="card-header bg-secondary text-white">
                        <i class="fas fa-user-tie me-2"></i>Perfil Profissional
                    </div>
                    <div class="card-body">
                        <textarea class="form-control" name="perfil_profissional" rows="5" placeholder="Descreva quem você é como profissional...">{{ $cv->profitional_profile ?? '' }}</textarea>
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
                        <input type="text" class="form-control" name="classe" value="{{ $cv->grade ?? '' }}" placeholder="Ex: 7ª Classe, 1º Ano">
                        </div>
                        <div class="col-md-6">
                        <label>Curso</label>
                        <input type="text" class="form-control" name="curso" value="{{ $cv->course ?? '' }}" placeholder="Ex: Engenharia Informática">
                        </div>
                        <div class="col-md-6">
                        <label>Instituição</label>
                        <input type="text" class="form-control" name="instituicao" value="{{ $cv->institute ?? '' }}" placeholder="Ex: Universidade Agostinho Neto">
                        </div>
                        <div class="col-md-3">
                        <label>Ano de Início</label>
                        <input type="text" class="form-control" name="inicio_formacao" value="{{ $cv->year_start ?? '' }}" placeholder="Ex: 2019">
                        </div>
                        <div class="col-md-3">
                        <label>Ano de Conclusão</label>
                        <input type="text" class="form-control" name="fim_formacao" value="{{ $cv->year_end ?? '' }}" placeholder="Ex: 2023">
                        </div>
                    </div>
                    </div>

                    <!-- Experiência Profissional -->
                    <div class="card mb-4">
                    <div class="card-header bg-warning text-dark">
                        <i class="fas fa-briefcase me-2"></i>Experiências Profissionais
                        <span class="add-btn float-end" onclick="addExperience()"><i class="fas fa-plus"></i> Adicionar</span>
                    </div>
                        <div class="card-body" id="experience-container">
                            @if(isset($cv))
                                @foreach ($cv->experiencies as $index => $exp )
                                    <div class="row g-3 mb-3 border-bottom pb-2">
                                        <div class="col-md-6"><input type="text" class="form-control" name="experiencias[{{ $index }}][empresa]" value="{{ $exp->company }}" placeholder="Nome da empresa (Ex: CVLineJobs)"></div>
                                        <div class="col-md-6"><input type="text" class="form-control" name="experiencias[{{ $index }}][cargo]" value="{{ $exp->area }}" placeholder="Cargo ou função (Ex: Designer Gráfico)"></div>
                                        <div class="col-md-6"><input type="text" class="form-control" name="experiencias[{{ $index }}][inicio]" value="{{ $exp->start_year }}" placeholder="Ano de início (Ex: 2022)"></div>
                                        <div class="col-md-6"><input type="text" class="form-control" name="experiencias[{{ $index }}][fim]" value="{{ $exp->end_year }}" placeholder="Ano de término ou atual"></div>
                                        <div class="col-12"><textarea class="form-control" name="experiencias[{{ $index }}][descricao]" placeholder="Descreva as atividades desenvolvidas...">{{ $exp->description }}</textarea></div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Habilidades -->
                    <div class="card mb-4">
                    <div class="card-header bg-info text-white">
                        <i class="fas fa-lightbulb me-2"></i>Habilidades de Competência
                        <span class="add-btn float-end" onclick="addSkill()"><i class="fas fa-plus"></i> Adicionar</span>
                    </div>
                        <div class="card-body" id="skills-container">
                             @if(isset($cv))
                                @foreach ($cv->habilities as $index => $hability )
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="habilidades[]" value="{{ $hability->name ?? '' }}" placeholder="Ex: HTML, Comunicação, Liderança">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Idiomas -->
                    <div class="card mb-4">
                    <div class="card-header bg-dark text-white">
                        <i class="fas fa-language me-2"></i>Idiomas
                        <span class="add-btn float-end" onclick="addLanguage()"><i class="fas fa-plus"></i> Adicionar</span>
                    </div>
                        <div class="card-body" id="language-container">
                             @if(isset($cv))
                                @foreach ($cv->languages as $index => $language )
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="idiomas[{{ $index }}][nome]" value="{{ $language->name ?? '' }}" placeholder="Ex: Inglês, Espanhol">
                                        </div>
                                        <div class="col-md-6">
                                        <select class="form-select" name="idiomas[{{ $index }}][nivel]">
                                            <option selected disabled>Nível de proficiência</option>
                                            <option value="básico" {{ $language->level == "básico" ? 'selected' : '' }}>Básico</option>
                                            <option value="intermediário" {{ $language->level == "intermediário" ? 'selected' : '' }}>Intermediário</option>
                                            <option value="avançado" {{ $language->level == "avançado" ? 'selected' : '' }}>Avançado</option>
                                            <option value="fluente" {{ $language->level == "fluente" ? 'selected' : '' }}>Fluente</option>
                                        </select>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark">
                        <i class="fas fa-save me-2"></i>Salvar Currículo
                    </button>
                  </div>
                </form>
            </div>