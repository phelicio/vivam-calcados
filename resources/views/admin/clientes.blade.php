@extends('adminlte::page')


@section('content')
<div class="box box-primary">
    <table class="table table-hover table-bordered">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>Numero de Compras</th>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->name }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->vendas->count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop
