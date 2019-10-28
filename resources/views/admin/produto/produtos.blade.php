@extends('adminlte::page')


@section('content')
    
@if($mensagem = Session::get('mensagem'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i>{{$mensagem}}</h4>
    </div>
    @endif
<div class="row">
    @if(!$produtos->isEmpty())
    @foreach ($produtos as $produto)
    <div class="col-md-3 item">
        <div class="box box-default">
            <div class="box-header with-border">
                <i class="fa fa-warning"></i>
                <div class="pull-right">
                    <form action="{{route('produtos.destroy', $produto->id)}}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <a class="btn btn-outline glyphicon glyphicon-pencil" style="margin-right:5px; color: #605ca8;" href="{{route('produtos.edit', $produto->id)}}"></a>      
                        <button class="btn btn-outline glyphicon glyphicon-remove" style="color:lightcoral;"></button>
                    </form>
                </div>
                
                <h3 class="col-md-12 box-title">{{$produto->nome}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <img class="img-responsive" src=" {{url('storage/produto/'."{$produto->imagem}")}} " class="card-img-top" alt="...">
                <small>Valor</small>
                <p>{{ str_replace('.', ',' ,money_format('R$ %.2n', $produto->valor)) }} </p>
                <small>Marca</small>
                @if (!empty($produto->marca))
                    <p>{{$produto->marca->nome}}</p>
                @endif
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        @endforeach
        @endif
        <nav class="footer position-absolute text-center">
            {{ $produtos->links() }}
        </nav>
</div>

@stop

@section('css')
    <style>
        @media screen and (min-width: 1000px) {
            .item img{
                width: 400px;
                height: 150px;
            }

            .box {
                height: 450px;
            }
        }
    </style>
@stop
