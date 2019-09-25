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
        @if (isset($produto))
          Editar Produto      
        @else
          Novo Produto      
        @endif
    </h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="POST" action="
      @if (isset($produto))
        {{ route('produtos.update', $produto->id) }}
      @else
        {{ route('produtos.store') }}
      @endif"  accept-charset="UTF-8" enctype="multipart/form-data">
        
      @isset($produto)
        {{ method_field('PUT') }}
      @endisset

      @csrf

      <div class="box-body">
        <div class="form-group">
          <label for="nome">Nome</label> 
        <input name="nome" type="text" class="form-control" id="nome" @isset($produto) value="{{$produto->nome}}" @endisset placeholder="Nome">
        </div>
        <div class="form-group">
          <label for="valor">Valor</label>
          <input name="valor" type="text" class="form-control" id="valor" @isset($produto) value="{{$produto->valor}}" @endisset placeholder="Valor">
        </div>
        <div class="form-group">
          <label for="imagem">Imagem do Produto</label>
          <input name="imagem" type="file" class="form-control-file"  id="imagem">
        </div>
        <div class="form-group">
          <label>Modelo</label>
          <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Cor</th>
                    <th>Tamanho</th>
                    <th>Quantidade</th>
                    <th></th>
                  </tr>
            </thead>
            <tbody>
              @foreach ($produto->modelos as $modelos)
                <tr>
                  <td><input name="cor" type="text" class="form-control" id="cor" @isset($produto) value="{{$modelo->cor}}" @endisset placeholder="Cor"></td>
                  <td><input name="tamanho" type="text" class="form-control" id="tamanho" @isset($produto) value="{{$modelo->tamanho}}" @endisset placeholder="Tamanho"></td>
                  <td><input name="quantidade" type="text" class="form-control" id="quantidade" @isset($produto) value="{{$modelo->quantidade}}" @endisset placeholder="Quantidade"></td>                
                <td><a id="delModelo"><span><i class="glyphicon glyphicon-trash"></i></span></a></td>
                </tr>    
              @endforeach
            </tbody>            
          </table>

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
                  <option 
                    @if(isset($produto) && $produto->marca->id === $marca->id) 
                      selected 
                    @endif value="{{$marca->id}}">{{$marca->nome}}
                  </option>
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
  @section('js')
    <script> console.log('Hi!'); </script>
  @stop
@stop
