@extends('adminlte::page')
@section('content')

@if($mensagem = Session::get('mensagem'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-check"></i>{{$mensagem}}</h4>
  </div>
@endif
@empty(!$errors->any())
<div class = "alert alert-danger">
    @foreach($errors->all() as $error)

        <div> {{ $error }} </div>

    @endforeach
</div>
@endempty

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Nova Marca</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{ route('marcas.store') }}" accept-charset="UTF-8">
      @csrf
      <div class="box-body">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome">
        </div>
      <div class="box-footer">
          <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>

@stop
