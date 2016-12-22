<?php
include_once "../php/account.php";
include_once "../php/checkLogin.php";
$page = "/login/";
if ($loggedIn) {
	header('Location: /');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login - Scout</title>
		<?php include '../includes/head.php' ?>
		<link rel="stylesheet" href="/css/login.css" />
	</head>
	<body>
		<?php include '../includes/nav.php' ?>
		<?php include '../includes/modals.php' ?>
		<main>
			<?php if ($status != "Post not set") { ?>
			<div id="login_status" class="<?php if ($status[0] == "E") { echo "error"; } else if ($status[0] == "S") { echo "success"; } ?>"><?php echo $status; ?><a href="#" onclick="document.getElementById('login_status').style.display = 'none'; return false;">&#215;</a></div>
			<?php } ?>
			<form method="POST" action="/login/" id="loginForm">
				<div class="formHeader">Login</div>
				<label for="loginFormUsernameField">Username or Email</label>
				<input type="text" name="user" id="loginFormUsernameField" value="<?php if (isset($_POST['action']) && $_POST['action'] == 'login') { if (isset($_POST['user'])) { echo $_POST['user']; } } ?>" />
				<label for="loginFormPasswordField">Password</label>
				<input type="password" name="pass" id="loginFormPasswordField" />
				<!--<input type="checkbox" name="remember" value="false" id="loginFormRememberMe" /><label for="loginFormRememberMe">Remember Me</label>-->
				<input type="hidden" name="action" value="login" />
				<a href="/login/forgot-password/" id="loginFormForgotPassword">Forgot your password?</a>
				<div class="center"><button type="submit">Login</button></div>
			</form>
			<form method="POST" action="/login/" id="signupForm">
				<div class="formHeader">Sign up</div>
				<label for="signupFormUsernameField">Username</label>
				<input type="text" name="user" id="signupFormUsernameField" value="<?php if (isset($_POST['action']) && $_POST['action'] == 'signup') { if (isset($_POST['user'])) { echo $_POST['user']; } } ?>" />
				<label for="signupFormEmailField">Email</label>
				<input type="email" name="email" id="signupFormEmailField" value="<?php if (isset($_POST['action']) && $_POST['action'] == 'signup') { if (isset($_POST['email'])) { echo $_POST['email']; } } ?>" />
				<label for="signupFormPasswordField">Password</label>
				<input type="password" name="pass" id="signupFormPasswordField" />
				<label for="signupFormPasswordFieldRepeat">Retype Password</label>
				<input type="password" name="passRepeat" id="signupFormPasswordFieldRepeat" />
				<input type="hidden" name="action" value="signup" />
				<div class="center"><button type="submit">Sign up</button></div>
			</form>
		</main>
		<?php include '../includes/footer.php' ?>
		<script src="/js/main.js"></script>
	</body>
</html>