@extends('adminlte::page')
@section('content')
@foreach ($categorias as $categoria)
    <pre>{{$categoria->nome}}</pre>
@endforeach
@stop
