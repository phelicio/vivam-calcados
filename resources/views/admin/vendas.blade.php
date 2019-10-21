@extends('adminlte::page')


@section('content')
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Vendas</h3>
        </div>
        <div class="box-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <th>Cliente</th>
                    <th>Data</th>
                    <th>Valor Total</th>
                    <th>Status</th>
                </thead>
            </table>
                <tbody>
                    @foreach ($vendas as $venda)
                        <tr>
                            <td>{{ $venda-> }}</td>
                            <td>{{ $venda-> }}</td>
                            <td>{{ $venda-> }}</td>
                            <td>{{ $venda-> }}</td>
                        </tr>    
                    @endforeach
                </tbody>
        </div>
    </div>
</div>

@stop
