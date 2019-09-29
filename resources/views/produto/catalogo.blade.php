@extends('layouts.app')

@section('content')

<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>CAtegory PAge</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Categorias</h2>
						<ul class="category-menu">
							@foreach ($categorias as $categoria)
							<li>
							<a href="#">{{ucfirst($categoria->nome)}}<span>({{ $categoria->produtos()->count() }})</span></a>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">COR</h2>
						<div class="fw-color-choose">
							<div class="cs-item">
								<input type="radio" name="cs" id="gray-color">
								<label class="cs-gray" for="gray-color">
									<span>(3)</span>
								</label>
							</div>
						</div>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">Tamanho</h2>
						<div class="fw-size-choose">
							<div class="sc-item">
								<input type="radio" name="sc" id="xs-size">
								<label for="xs-size">XS</label>
							</div>
						</div>
					</div>
					<div class="filter-widget">
						<h2 class="fw-title">Brand</h2>
						<ul class="category-menu">
							@foreach ($marcas as $marca)
								<li><a href="#">{{ ucfirst($marca->nome) }}<span>({{ $marca->produtos()->count() }})</span></a></li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
							@foreach ($produtos as $produto)
							<div class="col-lg-4 col-sm-6">
								<div class="product-item">
									<div class="pi-pic">
										<div class="tag-sale">
											@if ($produto->quantidadeTotal() > 0)
												Disponível
											@else
												Fora de estoque
											@endif
										</div>
									<a href="{{ route('produtos.show', $produto->id) }}"><img src="{{url('storage/produto/'."{$produto->imagem}")}}" alt="Imagem do produto"></a>
										<div class="pi-links">
											<a href="{{ route('produtos.show', $produto->id) }}" class="add-card"><i class="flaticon-bag"></i><span>ADD AO CARRINHO</span></a>
										</div>
									</div>
									<div class="pi-text">
										<h6>R${{ $produto->valor }}</h6>
										<p>{{ $produto->nome }}</p>
									</div>
								</div>
							</div>
							@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->
@endsection