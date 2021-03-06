@extends('adminlte::page')
@section('content')

@if($mensagem = Session::get('mensagem'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i>{{$mensagem}}</h4>
    </div>
@endif
    <div>
    @isset($marcas)
    @foreach ($marcas as $marca)
    <div class="col-md-3">
        <div class="box box-default">
            <div class="box-header with-border">
                <i class="fa fa-warning"></i>
                <h3 class="box-title">{{$marca->nome}}</h3>
                <div class="pull-right">
                    <form action="{{route('marcas.destroy', $marca->id)}}" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <a class="btn btn-outline glyphicon glyphicon-pencil" style="margin-right:5px; color: #605ca8;" href="{{route('marcas.edit', $marca->id)}}"></a>      
                        <button class="btn btn-outline glyphicon glyphicon-remove" style="color:lightcoral;"></button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        @endforeach
        @endisset
        <nav class="footer position-fixed text-center">
            {{ $marcas->links() }}
        </nav>
    </div>
  
    @section('css')
    <style>
            .box {
                height: 200px;
            }
        }
    </style>
    @stop
@stop
