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
					<p>View any badge from any level of scouting right from your phone or computer.</p>
					<a href="/award-scheme/" class="button">View the Scheme Now</a><br>
					<a href="/about/" class="button alt">About Scouts Australia</a>
				</div>
			</section>
			<section id="section3" class="feature">
				<div class="container">
					<h2>Progress Tracker</h2>
					<p>Keep track of your badges, share, and coordinate with other scouts.</p>
					<?php if ($loggedIn) { ?>
						<a href="/progress-tracker/" class="button">Manage my Badges</a>
					<?php } else { ?>
						<a href="/progress-tracker/" class="button">Features</a>
					<?php } ?>
				</div>
			</section>
			<section id="section4" class="feature">
				<div class="container">
					<h2>Group Schedules</h2>
					<p>Forget the termly pdfs. Easily keep track of your group schedule, without the hassle.</p>
					<?php if ($loggedIn) { ?>
						<a href="/groups/" class="button">View your Groups</a>
					<?php } else { ?>
						<a href="/schedule/" class="button">View the Demo</a>
					<?php } ?>
				</div>
			</section>
			<section id="section5" class="feature">
				<div class="container">
					<h2>Cloud Safe</h2>
					<p>All of your schedules, badges and data are kept safe and secure in our cloud.</p>
					<a href="/status/" class="button">Server Status</a>
				</div>
			</section>
		</main>
		<?php include '../includes/footer.php' ?>
		<script src="/js/main.js"></script>
	</body>
</html>