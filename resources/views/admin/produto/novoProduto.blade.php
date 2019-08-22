@extends('adminlte::page')
@section('content')

@hasSection ('mensagem')
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> {{$mensagem}}</h4>
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
  <div class="form-group" data-select2-id="29">
    <label>Multiple</label>
    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
      <option data-select2-id="31">Alabama</option>
      <option data-select2-id="32">Alaska</option>
      <option data-select2-id="33">California</option>
      <option data-select2-id="34">Delaware</option>
      <option data-select2-id="35">Tennessee</option>
      <option data-select2-id="36">Texas</option>
      <option data-select2-id="37">Washington</option>
    </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="8" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Select a State" style="width: 765.5px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
  </div>
@stop
