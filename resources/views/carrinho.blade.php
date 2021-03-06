@extends('layouts.app')

@section('content')
<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
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
							<form method="POST" action="{{ route('carrinho.updateCarrinho') }}">
								
								@csrf
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
										<script>
											const totalValueTds = [];
											const valores = [];
											const quantidades = [];
										</script>
										@foreach ($carrinho->produtos as $k => $produto)
										<tr>
											<td class="product-col">
												<img src="{{url('storage/produto/'."{$produto->imagem}")}}" alt="">
												<div class="pc-title">
													<h4>{{ $produto->nome }}</h4>
													<p>{{ str_replace('.', ',' ,money_format('R$ %.2n', $produto->valor))}}</p>
												</div>
											</td>
											<td class="quy-col">
												<div class="quantity">
													<div class="pro-qty carrinho" id="pro-qtd{{$k}}">
														<input class="qtd" name="produto[{{$k}}][quantidade]" value="{{ $produto->pivot->quantidade }}" id="qtd">
													</div>
													<input hidden  name="produto[{{$k}}][produto]" value="{{ $produto->id }}">
												</div>
											</td>
											<td class="size-col"><h4>{{ $produto->sizePerModelo($produto->pivot->modelo_id) }}</h4></td>
											<td class="total-col" id="totalValue{{$k}}"></td>
											<td class="total-col">
												<a class="btn" href="{{route('carrinho.rmvProduto' ,[$carrinho->id, $produto->pivot->modelo_id ,$produto->id])}}">
													<img src="/public-assets/img/delIcon.png" alt=""/>
												</a>
											</td>
										</tr>
										<script>
											// {{ str_replace('.', ',' ,money_format('R$ %.2n', $produto->valor * $produto->pivot->quantidade)) }}
											var key = {!! $k !!}
											var proQty = $('#pro-qtd' + key);
											valores.push({!! $produto->valor !!});
											quantidades.push({!! $produto->pivot->quantidade !!});
											proQty.prepend(`<span onclick="dec(${key})" id="dec${key}" class="dec qtybtn">-</span>`);
											proQty.append(`<span onclick="inc(${key})" id="inc${key}" class="inc qtybtn">+</span>`);
											totalValueTds.push($('#totalValue' + key));
											totalValueTds[key].html(`<h4>R$ ${((valores[key] * quantidades[key]).toFixed(2)).toString().replace('.', ',')}</h4>`);
											
											function inc(key) {
												quantidades[key] += 1;
												totalValueTds[key].html(`<h4>R$ ${((valores[key] * quantidades[key]).toFixed(2)).toString().replace('.', ',')}</h4>`);
												somarTudo();
											}

											function dec(key) {
												
												if (quantidades[key] > 1) {
													quantidades[key] -= 1;
												} else {
													quantidades[key] = 1;
												}
												totalValueTds[key].html(`<h4>R$ ${((valores[key] * quantidades[key]).toFixed(2)).toString().replace('.', ',')}</h4>`);
												somarTudo();
											}
										</script>
										@endforeach
										
									</tbody>
							</table>
						</div>
						<div class="total-cost">
							<h6>Total <span class="valorTotal"></span></h6>
						</div>
					</div>
				</div>
				<div class="col-lg-4 card-right">
					<button type="submit"  class="site-btn">Concluir compra</button>
					<a href="{{ route('produtos.catalogo') }}" class="site-btn sb-dark">Continuar comprando</a>
				</div>
			</form>
			</div>
		</div>
		<div id="paypal-button-container"></div>
		<script>
				//{{ str_replace('.', ',' ,money_format('R$ %.2n',$carrinho->valorTotal())) }}
				function somarTudo() {
					var total = 0;
					valores.forEach((valor, index) => {
						total += (valor * quantidades[index])
					});
					
					$('.valorTotal').html(`R$ ${((total).toFixed(2)).toString().replace('.', ',')}`);
				}
				somarTudo()
		</script>
	
</section>
	<!-- cart section end -->

		
@endsection