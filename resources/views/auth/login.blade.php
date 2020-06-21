@extends('layouts.app')
@section('title')
{{ __('Login') }}
@endsection
@section('content')
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}" enctype="multipart/from-data">
					@csrf
					<span class="login100-form-title p-b-49">
                        {{ __('Login') }}
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
						<input class="input100" type="email" id="email" name="email" placeholder="Type your email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" id="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
                            {{ __('Forgot password?') }}
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="loginBtn">
								{{ __('Login') }}
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-25 p-b-20">
						<span>
                            {{ __('Or Sign In Using') }}
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
                            {{ __('Or Sign Up Using') }}
						</span>

						<a href="/register" class="txt2">
                            {{ __('Sign Up') }}
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection