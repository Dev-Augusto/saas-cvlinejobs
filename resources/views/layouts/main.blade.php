<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>@yield("title")</title>
    <!--  
    Favicons
    =============================================
    -->
    <link rel="shortcut icon" href="/assets/images/landing/logos/cvlinejobs.png" type="image/x-icon">
    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="/assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="/assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="/assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="/assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="/assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="/assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="/assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="/assets/css/colors/default.css" rel="stylesheet">
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <nav class="navbar navbar-custom navbar-fixed-top navbar-transparent" role="navigation">
        <div class="container" style="background-color: #0a0a0ae6; border-radius: 8px;">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
              <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
              <span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" aria-label="cvlinejobs" href="{{ route('pages.home') }}">
              <span style="color: #ca1414;">CV</span>Line<span style="color: #55b5e2;">Jobs</span>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('pages.home') }}">Home</a></li>
                <li><a href="#sobre-nos">Sobre Nós</a></li>
                <li><a href="#planos-&-servicos">Planos & Serviços</a></li>
                <li><a href="#parceiros-&-clientes">Parceiros & Cliêntes</a></li>
                <li><a href="#footer">Contactos</a></li>
            </ul>
          </div>
        </div>
      </nav>
        @yield("content")
        <footer id="footer" class="footer bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <p class="copyright font-alt">&copy; 2025&nbsp;<a href="index.html">kuzolatechn</a>, All Rights Reserved</p>
              </div>
              <div class="col-sm-6">
                <div class="footer-social-links">
                    <a href="#"><i class="fa fa-facebook"></i>
                    </a><a href="#"><i class="fa fa-youtube"></i>
                    </a><a href="#"><i class="fa fa-instagram"></i>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
    <!--  
    JavaScripts
    =============================================
    -->
    <script src="/assets/lib/jquery/dist/jquery.js"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/lib/wow/dist/wow.js"></script>
    <script src="/assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
    <script src="/assets/lib/isotope/dist/isotope.pkgd.js"></script>
    <script src="/assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="/assets/lib/flexslider/jquery.flexslider.js"></script>
    <script src="/assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="/assets/lib/smoothscroll.js"></script>
    <script src="/assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
    <script src="/assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/main.js"></script>
  </body>
</html>