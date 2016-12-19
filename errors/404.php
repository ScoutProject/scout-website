<?php
include_once "../php/account.php";
include_once "../php/checkLogin.php";
$page = "/";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Error - Scout</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
		<!--<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:700|Roboto:400,700" rel="stylesheet" />-->
		<link rel="stylesheet" href="/css/main.css" />
		<link rel="stylesheet" href="/css/error.css" />
	</head>
	<body>
		<?php include '../includes/nav.php' ?>
		<?php include '../includes/modals.php' ?>
		<main>
			<div>
				<svg viewBox="0 0 24 24"><path d="M13,14H11V10H13M13,18H11V16H13M1,21H23L12,2L1,21Z"><title>404: Not Found</title></path></svg>
				<h1>Oops! Something went wrong...</h1>
				<p>Either this page doesn't exist, or something's gone wrong with our server. If you think this is an error that needs to be fixed, please <a href="/contact/">contact us</a>.</p>
			</div>
		</main>
		<?php include '../includes/footer.php' ?>
		<script src="/js/main.js"></script>
	</body>
</html>