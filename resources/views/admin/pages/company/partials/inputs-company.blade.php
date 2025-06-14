                        <div class="card mb-4">
                            <div class="card-header bg-dark text-white">
                                <i class="fas fa-user me-2"></i>Dados Da Empresa
                            </div>
                            <div class="card-body row g-3">
                                <!-- IMAGEM DE PERFIL NA LARGURA DE UMA LINHA -->
                                <div class="col-md-2 d-flex flex-column align-items-start" >
                                <label class="form-label">Logotipo</label>
                                <div class="img-upload-wrapper w-100">
                                    <input type="file" name="foto_perfil" accept="image/*" onchange="previewImagem(this)">
                                    <img id="preview" @if(isset($data->image)) src="{{ asset('adm/img/companys/logotipos/' . $data->image) }}" style="display: block;" @endif alt="Pré-visualização">
                                    <i class="fas fa-camera img-upload-icon"></i>
                                </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                <div class="col-md-5">
                                <label class="form-label">Nome da Empresa</label>
                                <input type="text" class="form-control" name="name" value="{{ $data->name ?? '' }}" placeholder="Ex: Cyber Café, lda" required>
                                </div>
                                <div class="col-md-6">
                                <label class="form-label">NIF da Empresa</label>
                                <input type="text" class="form-control" name="nif" value="{{ $data->nif_number ?? '' }}" placeholder="Ex: 5401144440">
                                </div>
                                <div class="col-md-5">
                                <label class="form-label">Proprietário</label>
                                <input type="text" class="form-control" name="owner" value="{{ $data->owner ?? '' }}" placeholder="Ex: João Marques.." required>
                                </div>
                                <div class="col-md-5">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control" name="email" value="{{ $data->email ?? '' }}" placeholder="Ex: cybercafe@email.com" required>
                                </div>
                                <div class="col-md-5">
                                <label class="form-label">Endereço</label>
                                <input type="text" class="form-control" name="address" value="{{ $data->address ?? ''}}" placeholder="Ex: Rua 7, Bairro Tal, Luanda" required>
                                </div>
                                 <div class="col-md-5">
                                <label class="form-label">Telefone</label>
                                <input type="tel" class="form-control" name="phone" value="{{ $data->phone ?? '' }}" placeholder="Ex: +244 923 456 789" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="w-100 btn bg-gradient-dark">
                        @if(!isset($data))
                            <i class="fas fa-save me-2"></i>Registrar Empresa
                        @else
                            <i class="fas fa-save me-2"></i>Actualizar Empresa
                        @endif
                    </button>
                </div>
