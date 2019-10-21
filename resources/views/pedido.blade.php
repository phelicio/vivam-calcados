@extends('layouts.app')
@section('content')


        <div class="container">
            <table class="table table-hover table-bordered">
                <thead>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Valor Total</th>
                    <th>Status</th>
                </thead>
            </table>
                <tbody>
                    @empty($vendas)
                        <h3>Não há nenhum pedido</h3>
                    @else
                    @foreach ($vendas as $venda)
                    <tr>
                        <td>{{ $venda-> }}</td>
                        <td>{{ $venda-> }}</td>
                        <td>{{ $venda-> }}</td>
                        <td>{{ $venda-> }}</td>
                    </tr>    
                    @endforeach
                    @endempty
                </tbody>
            </div>
    </div>
</div>
@endsection
