@extends('adminlte::page')


@section('content')
    
@if($mensagem = Session::get('mensagem'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i>{{$mensagem}}</h4>
    </div>
    @endif
<div class="row">
    @foreach ($produtos as $produto)
    <div class="col-md-3 item">
            <div class="box box-default">
                <div class="box-header with-border">
                <i class="fa fa-warning"></i>
    
                <h3 class="box-title">{{$produto->nome}}</h3>
                <div class="pull-right">
                    <form action="{{route('produtos.destroy', $produto->id)}}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <a class="btn btn-outline glyphicon glyphicon-pencil" style="margin-right:5px; color: #605ca8;" href="{{route('produtos.edit', $produto->id)}}"></a>      
                        <button class="btn btn-outline glyphicon glyphicon-remove" style="color:lightcoral;"></button>
                    </form>
                </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <img class="img-responsive" src="http://images-cdn.impresa.pt/caras/2011-07-21-nicolas-cage?v=w870h555" class="card-img-top" alt="...">
                    <small>Valor</small>
                    <p>R${{$produto->valor}},00</p>
                    <small>Quantidade</small>
                    <p>{{$produto->quantidade}}</p>
                    <small>Tamanho</small>
                    <p>{{$produto->tamanho}}</p>
                    <small>Marca</small>
                    <p>{{$produto->marca->nome}}</p>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    @endforeach
</div>

@stop
