@extends('layouts.app')

@section('content')
	<div id="preloder">
		<div class="loader"></div>
	</div>
    <!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Carrinho</h4>
			<div class="site-pagination">
				<a href="{{ route('home') }}">Pagina inicial</a> /
				<a href="{{ route('carrinho.carrinho') }}">Carrinho</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Carrinho</h3>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr>
									<th class="product-th">Produto</th>
									<th class="quy-th">Quantidade</th>
									<th class="size-th">Tamanho</th>
									<th class="total-th">Preço</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($carrinho->produtos as $produto)
								<tr>
									<td class="product-col">
										<img src="{{url('storage/produto/'."{$produto->imagem}")}}" alt="">
										<div class="pc-title">
											<h4>{{ $produto->nome }}</h4>
											<p>{{ $produto->valor }}</p>
										</div>
									</td>
									<td class="quy-col">
										<div class="quantity">
											<div class="pro-qty">
											<input type="text" value="{{ $produto->pivot->quantidade }}">
											</div>
                    					</div>
									</td>
									<td class="size-col"><h4>{{ $produto->sizePerModelo($produto->pivot->modelo_id) }}</h4></td>
									<td class="total-col"><h4>R$ {{ $produto->valor }}</h4></td>
									<td class="total-col">
										<form action="{{route('carrinho.rmvProduto' ,[$carrinho->id, $produto->pivot->modelo_id ,$produto->id])}}" method="POST">
													{{ method_field('DELETE') }}
													{{ csrf_field() }}
													<button class="btn"><img src="/public-assets/img/delIcon.png" alt=""/></button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<h6>Total <span>R$ {{ $carrinho->valorTotal() }}</span></h6>
						</div>
					</div>
				</div>
				<div class="col-lg-4 card-right">
					<a href="{{ route('checkoutPage') }}" class="site-btn">Concluir compra</a>
					<a href="{{ route('produtos.catalogo') }}" class="site-btn sb-dark">Continuar comprando</a>
				</div>
			</div>
		</div>
		<div id="paypal-button-container"></div>

		
	</section>
	<!-- cart section end -->

	<script
    src="https://www.paypal.com/sdk/js?client-id=SB_CLIENT_ID">
  </script>

  <div id="paypal-button-container"></div>
  <script>
		paypal.Buttons({
		  createOrder: function(data, actions) {
			// Set up the transaction
			return actions.order.create({
			  purchase_units: [{
				amount: {
				  value: '0.01'
				}
			  }]
			});
		  }
		}).render('#paypal-button-container');
	  </script>
  <script>
    paypal.Buttons().render('#paypal-button-container');
  </script>
	<!-- Related product section end -->
@endsection