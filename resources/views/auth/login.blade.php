@extends('layouts.app')

@section('content')
<div class="container">
	@empty(!$errors->any())
    <div class = "alert alert-danger">
		@foreach($errors->all() as $error)
		
		<li> {{ ucfirst($error) }} </li>
        @endforeach
    </div>
	@endempty
</div>
     
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('login') }}">
					@csrf
					<span class="login100-form-title p-b-51">
						Logar
					</span>

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Senha">
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" name="remember" id="ckb1" type="checkbox">
							<label class="label-checkbox100" for="ckb1">
								Lembrar-me
							</label>
						</div>

						<div>
                            @if (Route::has('password.request'))
                                <a class="txt1 mr-5" href="{{ route('password.request') }}">
                                    Esqueceu a senha?
                                </a>
                            @endif
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Entrar
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	<script src="/js/mainLogin.js"></script>


@endsection
