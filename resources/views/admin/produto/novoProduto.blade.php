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
            <tbody  id="tabelaModelo">
              @isset($produto)
                @foreach ($produto->modelos as $modelo)
                <tr>
                  <td><input name="modelo[{{$modelo->id}}]['cor']" type="text" class="form-control" id="cor" @isset($produto) value="{{$modelo->cor}}" @endisset placeholder="Cor"></td>
                  <td><input name="tamanho[{{$modelo->id}}['tamanho']" type="text" class="form-control" id="tamanho" @isset($produto) value="{{$modelo->tamanho}}" @endisset placeholder="Tamanho"></td>
                  <td><input name="quantidade[{{$modelo->id}}]['quantidade']" type="text" class="form-control" id="quantidade" @isset($produto) value="{{$modelo->quantidade}}" @endisset placeholder="Quantidade"></td>                
                  <td><a id="delModelo"><span><i class="glyphicon glyphicon-trash"></i></span></a></td>
                </tr>    
                @endforeach
              @endisset
                <tr id="dummy-modelo-tr" hidden>
                  <td><input data-type="cor" type="text" class="form-control" id="cor" placeholder="Cor"></td>
                  <td><input data-type="tamanho" type="text" class="form-control" id="tamanho" placeholder="Tamanho"></td>
                  <td><input data-type="quantidade" type="text" class="form-control" id="quantidade" placeholder="Quantidade"></td>                
                  <td><a data-type="delModelo" id="delModelo"><span><i class="glyphicon glyphicon-trash"></i></span></a></td>
                </tr>    
            </tbody>      
          </table>
          <a id="addModelo" class="btn  btn-success addModelo"><i class="fa fa-plus"> </i> Adicionar Modelo</a>     
        </div>
        <br>
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
    <script>

      $('#addModelo').on('click', function(){
      
        let tr = $('#dummy-modelo-tr');
        let tabela = $('#tabelaModelo');
        let size = tabela.find('tr').lenght? tabela.find('tr').lenght: 0;
        let newTr = $('<tr />');
        let newTd = $('<td />');

        tr.find('input').each( function(){
          let attr = this.getAttribute('data-type');
          this.setAttribute('name', `newModelo[${size+1}][${attr}]`);
          newTd.append(this);
          
        });
        delModelo = tr.find('a');
        newTd.append(delModelo);
        newTr.append(newTd);
        tabela.append((newTr));
      });
      
    </script>
  @stop
  @section('css')
      <style>
        .addModelo{
          float:right;
          cursor: pointer;
        }
      </style>
  @endsection
@stop
