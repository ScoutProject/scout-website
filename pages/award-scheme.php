<?php
include_once "../php/checkLogin.php";
if (isset($_SERVER['PATH_INFO'])) { $request = explode('/', trim($_SERVER['PATH_INFO'],'/')); }
$page = "/award-scheme/";
$pageType = "scheme";
if (isset($request) && $request[0] != "") {
	if (count($request) == 3) {
		$page = "/award-scheme/" . $request[0] . "/" . $request[1] . "/" . $request[2] . "/";
		$pageType = "badge";
		$badge = callAPI('GET', 'http://api.scoutdev.ga/v1/award_scheme/badges/' . $request[2]);
		$badge = json_decode($badge, true);
		if (!empty($badge['status']) || preg_replace("/[\s]/", "-", strtolower($badge['sublevel'])) != $request[1] || preg_replace("/[\s]/", "-", strtolower($badge['level'])) != $request[0]) {
			//There was an error
			http_response_code(404);
			include "../errors/404.php";
			die();
		}
		include_once "../php/libs/Parsedown.php"; //To do the markdown parsing
	} else if (count($request) == 2) {
		$page = "/award-scheme/" . $request[0] . "/" . $request[1] . "/";
		$pageType = "sublevel";
		$sublevel = callAPI('GET', 'http://api.scoutdev.ga/v1/award_scheme/sublevels/' . $request[1]);
		$sublevel = json_decode($sublevel, true);
		if (!empty($sublevel['status']) || preg_replace("/[\s]/", "-", strtolower($sublevel[0]['level'])) != $request[0]) {
			//There was an error
			http_response_code(404);
			include "../errors/404.php";
			die();
		}
	} else {
		$page = "/award-scheme/" . $request[0] . "/";
		$pageType = "level";
		$level = callAPI('GET', 'http://api.scoutdev.ga/v1/award_scheme/levels/' . $request[0]);
		$level = json_decode($level, true);
		if (!empty($level['status'])) {
			//There was an error
			http_response_code(404);
			include "../errors/404.php";
			die();
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php if ($pageType == "scheme") { echo "Award Scheme"; } else if ($pageType == "level") { echo $request; } else if ($pageType == "sublevel") { echo "Award Scheme"; } else if ($pageType == "badge") { echo "Award Scheme"; } ?> - Scout</title>
		<?php include '../includes/head.php' ?>
		<link rel="stylesheet" href="/css/award-scheme.css" />
	</head>
	<body>
		<?php include '../includes/nav.php' ?>
		<?php include '../includes/modals.php' ?>
		<main>
			<div id="award_scheme_container">
				<?php
				if ($pageType == "scheme") {
					?>
					<div id="award_scheme_actions">
						<a href="#" onclick="return closeAll();" id="award_scheme_closeAll" title="Collapse all"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,13H5V11H19V13Z" /></svg></a>
						<a href="#" onclick="return openAll();" id="award_scheme_openAll" title="Expand all"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" /></svg></a>
					</div>
					<?php
					$result = callAPI('GET', 'http://api.scoutdev.ga/v1/award_scheme/levels');
					$result = json_decode($result, true);
					
					for ($i = 0; $i < count($result); $i++) {
					?>
					<div class="award_scheme_level level<?php echo $result[$i]['level_id']; ?>">
						<a class="award_scheme_level_title" href="/award-scheme/<?php echo preg_replace("/[\s]/", "-", strtolower($result[$i]['level'])); ?>/" onclick="return openLevel(this, <?php echo $result[$i]['level_id']; ?>);"><?php echo $result[$i]['level']; ?></a>
						<svg class="award_scheme_level_chevron" viewBox="0 0 24 24"><path style="fill:inherit;" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
						<div class="award_scheme_sublevel_container">
							<?php
							$subresult = callAPI('GET', 'http://api.scoutdev.ga/v1/award_scheme/levels/' . $result[$i]['level_id']);
							$subresult = json_decode($subresult, true);
							
							for ($j = 0; $j < count($subresult); $j++) {
							?>
							<a class="award_scheme_sublevel" href="/award-scheme/<?php echo preg_replace("/[\s]/", "-", strtolower($result[$i]['level'])); ?>/<?php echo preg_replace("/[\s]/", "-", strtolower($subresult[$j]['sublevel'])); ?>/"><?php echo $subresult[$j]['sublevel']; ?></a>
							<?php
							}
							?>
						</div>
					</div>
					<?php
					}
				} else if ($pageType == "level") {
				?>
				<div id="award_scheme_navbar" class="level<?php echo $level[0]['level_id']; ?>">
					<a href="/award-scheme/" id="award_scheme_navbar_scheme">Award Scheme</a>
					<svg class="award_scheme_navbar_chevron" viewBox="0 0 24 24"><path style="fill:inherit;" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg>
					<a href="/award-scheme/<?php echo preg_replace("/[\s]/", "-", strtolower($level[0]['level'])); ?>/" id="award_scheme_navbar_level"><?php echo $level[0]['level']; ?></a>
				</div>
				<div id="award_scheme_content">
					<?php
					for ($i = 0; $i < count($level); $i++) {
					?>
					<a href="/award-scheme/<?php echo preg_replace("/[\s]/", "-", strtolower($level[$i]['level'])); ?>/<?php echo preg_replace("/[\s]/", "-", strtolower($level[$i]['sublevel'])); ?>/" class="award_scheme_sublevel"><?php echo $level[$i]['sublevel']; ?></a>
					<?php
					}
					?>
				</div>
				<?php
				} else if ($pageType == "sublevel") {
				?>
				<div id="award_scheme_navbar" class="level<?php echo $sublevel[0]['level_id']; ?>">
					<a href="/award-scheme/" id="award_scheme_navbar_scheme">Award Scheme</a>
					<svg class="award_scheme_navbar_chevron" viewBox="0 0 24 24"><path style="fill:inherit;" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg>
					<a href="/award-scheme/<?php echo preg_replace("/[\s]/", "-", strtolower($sublevel[0]['level'])); ?>/" id="award_scheme_navbar_level"><?php echo $sublevel[0]['level']; ?></a>
					<svg class="award_scheme_navbar_chevron" viewBox="0 0 24 24"><path style="fill:inherit;" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg>
					<a href="/award-scheme/<?php echo preg_replace("/[\s]/", "-", strtolower($sublevel[0]['level'])); ?>/<?php echo preg_replace("/[\s]/", "-", strtolower($sublevel[0]['sublevel'])); ?>/" id="award_scheme_navbar_sublevel"><?php echo $sublevel[0]['sublevel']; ?></a>
				</div>
				<div id="award_scheme_content">
					<?php
					for ($i = 0; $i < count($sublevel); $i++) {
					?>
					<a href="/award-scheme/<?php echo preg_replace("/[\s]/", "-", strtolower($sublevel[$i]['level'])); ?>/<?php echo preg_replace("/[\s]/", "-", strtolower($sublevel[$i]['sublevel'])); ?>/<?php echo preg_replace("/[\s]/", "-", strtolower($sublevel[$i]['name'])); ?>/" class="award_scheme_sublevel"><?php echo $sublevel[$i]['name']; ?></a>
					<?php
					}
					?>
				</div>
				<?php
				} else if ($pageType == "badge") {
				?>
				<div id="award_scheme_navbar" class="level<?php echo $badge['level_id']; ?>">
					<a href="/award-scheme/" id="award_scheme_navbar_scheme">Award Scheme</a>
					<svg class="award_scheme_navbar_chevron" viewBox="0 0 24 24"><path style="fill:inherit;" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg>
					<a href="/award-scheme/<?php echo preg_replace("/[\s]/", "-", strtolower($badge['level'])); ?>/" id="award_scheme_navbar_level"><?php echo $badge['level']; ?></a>
					<svg class="award_scheme_navbar_chevron" viewBox="0 0 24 24"><path style="fill:inherit;" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg>
					<a href="/award-scheme/<?php echo preg_replace("/[\s]/", "-", strtolower($badge['level'])); ?>/<?php echo preg_replace("/[\s]/", "-", strtolower($badge['sublevel'])); ?>/" id="award_scheme_navbar_sublevel"><?php echo $badge['sublevel']; ?></a>
					<svg class="award_scheme_navbar_chevron" viewBox="0 0 24 24"><path style="fill:inherit;" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg>
					<a href="/award-scheme/<?php echo preg_replace("/[\s]/", "-", strtolower($badge['level'])); ?>/<?php echo preg_replace("/[\s]/", "-", strtolower($badge['sublevel'])); ?>/<?php echo preg_replace("/[\s]/", "-", strtolower($badge['name'])); ?>/" id="award_scheme_navbar_badge"><?php echo $badge['name']; ?></a>
				</div>
				<div id="award_scheme_content">
					<div id="badge_md">
						<?php
						if ($loggedIn) {
							callAPI('PUT', 'http://api.scoutdev.ga/v1/users/' . $_SESSION['id'], array("awardschemeViewed" => $badge['badge_id']), $_SESSION['user'], $_SESSION['passHash']);
						}
						if ($badge['image'] == NULL) {
							echo '<div class="center"><img src="/res/badge_placeholder.png" /></div>';
						} else {
							echo '<div class="center"><img src="' . $badge['image'] . '" /></div>';
						}
						
						$Parsedown = new Parsedown();
						echo $Parsedown
							->setBreaksEnabled(true)
							->text($badge['data']);
						?>
					</div>
				</div>
				<?php
				}
				?>
			</div>
		</main>
		<?php include '../includes/footer.php' ?>
		<script src="/js/main.js"></script>
		<script src="/js/award-scheme.js"></script>
	</body>
</html>