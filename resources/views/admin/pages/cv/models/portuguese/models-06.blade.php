<section>
    <div class="design-16">
        <div class="design-16-content">
            <div class="section-16-lados">
                <!-- Lado Direito -->
                <div class="section-16-right">
                    <div class="img-perfil">
                        @include("admin.pages.cv.models.partials.img-profile")
                    </div>

                    <div class="description">
                        <div class="description-item">
                            <h2>Pessoal</h2>
                            <ul>
                                <li><span>NIF:</span> {{ session('curriculo')['documento'] }}</li>
                                <li><span>Género:</span> {{ session('curriculo')['genero'] }}</li>
                                <li><span>Data de Nascimento:</span> {{ date('d/m/Y', strtotime(session('curriculo')['data_nascimento'])) }}</li>
                            </ul>
                        </div>

                        <div class="description-item">
                            <h2>Perfil</h2>
                            <p>{{ session('curriculo')['perfil_profissional'] }}</p>
                        </div>

                        <div class="description-item">
                            <h2>Idiomas</h2>
                            <ul>
                                @foreach (session('curriculo')['idiomas'] as $idioma)
                                    <li>{{ $idioma['nome'] }} - {{ ucfirst($idioma['nivel']) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Lado Esquerdo -->
                <div class="section-16-left">
                    <div class="name">
                        <h4>{{ session('curriculo')['nome'] }}</h4>
                    </div>

                    <div class="section-16-items">
                        <div class="section-16-item">
                            <h2>Formação Académica</h2>
                            <ul>
                                <li><strong>Curso:</strong> {{ session('curriculo')['curso'] }}</li>
                                <li><strong>Instituição:</strong> {{ session('curriculo')['instituicao'] }}</li>
                                <li><strong>Duração:</strong> {{ session('curriculo')['inicio_formacao'] }} - {{ session('curriculo')['fim_formacao'] }}</li>
                                <li><strong>Classe:</strong> {{ session('curriculo')['classe'] }}</li>
                            </ul>
                        </div>

                        <div class="section-16-item">
                            <h2>Experiência Profissional</h2>
                            <ul>
                                @foreach (session('curriculo')['experiencias'] as $exp)
                                    <li>
                                        <strong>{{ $exp['empresa'] }}</strong> - {{ $exp['cargo'] }}<br>
                                        <small>{{ $exp['inicio'] }} - {{ $exp['fim'] }}</small><br>
                                        <em>{{ $exp['descricao'] }}</em>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="section-16-item">
                            <h2>Habilidades</h2>
                            <ul>
                                @foreach (session('curriculo')['habilidades'] as $habilidade)
                                    <li>{{ $habilidade }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="section-16-item">
                            <h2>Contactos</h2>
                            <ul>
                                <li><strong>Email:</strong> {{ session('curriculo')['email'] }}</li>
                                <li><strong>Telefone:</strong> {{ session('curriculo')['telefone'] }}</li>
                                <li><strong>Endereço:</strong> {{ session('curriculo')['endereco'] }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
