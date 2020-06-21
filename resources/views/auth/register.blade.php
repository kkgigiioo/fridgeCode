@extends('layouts.app')
@section('title')
{{ __('REGISTRATION') }}
@endsection
@section('content')
<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <span class="login100-form-title p-b-49">
                    {{ __('Registration') }}
					</span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Firstname is reauired">
                        <input id="firstName" type="text" class="input100 @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" 
                        required autocomplete="namfirstNamee" placeholder="Type your firstname" autofocus>
                        <span class="focus-input100" data-symbol="&#xf206;"></span>

                        @error('firstName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Lastname is reauired">
                        <input id="lastName" type="text" class="input100 @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" 
                        required placeholder="Type your lastname" autocomplete="lastName">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>

                        @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                        placeholder="Type your email address" autocomplete="email">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Password is reauired">
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required
                        placeholder="Type your password" autocomplete="new-password">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Password is reauired">
                        <input id="password-confirm" type="password" class="input100" name="password_confirmation" required
                        placeholder="Confirm Password" autocomplete="new-password">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="text-right p-t-8 p-b-31"> </div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
                                <button type="submit" class="login100-form-btn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    <div class="txt1 text-center p-t-25 p-b-15">
						<span>
                            {{ __('Or Sign Up Using') }}
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>

					<div class="flex-col-c p-t-40">
						<span class="txt1 p-b-17">
                            {{ __('Or Sign In Using') }}
						</span>

						<a href="/login" class="txt2">
                            {{ __('Sign In') }}
						</a>
					</div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
