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
			<form action="{{route('produtos.catalogo')}}" method="get">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 order-2 order-lg-1">
							<div class="filter-widget">
								<h2 class="fw-title">Categorias</h2>
								<div class="fw-size-choose">
									@foreach ($categorias as $categoria)
										<div class="sc-item">
												<input type="radio" name="categoria" value="{{$categoria->nome}}" id="{{ $categoria->nome }}-categoria"> 
												<label for="{{ $categoria->nome }}-categoria">{{ucfirst($categoria->nome)}}</label>
										</div>
									@endforeach
								</div>
							</div>
							<div class="filter-widget mb-0">
							<h2 class="fw-title">Cor</h2>
							<div class="fw-color-choose">
								@foreach ($cores as $cor)
								<div class="cs-item" >
										<input  type="radio" name="cor" value="{{$cor->nome}}"  name="cor" id="{{ $cor->nome }}-cor">
										<label style="background:{{$cor->html}};" for="{{ $cor->nome }}-cor"></label>
									</div>
									@endforeach
								</div>
							</div>
						<div class="filter-widget mb-0">
							<h2 class="fw-title">Tamanho</h2>
							<div class="fw-size-choose">
								@foreach ($tamanhos as $tamanho)
									<div class="sc-item">
										<input type="radio" name="tamanho" value="{{$tamanho->nome}}" id="{{ $tamanho->nome }}-tamanho">
										<label for="{{ $tamanho->nome }}-tamanho">{{ $tamanho->nome }}</label>
									</div>
								@endforeach
							</div>
						</div>
						<div class="filter-widget">
							<h2 class="fw-title">Marcas</h2>
							<div class="fw-size-choose">
									@foreach ($marcas as $marca)
									<div class="sc-item">
										<input type="radio" name="marca" value="{{$marca->nome}}" id="{{ $marca->nome }}-marca"> 
										<label for="{{ $marca->nome }}-marca">{{ucfirst($marca->nome)}}</label>
									</div>
									@endforeach
								</div>
							</div>
							<button class="btn btn-secondary">Buscar</button>
						</div>
						
					
						<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
							<div class="row">
								@if (!$produtos->isEmpty())
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
										<h6>{{ str_replace('.', ',', money_format('R$ %.2n', $produto->valor))}}</h6>
										<p>{{ $produto->nome }}</p>
									</div>
								</div>
							</div>
							@endforeach
							@endif
						</div>
					</div>
				</div>
			</form>
		</div>
	
	</section>
	<!-- Category section end -->
	@section('css')
		<style>
			.cs-item label{
				display: none;
			}
		</style>
	@endsection
@endsection