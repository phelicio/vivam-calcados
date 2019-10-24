@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="m-3">Meu pedidos</h2>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Data</th>
                <th>Data Entrega</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendas as $venda)
            <tr>
                <td>{{ date('d/m/Y', strtotime($venda->created_at)) }}</td>
                <td>{{ date('d/m/Y', strtotime($venda->dataEntrega)) }}</td>
                <td>{{ $venda->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection