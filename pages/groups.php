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
						<a href="#" class="group_container" style="background-color:#2554a3;" ontouchstart="this.classList.toggle('hover');">
							<div class="group">
								<div class="group_front">
									<img class="group_image" src="/res/group_example.png" />
								</div>
								<div class="group_back">
									<span class="group_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.</span>
								</div>
							</div>
							<span class="group_name" title="Monash Venturer Unit">Monash Venturer Unit</span>
							<span class="group_members">26 Members</span>
						</a>
					</div>
					<div class="group_wrapper">
						<a href="#" class="group_container" style="background-color:#00BCD4;" ontouchstart="this.classList.toggle('hover');">
							<div class="group">
								<div class="group_front">
									<img class="group_image" src="/res/group_placeholder.png" />
								</div>
								<div class="group_back">
									<span class="group_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.</span>
								</div>
							</div>
							<span class="group_name" title="Test Group">Test Group</span>
							<span class="group_members">3 Members</span>
						</a>
					</div>
					<div class="group_wrapper">
						<a href="#" class="group_container" style="background-color:#8BC34A;" ontouchstart="this.classList.toggle('hover');">
							<div class="group">
								<div class="group_front">
									<img class="group_image" src="/res/group_placeholder.png" />
								</div>
								<div class="group_back">
									<span class="group_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.</span>
								</div>
							</div>
							<span class="group_name" title="Another Test With a Really Long Title">Another Test With a Really Long Title</span>
							<span class="group_members">420 Members</span>
						</a>
					</div>
					<div class="group_wrapper">
						<a href="#" class="group_container" ontouchstart="this.classList.toggle('hover');">
							<div class="group">
								<div class="group_front">
									<img class="group_image" src="/res/group_placeholder.png" />
								</div>
								<div class="group_back">
									<span class="group_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.</span>
								</div>
							</div>
							<span class="group_name" title="No Color Set">No Color Set</span>
							<span class="group_members">0 Members</span>
						</a>
					</div>
					<div class="group_wrapper">
						<a href="#" class="group_container" style="background-color:#FFEB3B;" ontouchstart="this.classList.toggle('hover');">
							<div class="group">
								<div class="group_front">
									<img class="group_image" src="/res/group_placeholder.png" />
								</div>
								<div class="group_back">
									<span class="group_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.</span>
								</div>
							</div>
							<span class="group_name" title="Testing that...">Testing that...</span>
							<span class="group_members">1 Member</span>
						</a>
					</div>
					<div class="group_wrapper">
						<a href="#" class="group_container" style="background-color:#F44336;" ontouchstart="this.classList.toggle('hover');">
							<div class="group">
								<div class="group_front">
									<img class="group_image" src="/res/group_placeholder.png" />
								</div>
								<div class="group_back">
									<span class="group_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.</span>
								</div>
							</div>
							<span class="group_name" title="...Spacing">...Spacing</span>
							<span class="group_members">1248 Members</span>
						</a>
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