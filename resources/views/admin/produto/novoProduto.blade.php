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
      <h3 class="box-title">Novo Produto</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="POST" action="{{ route('produtos.store') }}" accept-charset="UTF-8">
      @csrf
      <div class="box-body">
        <div class="form-group">
          <label for="nome">Nome</label> 
        <input name="nome" type="text" class="form-control" id="nome" @isset($produto) value="{{$produto->nome}}" @endisset placeholder="Nome">
        </div>
        <div class="form-group">
          <label for="quantidade">Quantidade</label>
          <input name="quantidade" type="number" class="form-control" id="quantidade" placeholder="Quantidade">
        </div>
        <div class="form-group">
          <label for="valor">Valor</label>
          <input name="valor" type="money" class="form-control" id="valor" placeholder="Valor">
        </div>
        <div class="form-group">
          <label for="tamanho">Tamanho</label>
          <input name="tamanho" type="money" class="form-control" id="tamanho" placeholder="Tamanho">
        </div>
        <div class="form-group">
          <label for="imagem">Imagem do Produto</label>
          <input name="imagem" type="file" class="form-control-file" id="imagem">
        </div>
        
        <div class="form-group ">
          <label >Categorias</label>
          <div class="col-xs-12">
            @foreach ($categorias as $categoria)
              <div class="col-xs-3">
                <input 

                @if (isset($produto) && in_array($categoria->id, $categoriasIds))
                    checked
                @endif 

                type="checkbox" name="categoria_id[]" value="{{$categoria->id}}" id="categoria[{{$categoria->id}}]">
                <span for="categoria[{{$categoria->id}}]">{{$categoria->nome}}</span>
              </div>
            @endforeach
          </div>
        </div>
        <div class="form-group">
              <label>Marca</label>
              <select class="form-control" name="marca_id" style="width: 100%;" aria-hidden="true">
                @foreach ($marcas as $marca)
                  <option value="{{$marca->id}}">{{$marca->nome}}</option>
                @endforeach
              </select>
          </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
          <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>
@stop
