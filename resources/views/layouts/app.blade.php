<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Vivam Calçados</title>
	<meta charset="UTF-8">
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="/public-assets/img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="/public-assets/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="/public-assets/css/flaticon.css"/>
	<link rel="stylesheet" href="/public-assets/css/slicknav.min.css"/>
	<link rel="stylesheet" href="/public-assets/css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="/public-assets/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="/public-assets/css/animate.css"/>
	<link rel="stylesheet" href="/public-assets/css/style.css"/>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="/public-assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="/public-assets/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Page Preloder -->
	    
        <!-- Header section -->
        <header class="header-section">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 text-center text-lg-left">
                            <!-- logo -->
                        <a href="{{ route('home') }}" class="site-logo">
                                <img src="/public-assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-5">
                        <form  method="GET" action="{{ route('produtos.catalogo') }}" class="header-search-form">
                                <input type="text" name="search" placeholder="Pesquisar">
                                <button><i class="flaticon-search"></i></button>
                            </form>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="user-panel">
                                @if (Auth::user())
                                <div class="dropdown" style="display:inline-block" >
                                        <button class="btn dropdown-toggle" style="background-color: transparent;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="flaticon-profile"></i>
                                                Olá, {{explode(" ", Auth::user()->name)[0]}}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="{{ route('enderecos') }}">Endereços</a>
                                        </div>
                                </div>
                               
                                <div class="up-item">
                                    <div class="shopping-card">
                                        <i class="flaticon-bag"></i>
                                        <a href="{{ route('carrinho.carrinho') }}">Carrinho</a>
                                    <span>{{ Auth::user()->carrinho->produtos()->count() }}</span>
                                    </div>
                                </div>
                                @else
                                <div class="up-item">
                                    <i class="flaticon-profile"></i>
                                    <a href="{{ route('login') }}">Entrar</a> ou <a href="{{ route('register') }}">Criar conta</a>
                                </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="main-navbar">
                <div class="container">
                    <!-- menu -->
                    <ul class="main-menu">
                        <li><a href="#">Página Inicial</a></li>
                    <li><a href="{{route('produtos.catalogo').'?categoria=feminino'}}">Femininos</a></li>
                        <li><a href="{{route('produtos.catalogo').'?categoria=masculino'}}">Masculinos</a></li>
                        <li><a href="{{route('produtos.catalogo').'?categoria=infantil'}}">Infantis</a></li>
                        <li><a href="{{route('sobre')}}">Sobre Nós</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Header section end -->
        <div>
            @yield('content')
        </div>
            
        <!-- Footer section -->
        <section class="footer-section">
            <div class="container">
                <div class="footer-logo text-center">
                    <a href="{{ route('home') }}"><img width="40%" src="/public-assets/img/logo-light.png" alt=""></a>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget about-widget">
                            <h2>Sobre</h2>
                            <p>A Vivam Calçados é um sistema onde busca explorar o mercado de Ecommerce 
                                na área da venda de calçados com o foco principal no gênero feminino, na região do Cariri.</p>
                            <img src="/public-assets/img/cards.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget contact-widget">
                            <h2>Contato</h2>
                            <div class="con-info">
                                <span></span>
                                <p>Vivam Calçados</p>
                            </div>
                            <div class="con-info">
                                <span>Endereço</span>
                                <p>AV. Padre Cicero, N 152, Juazeiro do Norte - CE</p>
                            </div>
                            <div class="con-info">
                                <span>Telefone</span>
                                <p>+55 (88) 99308-1441</p>
                            </div>
                            <div class="con-info">
                                <span>Email</span>
                                <p>suporte@vivam.online</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social-links-warp">
                <div class="container">
                

    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
    <p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | Template desenvolvido por: Colorlib <i class="fa fa-heart-o" aria-hidden="true"></i>  <a href="https://colorlib.com" target="_blank"></a></p>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                </div>
            </div>
        </section>
	<!-- Footer section end -->
        
        
        
            <!--====== Javascripts & Jquery ======-->
            <script src="/public-assets/js/jquery-3.2.1.min.js"></script>
            <script src="/public-assets/js/bootstrap.min.js"></script>
            <script src="/public-assets/js/jquery.slicknav.min.js"></script>
            <script src="/public-assets/js/owl.carousel.min.js"></script>
            <script src="/public-assets/js/jquery.nicescroll.min.js"></script>
            <script src="/public-assets/js/jquery.zoom.min.js"></script>
            <script src="/public-assets/js/jquery-ui.min.js"></script>
            <script src="/public-assets/js/main.js"></script>
        
</body>
</html>
