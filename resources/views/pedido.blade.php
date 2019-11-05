@extends('layouts.app')
@section('content')

<div class="container m-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="cart-table">
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
                                @foreach ($venda->produtos as $k => $produto)
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
                                                {{ $produto->pivot->quantidade }}
                                        </div>
                                    </td>
                                    <td class="size-col"><h4>{{ $produto->sizePerModelo($produto->pivot->modelo_id) }}</h4></td>
                                    <td class="total-col"><h4>{{ str_replace('.', ',' ,money_format('R$ %.2n', $produto->valor * $produto->pivot->quantidade)) }}</h4></td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
                <div class="total-cost">
                    <h6>Total <span>{{ str_replace('.', ',' ,money_format('R$ %.2n',$venda->valorTotal())) }}</span></h6>
                </div>
        </div>
    </div>
</div>
 
</div>

@endsection
