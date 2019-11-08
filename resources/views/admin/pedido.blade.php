@extends('adminlte::page')


@section('content')
<div class="box">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Quantidade</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($venda))
                
                @foreach ($venda->produtos as $produto)
                    <tr>
                        <td>
                            <img src=" {{url('storage/produto/'."{$produto->imagem}")}} " class="card-img-top" alt="...">
                        </td>
                        <td>{{ $produto->pivot->quantidade }}</td>
                        <td>{{ str_replace('.', ',', money_format('R$ %.2n', $produto->valor * $produto->pivot->quantidade))}}</td>
                    </tr>
                @endforeach
            @endif
            <tr>
                <td colspan="2">
                    <h4 class="float-left">Valor Total </h4> 
                </td>
                <td>
                    <span class="float-right">{{  str_replace('.', ',', money_format('R$ %.2n', $venda->valorTotal())) }}</span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h4 class="float-left">Endereço de Entrega</h4> 
                </td>
                <td>
                    <span class="float-right">{{  $venda->endereco->getEndereco($venda->endereco->id) }}</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@section('css')
    <style>
        

            .box img{
                width: 200px;
            }
        }
    </style>
@stop
@stop
