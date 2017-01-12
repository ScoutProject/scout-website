<?php
include_once "../php/checkLogin.php";
$page = "/schedule/";
if (isset($_SERVER['PATH_INFO'])) { $request = explode('/', trim($_SERVER['PATH_INFO'],'/')); }

if (!$loggedIn) {
	echo 'Schedule Demo';
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Schedule - Scout</title>
		<?php include '../includes/head.php' ?>
		<link rel="stylesheet" href="/css/schedule.css" />
	</head>
	<body>
		<?php include '../includes/nav.php' ?>
		<?php
		$curTab = 'calendar';
		if (isset($_GET['calendar']))
			$curTab = 'calendar';
		if (isset($_GET['agenda']))
			$curTab = 'agenda';
		?>
		<main>
			<div id="schedule_top">
				<div id="schedule_tabs_container">
					<h2>Schedule</h2>
					<div id="radio_spinner_wrapper">
						<label for="radio_spinner">From</label>
						<div id="radio_spinner" onclick="return radioSpinner(event);">
							<span title="Test Group with a really really Long Name">Test Group with a really really Long Name</span>
							<svg viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
							<div id="radio_spinner_dialog" onclick="event.stopPropagation();">
								<span><input name="calendar" type="checkbox" value="all" id="spinner_all" onclick="return spinnerCheck(this.value);" checked /><label for="spinner_all">All</label></span>
								<div class="radio_spinner_div"></div>
								<?php #Generated ?>
								<span><input name="calendar" type="checkbox" value="1" id="spinner_1" onclick="return spinnerCheck(this.value);" checked /><label for="spinner_1" title="Test Group">Test Group</label></span>
								<span><input name="calendar" type="checkbox" value="2" id="spinner_2" onclick="return spinnerCheck(this.value);" checked /><label for="spinner_2" title="Monash Venturers">Monash Venturers</label></span>
								<span><input name="calendar" type="checkbox" value="3" id="spinner_3" onclick="return spinnerCheck(this.value);" checked /><label for="spinner_3" title="Test Group with a really really Long Name">Test Group with a really really Long Name</label></span>
							</div>
						</div>
					</div>
					<div id="tabs">
						<a id="tab_calendar" href="?calendar" onclick="return switchTab(1);" <?php if ($curTab == 'calendar') { echo 'class="active"'; } ?>>Calendar</a>
						<a id="tab_agenda" href="?agenda" onclick="return switchTab(2);" <?php if ($curTab == 'agenda') { echo 'class="active"'; } ?>>Agenda</a>
						<span class="flex_spacer"></span>
						<a id="tab_settings" title="Settings" href="?settings" onclick="return switchTab(3);"><svg viewBox="0 0 24 24"><path style="fill:inherit;" d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z" /></svg></a>
					</div>
				</div>
			</div>
			<div id="schedule_container" class="<?php echo $curTab; ?>">
				<div id="calendar">
					cal
				</div>
				<div id="agenda">
					age
				</div>
			</div>
		</main>
		<?php include '../includes/footer.php' ?>
		<script src="/js/main.js"></script>
		<script src="/js/schedule.js"></script>
	</body>
</html>