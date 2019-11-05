@extends('layouts.app')
@section('content')
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"> </script>

<div class="container">
    <h3 class="mt-5 mb-4">Selecione o endereço de entrega</h3>
    <form method="GET" action="{{ route('checkoutPage') }}">
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
                        <tr >
                            <td><input name="endereco" value="{{ $endereco->id }}" id="{{ $endereco->id}}" type="radio"></td>
                            <td ><label for="{{ $endereco->id }}" >{{ $endereco->getEndereco($endereco->id) }}</label></td>
                            @if ($endereco->entrega24hrs)

                                <td class="alert alert-success"> Frete Gratis</td>
                            @else
                            
                                <td class="alert alert-danger">Valor do frete</td>
                            @endif
                        </tr>
                    @endforeach
                @endif  
            </tbody>
        </table>
        <a  class="site-btn sb-white  mb-5" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Cadastrar Endereço</a>
        <button type="submit" class="site-btn float-right">Concluir compra</button>
    </form>

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
                    <script>
                        $("#cep").inputmask({"mask": "99999-999"});
                    </script>
                    <div class="form-group col-md-12">
                            <label for="numero">Numero</label>
                            <input name="numero" type="text" class="form-control" id="numero" placeholder="Numero">
                        </div>
                    <div class="form-group col-md-12">
                        <label for="rua">Rua</label>
                        <input name="logradouro" type="text" class="form-control" id="rua" placeholder="Rua">
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
