<?php
$page = "/home/";
include_once "../php/checkLogin.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Scout</title>
		<?php include '../includes/head.php' ?>
		<link rel="stylesheet" href="/css/home.css" />
		<script src="/js/snowstorm.min.js"></script>
	</head>
	<body>
		<?php include '../includes/modals.php' ?>
		<main>
			<section id="section1">
				<div class="container">
					<h1>SCOUT</h1>
					<h2>The easier way to manage your scouting life</h2>
					<div class="center">
						<?php if ($loggedIn) { ?>
							<a href="/" class="button">View dashboard</a>
							<a href="/logout/" class="button alt">Sign out</a>
						<?php } else { ?>
							<a href="/login/" onclick="return signupModal();" class="button">Get Started!</a>
							<a href="/login/" onclick="return loginModal();" class="button alt">Already a Member? Login</a>
						<?php } ?>
					</div>
				</div>
			</section>
			<section id="section2" class="feature">
				<div class="container">
					<h2>Award Scheme</h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa.</p>
					<a href="/award-scheme/" class="button">View the Scheme Now</a><br>
					<a href="/about/" class="button alt">About Scouts Australia</a>
				</div>
			</section>
			<section id="section3" class="feature">
				<div class="container">
					<h2>Progress Tracker</h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa.</p>
					<a href="/progress-tracker/" class="button">Features</a>
				</div>
			</section>
			<section id="section4" class="feature">
				<div class="container">
					<h2>Group Schedules</h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa.</p>
					<a href="/schedule/" class="button">View the Demo</a><br>
				</div>
			</section>
			<section id="section5" class="feature">
				<div class="container">
					<h2>Unlimited Dirk</h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa.</p>
					<a href="/dirkdirk/" class="button">Secret Page</a>
				</div>
			</section>
		</main>
		<?php include '../includes/footer.php' ?>
		<script src="/js/main.js"></script>
	</body>
</html>