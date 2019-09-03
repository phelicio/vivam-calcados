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
	<link href="public-assets/img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="public-assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="public-assets/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="public-assets/css/flaticon.css"/>
	<link rel="stylesheet" href="public-assets/css/slicknav.min.css"/>
	<link rel="stylesheet" href="public-assets/css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="public-assets/css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="public-assets/css/animate.css"/>
	<link rel="stylesheet" href="public-assets/css/style.css"/>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        <!-- Header section -->
        <header class="header-section">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 text-center text-lg-left">
                            <!-- logo -->
                            <a href="./index.html" class="site-logo">
                                <img src="public-assets/img/logo.png" alt="">
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-5">
                            <form class="header-search-form">
                                <input type="text" placeholder="Pesquisar">
                                <button><i class="flaticon-search"></i></button>
                            </form>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="user-panel">
                                <div class="up-item">
                                    <i class="flaticon-profile"></i>
                                <a href="{{ route('login') }}">Entrar</a> ou <a href="{{ route('register') }}">Criar conta</a>
                                </div>
                                <div class="up-item">
                                    <div class="shopping-card">
                                        <i class="flaticon-bag"></i>
                                        <span>0</span>
                                    </div>
                                    <a href="#">Carrinho</a>
                                </div>
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
                        <li><a href="#">Femininos</a></li>
                        <li><a href="#">Masculinos</a></li>
                        <li><a href="#">Infantis</a></li>
                        <li><a href="#">Sobre Nós</a></li>
                        <li><a href="#">Contato</a></li>
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
                    <a href="index.html"><img src="public-assets/img/logo-light.png" alt=""></a>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget about-widget">
                            <h2>About</h2>
                            <p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
                            <img src="public-assets/img/cards.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget about-widget">
                            <h2>Questions</h2>
                            <ul>
                                <li><a href="">About Us</a></li>
                                <li><a href="">Track Orders</a></li>
                                <li><a href="">Returns</a></li>
                                <li><a href="">Jobs</a></li>
                                <li><a href="">Shipping</a></li>
                                <li><a href="">Blog</a></li>
                            </ul>
                            <ul>
                                <li><a href="">Partners</a></li>
                                <li><a href="">Bloggers</a></li>
                                <li><a href="">Support</a></li>
                                <li><a href="">Terms of Use</a></li>
                                <li><a href="">Press</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget about-widget">
                            <h2>Questions</h2>
                            <div class="fw-latest-post-widget">
                                <div class="lp-item">
                                    <div class="lp-thumb set-bg" data-setbg="public-assets/img/blog-thumbs/1.jpg"></div>
                                    <div class="lp-content">
                                        <h6>what shoes to wear</h6>
                                        <span>Oct 21, 2018</span>
                                        <a href="#" class="readmore">Read More</a>
                                    </div>
                                </div>
                                <div class="lp-item">
                                    <div class="lp-thumb set-bg" data-setbg="public-assets/img/blog-thumbs/2.jpg"></div>
                                    <div class="lp-content">
                                        <h6>trends this year</h6>
                                        <span>Oct 21, 2018</span>
                                        <a href="#" class="readmore">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget contact-widget">
                            <h2>Questions</h2>
                            <div class="con-info">
                                <span>C.</span>
                                <p>Your Company Ltd </p>
                            </div>
                            <div class="con-info">
                                <span>B.</span>
                                <p>1481 Creekside Lane  Avila Beach, CA 93424, P.O. BOX 68 </p>
                            </div>
                            <div class="con-info">
                                <span>T.</span>
                                <p>+53 345 7953 32453</p>
                            </div>
                            <div class="con-info">
                                <span>E.</span>
                                <p>office@youremail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social-links-warp">
                <div class="container">
                    <div class="social-links">
                        <a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
                        <a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
                        <a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
                        <a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
                        <a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
                        <a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
                        <a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
                    </div>

    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
    <p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                </div>
            </div>
        </section>
	<!-- Footer section end -->
        
        
        
            <!--====== Javascripts & Jquery ======-->
            <script src="public-assets/js/jquery-3.2.1.min.js"></script>
            <script src="public-assets/js/bootstrap.min.js"></script>
            <script src="public-assets/js/jquery.slicknav.min.js"></script>
            <script src="public-assets/js/owl.carousel.min.js"></script>
            <script src="public-assets/js/jquery.nicescroll.min.js"></script>
            <script src="public-assets/js/jquery.zoom.min.js"></script>
            <script src="public-assets/js/jquery-ui.min.js"></script>
            <script src="public-assets/js/main.js"></script>
        
</body>
</html>
