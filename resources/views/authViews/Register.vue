<template>
    <div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <div v-if="error" class="error">
                    {{ error.message }}
                </div>

				<form class="login100-form validate-form" @submit.prevent = "pressed">
				@csrf
					<span class="login100-form-title p-b-49">
						Registration
					</span>
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" v-model="regEmail" name="regEmail" placeholder="Type your email address">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" v-model="regPass" name="regPass" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Repeate your Password</span>
						<input class="input100" type="password" name="regPass2" placeholder="Type your password again">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
                    
                    <div class="text-right p-t-8 p-b-31"> </div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="regBtn">
								Registration
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-15">
						<span>
							Or Sign Up Using
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

					<div class="flex-col-c p-t-80">
						<span class="txt1 p-b-17">
							Or Sign In Using
						</span>

						<a href="/login" class="txt2">
							Sign In
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>    
</template>

<script>
import * as firebase from 'firebase/app';
import 'firebase/auth';

export default {
	methods: {
		async pressed() {
			try {
				if(regPass == regPass2) {
					const user = firebase.auth().createUserWithEmailAndPassword(this.regEmail, this.regPass);
				console.log(user);
				this.$router.replace({name:"home"});
				}
				else {
					error.message = "Nem egyeznek a jelszavak";
				}
				
			} 
			catch(err) {
				console.log(err);
			}
			
		}
	},
	data() {
		return {
			regEmail: '',
			regPass: '',
			regPass2: '',
			error: ''
		}
	}
}
</script>

<style>

</style>