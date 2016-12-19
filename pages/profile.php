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
			Welcome, <?php echo $_SESSION['user']; ?>. Your stored real name is: "<?php echo @$_SESSION['realName']; ?>". I'm not going to code this page yet. :)
		</main>
		<?php include '../includes/footer.php' ?>
		<script src="/js/main.js"></script>
	</body>
</html>