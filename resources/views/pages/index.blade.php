@extends("layouts.main")
@section("title","CVLineJobs")
@section("content")
<section class="home-section home-fade home-full-height bg-dark-60 landing-header" id="home" data-background="assets/images/landing/slide-bg/{{ $slide->image }}">
        <div class="titan-caption">
          <div class="caption-content">
            <div class="container">
              <div class="font-alt mb-30 titan-title-size-2 " aria-label="{{ $slide->title }}"><strong>{{ $slide->title }}</strong></div>
              <div class="font-alt">{{ $slide->description }}</div>
              <div class="font-alt mt-30"><a class="btn btn-border-w btn-circle" href="{{ route('login') }}"><i class="fa fa-sign-in"></i> {{ $slide->button }}</a></div>
            </div>
          </div>
        </div>
      </section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2" style="margin-top: -38px;">
            <img width="100%" class="img-responsive banner-img" src="/assets/images/landing/slide-bg/cvs.png">
          </div>
        </div>
      </div>
      <div class="main">
        <section class="module-medium" id="about">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <h2 class="module-title font-alt" aria-label="Bem-Vindo a CVLineJobs">Bem-Vindo a CVLineJobs</h2>
                <div class="module-subtitle font-serif large-text">Aceda à nossa plataforma e comece a criar currículos modernos, bem estruturados e prontos para impressão ou envio digital.
                    Simples, rápido e disponível onde estiver.
                  <div class="text-center">
                    <div class="btn-group mt-30"><a class="btn btn-border-d btn-circle" href="#"><i class="fa fa-pencil"></i> Preencher</a><a class="btn btn-border-d btn-circle" href="#"><i class="fa fa-search"></i> Escolher Modelos</a><a class="btn btn-border-d btn-circle" href="#"><i class="fa fa-download"></i> Baixar</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section id="sobre-nos" class="module pb-0 bg-dark landing-reason parallax-bg" data-background="/assets/images/landing/why_choose_bg.png">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 mb-2">
                <img aria-label="cvlinejobs" src="/assets/images/landing/logos/{{ $about->image }}" style="border-radius: 8px 8px 0px 0px;" height="300px" alt="">
              </div>
              <div class="col-sm-6">
                <h2 class="module-title font-serif align-left" style="margin-bottom: -2px;">{{ $about->title }}</h2>
                {!! $about->description !!}
              </div>
            </div>
          </div>
        </section>
        <section class="module" id="alt-features">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Destaques dos nossos currículos</h2>
                <div class="module-subtitle font-serif">
                  Desenvolvidos para aumentar suas chances no mercado de trabalho, nossos currículos unem design moderno, estrutura estratégica e tecnologia inteligente — tudo para destacar o melhor de você.
                </div>
              </div>
            </div>
            <div class="row">
              <!-- Primeira coluna de funcionalidades -->
              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="alt-features-item">
                  <div class="alt-features-icon"><span class="icon-strategy"></span></div>
                  <h3 class="alt-features-title font-alt">Design Exclusivo</h3>
                  Modelos visualmente atrativos e modernos, criados para impressionar recrutadores à primeira vista.
                </div>
                <div class="alt-features-item">
                  <div class="alt-features-icon"><span class="icon-tools-2"></span></div>
                  <h3 class="alt-features-title font-alt">100% Personalizável</h3>
                  Edite cores, fontes, seções e layout com total liberdade para refletir sua identidade profissional.
                </div>
                <div class="alt-features-item">
                  <div class="alt-features-icon"><span class="icon-target"></span></div>
                  <h3 class="alt-features-title font-alt">Estrutura Estratégica</h3>
                  Organização inteligente do conteúdo para valorizar suas experiências, competências e resultados.
                </div>
                <div class="alt-features-item">
                  <div class="alt-features-icon"><span class="icon-tools"></span></div>
                  <h3 class="alt-features-title font-alt">Foco em Performance</h3>
                  Currículos otimizados para plataformas de recrutamento e análise automatizada (ATS-friendly).
                </div>
              </div>

              <!-- Imagem ilustrativa -->
              <div class="col-md-6 col-lg-6 hidden-xs hidden-sm">
                <div class="alt-services-image align-center">
                  <img src="/assets/images/landing/cv/img-00.png" alt="Imagem da Plataforma">
                </div>
              </div>

              <!-- Segunda coluna de funcionalidades -->
              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="alt-features-item">
                  <div class="alt-features-icon"><span class="icon-camera"></span></div>
                  <h3 class="alt-features-title font-alt">Versão PDF Profissional</h3>
                  Geração instantânea de currículos em PDF de alta qualidade, prontos para enviar e imprimir.
                </div>
                <div class="alt-features-item">
                  <div class="alt-features-icon"><span class="icon-mobile"></span></div>
                  <h3 class="alt-features-title font-alt">Compatível com Dispositivos</h3>
                  Acesse, edite e salve seu currículo de qualquer lugar, em qualquer dispositivo.
                </div>
                <div class="alt-features-item">
                  <div class="alt-features-icon"><span class="icon-linegraph"></span></div>
                  <h3 class="alt-features-title font-alt">Análises Inteligentes</h3>
                  Feedback automático sobre pontos fortes e melhorias no seu currículo.
                </div>
                <div class="alt-features-item">
                  <div class="alt-features-icon"><span class="icon-basket"></span></div>
                  <h3 class="alt-features-title font-alt">Modelos Gratuitos e Premium</h3>
                  Escolha entre modelos gratuitos e opções premium desenvolvidas por especialistas de RH.
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="module-small free-trial">
          <div class="container text-center">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <h2 class="font-alt">Experimente grátis por &nbsp;<span class="color-golden">15 dias</span></h2>
                <p class="color-light font-15">
                  Crie um currículo profissional com aparência de alto nível. Teste todos os nossos recursos sem compromisso e eleve seu perfil no mercado.
                </p>
              </div>
            </div>
            <div><a class="btn btn-warning btn-circle" href="https://wa.me/+244953360530?text=Solicitação+de+teste+da+plataforma+cvlinejobs+para+minha+empresa" rel="external" target="_blank">Solicitar Teste Gratís</a></div>
          </div>
        </section>

        <section id="planos-&-servicos">
          <div class="container">
            <div class="row landing-image-text mb-20">
              <div class="col-sm-6 col-sm-push-6">
                <img class="center-block" src="/assets/images/landing/slide-bg/cvs.png" alt="Currículo Profissional em um iPad">
              </div>
              <div class="col-sm-6 col-sm-pull-6">
                <h2 class="font-alt">Plano Profissional – Apenas 5.000,00 Kz/mês</h2>
                <p class="font-serif">
                  Dê o próximo passo na sua carreira com nosso plano premium. Por apenas <strong>5.000,00 Kz mensais</strong>, você terá acesso total a todos os recursos avançados da plataforma para criar um currículo de alto impacto e se destacar entre os concorrentes.
                </p>
                <ul>
                  <li><strong>Currículos modernos</strong> com aparência profissional e atrativa</li>
                  <li><strong>Modelos Profissionais</strong> com cores, fontes e seções à sua escolha</li>
                  <li><strong>Geração de PDF profissional</strong> pronto para impressão e envio</li>
                  {{--<li><strong>Oportunidades de Emprego</strong> encontra o seu emprego dos sonhos</li>--}}
                  <li><strong>Feedback inteligente</strong> com sugestões para melhorar seu currículo</li>
                  <li><strong>Acesso ilimitado</strong> a modelos premium e novas atualizações</li>
                  <li><strong>Compatível com recrutadores e sistemas automáticos (ATS)</strong></li>
                  <li><strong>Suporte prioritário</strong> para tirar dúvidas e melhorar ainda mais seu perfil</li>
                </ul>
                <a class="btn btn-primary btn-circle" href="#">Ativar Plano Premium</a>
              </div>
            </div>
          </div>
        </section>
        <section id="parceiros-&-clientes"  class="module bg-dark parallax-bg landing-screenshot" data-background="/assets/images/landing/slide-bg/home-bg-01.jpg">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Parceiros & Cliêntes</h2>
                <div class="module-subtitle font-serif">Essas instituições e marcas caminham connosco na missão de ajudar mais pessoas a apresentarem-se com profissionalismo.</div>
              </div>
            </div>
            <div class="row client">
              <div class="owl-carousel text-center" data-items="4" data-pagination="true" data-navigation="false">
                @foreach ($companys as $partner)
                    <div class="owl-item">
                        <div class="col-sm-12"><img src="{{ asset('adm/img/companys/logotipos/' . $partner->image) }}" height="300px"></div>
                    </div>
                @endforeach
              </div>
            </div>
          </div>
        </section>
        <section class="module download pb-0">
          <div class="container text-center">
            <h2 class="module-title font-alt">Ainda está à espera de quê?</h2>
            <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <p class="module-subtitle">
                  Comece hoje a construir o seu currículo de forma inteligente, prática e com design profissional. A nossa plataforma foi desenvolvida para ajudar você a impressionar recrutadores e conquistar as melhores oportunidades no mercado de trabalho.
                </p>
              </div>
            </div>
            <img src="/assets/images/landing/logos/cvlinejobs-w.png" style="margin-top: -20px;" alt="Mockup da Plataforma">
          </div>
        </section>
@endsection