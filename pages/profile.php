<?php
include_once "../php/checkLogin.php";
$page = "/profile/";

if (!$loggedIn) {
	header('Location: /');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $_SESSION['user']; ?> - Scout</title>
		<?php include '../includes/head.php' ?>
		<link rel="stylesheet" href="/css/profile.css" />
	</head>
	<body>
		<?php include '../includes/nav.php' ?>
		<main>
			<div id="profile_container">
				<div class="section personal_info">
					<a href="/profile/edit/" id="profile_edit_link"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" /></svg> Edit profile</a>
					<img id="profile_image" src="/res/avatar.png" />
					<span id="profile_name"><?php if (isset($_SESSION['realName']) && $_SESSION['realName'] != '') { echo $_SESSION['realName']; } else { echo $_SESSION['user']; } ?></span>
					<?php if (isset($_SESSION['realName']) && $_SESSION['realName'] != '') { ?><span id="profile_username">@<?php echo $_SESSION['user']; ?></span><?php } ?>
					<span id="profile_joinDate">Registered 4th January, 2017</span>
				</div>
				<div class="section groups">
					<span id="profile_groups_title"><?php if (isset($_SESSION['realName']) && $_SESSION['realName'] != '') { echo $_SESSION['realName']; } else { echo $_SESSION['user']; } ?>'s Groups</span>
					<div id="group_container">
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
				</div>
			</div>
		</main>
		<?php include '../includes/footer.php' ?>
		<script src="/js/main.js"></script>
	</body>
</html>