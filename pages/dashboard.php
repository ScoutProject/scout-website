<?php
include_once "../php/checkLogin.php";
$page = "/";

if (!$loggedIn) {
	header('Location: /home/');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Scout</title>
		<?php include '../includes/head.php' ?>
		<link rel="stylesheet" href="/css/dashboard.css" />
	</head>
	<body>
		<?php include '../includes/nav.php' ?>
		<main>
			Hi <?php echo $_SESSION['user']; ?>, so this will be the main dashboard-y page thing that you can only get to when signed in. If you're not signed in, you get redirected to /home/
		</main>
		<?php include '../includes/footer.php' ?>
		<script src="/js/main.js"></script>
	</body>
</html>