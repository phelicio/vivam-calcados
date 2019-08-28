@extends('adminlte::page')
@section('content')

@empty(!$errors->any())
<div class = "alert alert-danger">
    @foreach($errors->all() as $error)

        <div> {{ $error }} </div>

    @endforeach
</div>
@endempty

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title"> 
        @if (isset($categoria))
          Editar Categoria    
        @else
          Nova Categoria
        @endif 
      </h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="POST" action="
    @if (isset($categoria))
    {{ route('categorias.update', $categoria->id) }}
    @else
    {{ route('categorias.store') }}
    @endif" 
    accept-charset="UTF-8">
    @isset($categoria)
      {{ method_field('PUT') }}
    @endisset
      @csrf
      <div class="box-body">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input name="nome" type="text" class="form-control"  @isset($categoria) value="{{$categoria->nome}}" id="nome" placeholder="Nome">
        </div>
      <div class="box-footer">
          <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>

@stop
