@extends('layouts.app')

@section('content')

	<div id="preloder">
		<div class="loader"></div>
	</div>
<!-- Page info -->

	<div class="page-top-info">
		<div class="container">
			<h4>Catalogo</h4>
			<div class="site-pagination">
				<a href="">Página Inicial</a> /
				<a href="">Loja</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->
	<div class="container">

		@if($mensagem = Session::get('mensagemSucesso'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-check"></i>{{$mensagem}}</h4>
		</div>
		@endif
		
		@if($mensagem = Session::get('mensagemErro'))
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-erro"></i>{{$mensagem}}</h4>
		</div>
		@endif
	</div>
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
							<a href="{{ route('produtos.catalogo').'?categoria='.$categoria->nome }}">{{ucfirst($categoria->nome)}}<span>({{ $categoria->produtos()->count() }})</span></a>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">Cor</h2>
						<div class="fw-color-choose">
							@foreach ($cores as $cor)
								<div class="cs-item">
									<input type="radio" name="cor" value="{{$cor->cor}}"  name="cor" id="{{ $cor->cor }}-cor">
									<label style="background-color={{$cor->html}};" for="{{ $cor->cor }}-cor"></label>
								</div>
							@endforeach
						</div>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">Tamanho</h2>
						<div class="fw-size-choose">
							@foreach ($tamanhos as $tamanho)
								<div class="sc-item">
									<input type="radio" name="tamanho" value="{{$tamanho->tamanho}}" id="{{ $tamanho->tamanho }}-tamanho">
									<label for="{{ $tamanho->tamanho }}-tamanho">{{ $tamanho->tamanho }}</label>
								</div>
							@endforeach
						</div>
					</div>
					<div class="filter-widget">
						<h2 class="fw-title">Marcas</h2>
						<ul class="category-menu">
							@foreach ($marcas as $marca)
								<li><a href="#">{{ ucfirst($marca->nome) }}<span>({{ $marca->produtos()->count() }})</span></a></li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
							@if (!empty($produtos))
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
							@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->
@endsection