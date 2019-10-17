@extends('layouts.app')

@section('content')
<div id="preloder">
		<div class="loader"></div>
</div>
<section class="hero-section">
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="public-assets/img/bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 text-white">
                        <span>Novos Produtos</span>
                        <h2>Tênis Solly</h2>
                        <p>Novo lançamento do Tênis Solly com o melhor designer da linha e a melhor performance para os seus pés. Aproveite essa promoção, pois e por tempo limitado. </p>
                        <a href="{{ route('produtos.catalogo') }}" class="site-btn sb-line">VISUALIZAR</a>
                    </div>
                </div>
                <div class="offer-card text-white">
                    <span>APENAS</span>
                    <h2>$90</h2>
                    <p>COMPRE JÁ</p>
                </div>
            </div>
        </div>
        <div class="hs-item set-bg" data-setbg="public-assets/img/bg-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 text-white">
                        <span>Novos Produtos</span>
                        <h2>Sandálias Currulepe</h2>
                        <p>Pra você que gosta de sandalias regionais do nordeste, chegou as sandalias de couro Currulepe, com designer arrojado sem perder a cultura nordestina. </p>
                        <a href="#" class="site-btn sb-line">VISUALIZAR</a>
                    </div>
                </div>
                <div class="offer-card text-white">
                    <span>APENAS</span>
                    <h2>$69</h2>
                    <p>COMPRE JÁ</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="slide-num-holder" id="snh-1"></div>
    </div>
</section>
	<!-- Features section -->
	<section class="features-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="public-assets/img/icons/1.png" alt="#">
						</div>
						<h2>Pagamento Rápido</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="public-assets/img/icons/2.png" alt="#">
						</div>
						<h2>Produtos Premium</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="public-assets/img/icons/3.png" alt="#">
						</div>
						<h2>Entrega em 24hrs Grátis</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->


	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>PRODUTOS RECENTES</h2>
			</div>
			<div class="product-slider owl-carousel">
				@foreach ($produtosRecentes as $produto)
					<div class="product-item">
						<div class="pi-pic">
							<img src="{{url('storage/produto/'."{$produto->imagem}")}}" alt="">
							<div class="pi-links">
							<a href="{{ route('produtos.show', $produto->id) }}" class="add-card"><i class="flaticon-bag"></i><span>ADD AO CARRINHO</span></a>
							</div>
						</div>
						<div class="pi-text">
						<h6>R${{ $produto->valor }}</h6>
							<p>{{ $produto->nome }}</p>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- letest product section end -->



	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>CATEGORIAS</h2>
			</div>
			<ul class="product-filter-menu">
				@foreach ($categorias as $categoria)
			<li><a href="{{ route('produtos.catalogo')."?categoria=".$categoria->nome}}">{{ $categoria->nome }}</a></li>
				@endforeach
			</ul>
			<div class="text-center pt-5">
			<a href="{{ route('produtos.catalogo') }}" class="site-btn sb-line sb-dark">MAIS PRODUTOS</a>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->


	<!-- Banner section -->
	<section class="banner-section">
		<div class="container">
			<div class="banner set-bg" data-setbg="/public-assets/img/banner-bg.jpg">
				<div class="tag-new">NOVO</div>
				<span>Novos Produtos</span>
				<h2>SAPATILHAS</h2>
				<a href="{{ route('produtos.catalogo') }}" class="site-btn">COMPRE AGORA</a>
			</div>
		</div>
	</section>
	<!-- Banner section end  -->


@endsection