@extends('layouts.app')

@section('content')
<!-- Page info -->
		<!-- Page info -->
        <div class="page-top-info">
            <div class="container">
                <h4>PRODUTOS</h4>
                <div class="site-pagination">
                    <a href="">Inicio</a> /
                    <a href="">Loja</a>
                </div>
            </div>
        </div>
        <!-- Page info end -->
    
    
        <!-- product section -->
        <section class="product-section">
            <div class="container">
                <div class="back-link">
                <a href="{{ route('produtos.catalogo') }}"> &lt;&lt; Voltar para produtos</a>
                </div>
                <form action="{{ route('carrinho.addProduto') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product-pic-zoom">
                                    <img class="product-big-img" src="{{url('storage/produto/'."{$produto->imagem}")}}" alt="">
                                </div>
                            </div>
                            <input type="text" value="{{ $produto->id }}" name="produto" hidden>
                            <div class="col-lg-6 product-details">
                                <h2 class="p-title">{{$produto->nome}}</h2>
                                <h3 class="p-price">{{ str_replace('.', ',', money_format('R$ %.2n', $produto->valor))}}</h3>
                                @if ($produto->quantidade>0)
                                <h4 class="p-stock"> <span>Disponivel em estoque</span></h4>
                                @endif
                                <div class="fw-size-choose">
                                    <p>Tamanhos</p>
                                    @foreach ($produto->modelos as $modelo)
                                    
                                    @if ($modelo->quantidade > 0)
                                    
                            <div class="sc-item">
                                <input type="radio" name="modelo" value={{ $modelo->id }} id="modelo{{ $modelo->id }}">
                            <label for="modelo{{ $modelo->id }}">{{ $modelo->tamanho }}</label>
                        </div>
                        @else
                                
                        <div class="sc-item disable">
                            <input type="radio" name="sc" id="xl-size" disabled>
                            <label for="xl-size">{{ $modelo->tamanho }}</label>
                        </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="quantity">
                            <p>Quantidade</p>
                            <div class="pro-qty"><input type="text" name="quantidade" value="1"></div>
                        </div>
                        <button  class="site-btn">Adicionar ao carrrinho</button>
                    </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- product section end -->
        
    
        <!-- RELATED PRODUCTS section -->
        <section class="related-product-section">
            <div class="container">
                <div class="section-title">
                    <h2>RELATED PRODUCTS</h2>
                </div>
                <div class="product-slider owl-carousel">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="./img/product/1.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>$35,00</h6>
                            <p>Flamboyant Pink Top </p>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="pi-pic">
                            <div class="tag-new">New</div>
                            <img src="./img/product/2.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>$35,00</h6>
                            <p>Black and White Stripes Dress</p>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="./img/product/3.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>$35,00</h6>
                            <p>Flamboyant Pink Top </p>
                        </div>
                    </div>
                    <div class="product-item">
                            <div class="pi-pic">
                                <img src="./img/product/4.jpg" alt="">
                                <div class="pi-links">
                                    <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                    <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                </div>
                            </div>
                            <div class="pi-text">
                                <h6>$35,00</h6>
                                <p>Flamboyant Pink Top </p>
                            </div>
                        </div>
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="./img/product/6.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
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
        </section>
        <!-- RELATED PRODUCTS section end -->
@endsection