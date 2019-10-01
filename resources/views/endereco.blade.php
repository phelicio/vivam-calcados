@extends('layouts.app')
@section('content')
    
<form role="form" method="POST" action="{{ route('admin.saveSettings') }}" accept-charset="UTF-8">
        @csrf
        <div class="box-body">
           
            <div class="form-group col-md-8">
                    <label for="cep">Cep</label>
                    <input name="cep" type="text" maxlength="11" class="form-control" id="cep" placeholder="Cep">
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
        <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
        <script src="{{ URL::asset('js/masked-autocomplete-cep.js') }}"></script>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        </form>
@endsection
