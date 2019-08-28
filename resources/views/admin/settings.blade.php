@extends('adminlte::page')
@section('content')

@empty(!$errors->any())
<div class = "alert alert-danger">
    @foreach($errors->all() as $error)
        <div> {{ $error }} </div>
    @endforeach
</div>
@endempty
    <div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header with-border">
        <h3 class="box-title">Endereço</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{ route('admin.saveSettings') }}" accept-charset="UTF-8">
        @csrf
        <div class="box-body">
           
            <div class="form-group col-md-8">
                    <label for="cep">Cep</label>
                    <input name="cep" type="text" class="form-control" id="cep" placeholder="Cep">
            </div>
            <div class="form-group col-md-8">
                    <label for="rua">Rua</label>
                    <input name="rua" type="text" class="form-control" id="rua" placeholder="Rua">
            </div>
            <div class="form-group col-md-4">
                <label for="numero">Numero</label>
                <input name="numero" type="text" class="form-control" id="numero" placeholder="Numero">
            </div>
            <div class="form-group col-md-12">
                <label for="bairro">Bairro</label>
                <input name="bairro" type="text" class="form-control" id="bairro" placeholder="Bairro">
            </div>
            <div class="form-group col-md-12">
                <label for="cidade">Cidade</label>
                <input name="cidade" type="text" class="form-control" id="cidade" placeholder="Cidade">
            </div>
            <div class="form-group col-md-12">
                <label for="estado">Estado</label>
                <input name="estado" type="text" class="form-control" id="estado" placeholder="Estado">
            </div>
        </div>
        <script src="{{ URL::asset('js/custom-masked-autocomplete-cep.js') }}"></script>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        </form>
    </div>
    </div>
@stop
