@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="m-3">Meu pedidos</h2>
    <table class="table table-hover table-bordered">
        <thead>
                @if(!Auth::user()->vendas->isEmpty())
                    <tr>
                        <th>Data</th>
                        <th>Data Entrega</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                @endif
        </thead>
        <tbody>
            @if(Auth::user()->vendas->isEmpty())
                <tr >
                    <td colspan="3">
                        <h3 class="text-center mr-5 ml-5 mt-5">Você não fez nenhuma compra ainda :(</h3>
                        <p class="text-center mb-5 ml-5 mr-5" ><a href="{{ route('produtos.catalogo') }}">Clique aqui</a> para ver nossos produtos! </p>
                    </td>
                </tr>
            @else
            @foreach ($vendas as $venda)
                <tr>
                    <td>{{ date('d/m/Y', strtotime($venda->created_at)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($venda->dataEntrega)) }}</td>
                    <td>{{ $venda->getStatus() }}</td>
                    <td><a href="{{ route('pedido', $venda->id) }}"> Visualizar</a></td>
                </tr>
            @endforeach
                @endif
        </tbody>
    </table>
</div>
@endsection