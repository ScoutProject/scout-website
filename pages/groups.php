<?php
include_once "../php/checkLogin.php";
$page = "/groups/";

if (!$loggedIn) {
	header('Location: /');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Your Groups - Scout</title>
		<?php include '../includes/head.php' ?>
		<link rel="stylesheet" href="/css/groups.css" />
	</head>
	<body>
		<?php include '../includes/nav.php' ?>
		<main>
			<div id="groups_container">
				<h2>Your Groups</h2>
				<div id="groups">
					<div class="group_wrapper">
						<div class="group">
							<img class="group_image" src="/res/group_example.png" />
							<a class="group_name" href="#" title="Monash Venturer Unit">Monash Venturer Unit</a>
							<span class="group_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa.</span>
						</div>
					</div>
					<div class="group_wrapper">
						<div class="group">
							<img class="group_image" src="/res/group_example.png" />
							<a class="group_name" href="#" title="Monash Venturer Unit">Monash Venturer Unit</a>
							<span class="group_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa.</span>
						</div>
					</div>
					<div class="group_wrapper">
						<div class="group">
							<img class="group_image" src="/res/group_example.png" />
							<a class="group_name" href="#" title="Monash Venturer Unit">Monash Venturer Unit</a>
							<span class="group_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa.</span>
						</div>
					</div>
					<div class="group_wrapper">
						<div class="group">
							<img class="group_image" src="/res/group_example.png" />
							<a class="group_name" href="#" title="Monash Venturer Unit">Monash Venturer Unit</a>
							<span class="group_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa.</span>
						</div>
					</div>
					<div class="group_wrapper">
						<div class="group">
							<img class="group_image" src="/res/group_example.png" />
							<a class="group_name" href="#" title="Monash Venturer Unit">Monash Venturer Unit</a>
							<span class="group_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa.</span>
						</div>
					</div>
					<div class="group_wrapper">
						<div class="group">
							<img class="group_image" src="/res/group_example.png" />
							<a class="group_name" href="#" title="Monash Venturer Unit">Monash Venturer Unit</a>
							<span class="group_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa.</span>
						</div>
					</div>
					<div class="group_wrapper">
					</div>
					<div class="group_wrapper">
					</div>
				</div>
			</div>
		</main>
		<?php include '../includes/footer.php' ?>
		<script src="/js/main.js"></script>
	</body>
</html>