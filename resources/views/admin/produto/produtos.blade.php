@extends('adminlte::page')


@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th></th>
            <th>Nome</th>
            <th>Valor</th>
            <th>Quantidade</th>
            <th>Tamanho</th>
        </tr>
    </thead>
    <tbody>
            @foreach ($produtos as $produto)
            <tr>
                <td><img  width="300px" src="http://images-cdn.impresa.pt/caras/2011-07-21-nicolas-cage?v=w870h555" class="card-img-top" alt="..."></td>
                <td><h4>{{$produto->nome}}</h4></td>                      
                <td><h4>{{$produto->valor}}</h4></td>                      
                <td><h4>{{$produto->quantidade}}</h4></td>                      
                <td><h4>{{$produto->tamanho}}</h4></td>
                <td><a href="{{route('produtos.edit', $produto->id)}}"><i class="glyphicon glyphicon-pencil alert alert-info"></i></a></td>      
                <td><a href="{{route('produtos.destroy', $produto->id)}}"><i class="glyphicon glyphicon-remove alert alert-danger"></i></a></td>      
            </tr>
            @endforeach
    </tbody>
    </table>
@stop
