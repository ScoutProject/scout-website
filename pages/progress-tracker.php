<?php
include_once "../php/checkLogin.php";
$page = "/progress-tracker/";

if (!$loggedIn) {
	echo 'Progress tracker features thingy here';
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Progress Tracker - Scout</title>
		<?php include '../includes/head.php' ?>
		<link rel="stylesheet" href="/css/progress-tracker.css" />
	</head>
	<body>
		<?php include '../includes/nav.php' ?>
		<?php
		$curTab = 'in-progress';
		if (isset($_GET['in-progress']))
			$curTab = 'in-progress';
		if (isset($_GET['completed']))
			$curTab = 'completed';
		?>
		<main>
			<div id="tracker_top">
				<div id="tracker_tabs_container">
					<h2>Progress Tracker</h2>
					<div id="tabs">
						<a id="tab_in-progress" href="?in-progress" onclick="return switchTab(1);" <?php if ($curTab == 'in-progress') { echo 'class="active"'; } ?>>In Progress</a>
						<a id="tab_completed" href="?completed" onclick="return switchTab(2);" <?php if ($curTab == 'completed') { echo 'class="active"'; } ?>>Completed</a>
					</div>
				</div>
			</div>
			<div id="tracker_tasks_container" class="<?php echo $curTab; ?>">
				<div id="inProgress">
					In Porgression
				</div>
				<div id="completed">
					Complenated
				</div>
			</div>
		</main>
		<?php include '../includes/footer.php' ?>
		<script src="/js/main.js"></script>
		<script src="/js/progress-tracker.js"></script>
	</body>
</html>