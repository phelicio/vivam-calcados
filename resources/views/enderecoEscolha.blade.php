@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="mt-5 mb-4">Endereços</h3>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
            </tr>
        </thead>
        <tbody>
            @if($user->enderecos->isEmpty())
                <tr >
                    <td colspan="2">
                        <h3 class="text-center m-5">Não há endereços cadastrados</h3>
                    </td>
                </tr>
            @else
                @foreach ($user->enderecos as $endereco)
                    <tr>
                        <td><input type="radio"></td>
                        <td>{{ $endereco->getEndereco($endereco->id) }}</td>
                    </tr>
                @endforeach
            @endif  
        </tbody>
    </table>

    <button type="button" class="site-btn sb-dark  mb-5" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Cadastrar Endereço</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title " id="exampleModalLabel">Cadastro Endereço</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  method="POST" action="{{ route('enderecos.store') }}">
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="cep">Cep</label>
                        <input name="cep" type="text" maxlength="11" class="form-control" id="cep" placeholder="Cep">
                    </div>
                    <div class="form-group col-md-12">
                            <label for="numero">Numero</label>
                            <input name="numero" type="text" class="form-control" id="numero" placeholder="Numero">
                        </div>
                    <div class="form-group col-md-12">
                        <label for="rua">Rua</label>
                        <input name="rua" type="text" class="form-control" id="rua" placeholder="Rua">
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
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </form>
</div>
        <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
        <script src="{{ URL::asset('js/masked-autocomplete-cep.js') }}"></script>
@endsection
