@extends('layouts.app')

@section('content')
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"> </script>


<div class="limiter">
   <div class="container">
       @empty(!$errors->any())
       <div class = "alert alert-danger">
          <ul>
              @foreach($errors->all() as $error)
              
              <li> {{ ucfirst($error) }} </li>
              @endforeach
            </ul>
        </div>
    </div>
    @endempty
    <div class="container-login100">
        <div class="wrap-login100 p-t-50 p-b-90">
            <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('register') }}">
                @csrf
                <span class="login100-form-title p-b-51">
                    Registrar
                </span>

                
                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" type="text" name="name" value="{{ old('name') }}" placeholder="Nome">
                    <span class="focus-input100"></span>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                    <span class="focus-input100"></span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" id="cpf" type="text" name="cpf" value="{{ old('cpf') }}" placeholder="CPF">
                    <span class="focus-input100"></span>
                    @error('cpf')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <script>
                    $("#cpf").inputmask({"mask": "999.999.999-99"});
                </script>
                
                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" id="telefone" type="text" name="telefone" value="{{ old('telefone') }}" placeholder="Telefone">
                    <span class="focus-input100"></span>
                    @error('telefone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <script>
                    $("#telefone").inputmask({"mask": "(99) 99999-9999"});
                </script>

                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" type="password" name="password" placeholder="Senha">
                    <span class="focus-input100"></span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-16">
                    <input class="input100" type="password" name="password_confirmation" placeholder="Confirmar Senha">
                    <span class="focus-input100"></span>
                </div>

            
                <div class="container-login100-form-btn m-t-17">
                    <button class="login100-form-btn">
                        Registrar
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
<div id="dropDownSelect1"></div>

@endsection
