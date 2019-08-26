@extends('adminlte::page')
@section('content')
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
</div>@endforeach
@stop
