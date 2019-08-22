@extends('adminlte::page')
@section('content')
@foreach ($marcas as $marca)
    <pre>{{$marca->nome}}</pre>
@endforeach
@stop
