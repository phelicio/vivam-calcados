@extends('adminlte::page')


@section('content')
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Vendas</h3>
    </div>
    
    <form action="{{ route('acoesVendas') }}" method="POST">
        @csrf
        <div class="menu-admin container">
                <hr>
                <span>Ações</span>
                <select name="vendas" id="">
                    <option value=""></option>
                    <option value="">Pedido Enviado</option>
                </select>
                <button type="submit">Enviar</button>
                <hr>
            </div>
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <th></th>
                        <th>Cliente</th>
                        <th>Data</th>
                        <th>Data de Entrega</th>
                        <th>Valor Total</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach ($vendas as $venda)
                            <tr>
                                <td><input name="vendas[]" type="checkbox" value={{ $venda->id }}></td>
                                <td>{{ $venda->user->email }}</td>
                                <td>{{ date('d/m/Y', strtotime($venda->created_at)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($venda->dataEntrega)) }}</td>
                                <td>{{ str_replace('.', ',', money_format('R$ %.2n', $venda->valorTotal())) }}</td>
                                <td>{{ $venda->getStatus() }}</td>
                                <td><a href="{{ route('admin.pedido', $venda) }}">Detalhes</a></td>
                            </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>



@stop

@section('css')
    <style>
        .menu-admin {
            margin-left: 10px;
            display:inline;
        }

        .menu-admin hr{
            display: block; 
            height: 1px;
            border: 0; 
            border-top: 1px 
            solid #ccc;
            margin: 1em 0; 
            padding: 0;
        }


        .menu-admin span{
            font-size:16px;
        }
    </style>    
@endsection