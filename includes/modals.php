<form method="POST" action="/login/" id="loginModal">
	<div>
		<div class="modalTop">
			SCOUT
			<a class="closeModal" href="#" onclick="return loginModal();">&#215;</a>
		</div>
		<label for="loginUsernameField">Username or Email</label>
		<input type="text" name="user" id="loginUsernameField" />
		<label for="loginPasswordField">Password</label>
		<input type="password" name="pass" id="loginPasswordField" />
		<input type="checkbox" name="remember" id="loginRememberMe" /><label for="loginRememberMe">Remember Me</label>
		<input type="hidden" name="action" value="login" />
		<input type="hidden" name="prev_location" value="<?php echo $page; ?>" />
		<div class="center"><button type="submit">Login</button></div>
		<a href="/login/forgot-password/" id="loginForgotPassword">Forgot your password?</a>
		<div class="modalBottom">
			<span>Don't have an account?</span>
			<a href="/login/" class="button alt thin" onclick="return signupModal();">Sign up!</a>
		</div>
	</div>
</form>
<form method="POST" action="./login/" id="signupModal">
	<div>
		<div class="modalTop">
			SCOUT
			<a class="closeModal" href="#" onclick="return signupModal();">&#215;</a>
		</div>
		<label for="signupUsernameField">Username</label>
		<input type="text" name="user" id="signupUsernameField" />
		<label for="signupEmailField">Email</label>
		<input type="email" name="email" id="signupEmailField" />
		<label for="signupPasswordField">Password</label>
		<input type="password" name="pass" id="signupPasswordField" />
		<label for="signupPasswordFieldRepeat">Retype Password</label>
		<input type="password" name="passRepeat" id="signupPasswordFieldRepeat" />
		<input type="hidden" name="action" value="signup" />
		<div class="center"><button type="submit">Sign up</button></div>
		<div class="modalBottom">
			<span>Already have an account?</span>
			<a href="/login/" class="button alt thin" onclick="return loginModal();">Login!</a>
		</div>
	</div>
</form>