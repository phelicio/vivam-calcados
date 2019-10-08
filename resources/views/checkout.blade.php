@extends('layouts.app')

@section('content')
    <!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Your cart</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Your cart</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form action="{{ route('checkout') }}" method="POST" class="checkout-form">
						@csrf
						<div class="cf-title">Billing Address</div>
						<div class="row">
							<div class="col-md-7">
								<p>*Billing Information</p>
							</div>
							<div class="col-md-5">
								<div class="cf-radio-btns address-rb">
									<div class="cfr-item">
										<input type="radio" name="pm" id="one">
										<label for="one">Use my regular address</label>
									</div>
									<div class="cfr-item">
										<input type="radio" name="pm" id="two">
										<label for="two">Use a different address</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row address-inputs">
							<div class="col-md-12">
								<input type="text" placeholder="Address">
								<input type="text" placeholder="Address line 2">
								<input type="text" placeholder="Country">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Zip code">
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Phone no.">
							</div>
						</div>
						<div class="cf-title">Entrega</div>
						<div class="row shipping-btns">
							<div class="col-6">
								<h4>Standard</h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" id="ship-1">
										<label for="ship-1">Free</label>
									</div>
								</div>
							</div>
							<div class="col-6">
								<h4>Next day delievery  </h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" id="ship-2">
										<label for="ship-2">$3.45</label>
									</div>
								</div>
							</div>
						</div>
						<div class="cf-title">Pagamento</div>
						<ul class="payment-list">
							<li>Boleto<a href="#"><img src="/public-assets/img/icons/icon.png" alt=""></a></li>
							<li>Cartão de Credito<a href="#"><img src="/public-assets/img/icons/credit-card.png" alt=""></a></li>
						</ul>
						<button class="site-btn submit-order-btn">Concluir Compra</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Seu Carrinho</h3>
						<ul class="product-list">
						@foreach ($carrinho->produtos as $produto)
							<li>
							<div class="pl-thumb"><img src="{{ url('/storage/produto/') }}/{{ $produto->imagem }}" alt=""></div>
								<h6>{{ $produto->nome }}</h6>
								<p>R${{ $produto->valor }}</p>
							</li>
						@endforeach
						<ul class="price-list">
							<li class="total">Total<span>R${{$carrinho->valorTotal()}}</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- checkout section end -->
@endsection