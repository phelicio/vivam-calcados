@extends('layouts.app')

@section('content')
<section class="hero-section">
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="public-assets/img/bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 text-white">
                        <span>Novos Produtos</span>
                        <h2>Tênis Solly</h2>
                        <p>Novo lançamento do Tênis Solly com o melhor designer da linha e a melhor performance para os seus pés. Aproveite essa promoção, pois e por tempo limitado. </p>
                        <a href="#" class="site-btn sb-line">VISUALIZAR</a>
                        <a href="#" class="site-btn sb-white">ADD AO CARRINHO</a>
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
                        <a href="#" class="site-btn sb-white">ADD AO CARRINHO</a>
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
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD AO CARRINHO</span></a>
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
				<h2>PRODUTOS MAIS VENDIDOS</h2>
			</div>
			<ul class="product-filter-menu">
				@foreach ($categorias as $categoria)
			<li><a href="{{ route('produtos.catalogo')."?categoria=".$categoria->nome}}">{{ $categoria->nome }}</a></li>
				@endforeach
			</ul>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="public-assets/img/product/5.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD AO CARRINHO</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<div class="tag-sale">ON SALE</div>
							<img src="public-assets/img/product/6.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD AO CARRINHO</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Black and White Stripes Dress</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="public-assets/img/product/7.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD AO CARRINHO</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="public-assets/img/product/8.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD AO CARRINHO</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="public-assets/img/product/9.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD AO CARRINHO</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="public-assets/img/product/10.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD AO CARRINHO</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Black and White Stripes Dress</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="public-assets/img/product/11.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD AO CARRINHO</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<img src="public-assets/img/product/12.jpg" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD AO CARRINHO</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				</div>
			</div>
			<div class="text-center pt-5">
				<button class="site-btn sb-line sb-dark">MAIS PRODUTOS</button>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->


	<!-- Banner section -->
	<section class="banner-section">
		<div class="container">
			<div class="banner set-bg" data-setbg="public-assets/img/banner-bg.jpg">
				<div class="tag-new">NOVO</div>
				<span>Novos Produtos</span>
				<h2>SAPATILHAS</h2>
				<a href="#" class="site-btn">COMPRE AGORA</a>
			</div>
		</div>
	</section>
	<!-- Banner section end  -->


@endsection