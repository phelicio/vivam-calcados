@extends('adminlte::page')
@section('content')

<form method="POST" action="{{ route('produtos.store') }}" accept-charset="UTF-8">
    @csrf
    <div class="form-group">
      <label for="nome">Nome</label>
      <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome">
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
        <label for="foto">Imagem do Produto</label>
        <input name="foto" type="file" class="form-control-file" id="foto">
      </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </form>
  
@stop
