@extends('adminlte::page')
@section('content')

<form method="POST" action="{{ route('produtos.store') }}" accept-charset="UTF-8">
    
    
   
   
     
  </form>
  @csrf
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Novo Produto</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form">
      <div class="box-body">
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
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
          <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>
@stop
