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
			<div id="dash_container">
				<div class="section progress">
					<h2>Your Progress</h2>
					<h3>In Progress</h3>
				</div>
				<div class="section schedule">
					<h2>Your Schedule</h2>
					<h3>Upcoming</h3>
					<div id="schedule_upcoming_list">
						<!-- TODO: Colour classes for coloured events -->
						<div class="schedule_upcoming indigo">
							<a class="schedule_upcoming_title" href="#">Lorem Event</a>
							<span class="schedule_upcoming_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</span>
							<a class="schedule_upcoming_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a><a class="schedule_upcoming_action calendar" href="#" title="Add to calendar"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,19V7H5V19H19M16,1H18V3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1M11,9H13V12H16V14H13V17H11V14H8V12H11V9Z" /></svg></a>
							<span class="schedule_upcoming_date">11 July, 2017</span>
						</div>
						<div class="schedule_upcoming teal">
							<a class="schedule_upcoming_title" href="#">Lorem Hall Night</a>
							<span class="schedule_upcoming_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa.</span>
							<a class="schedule_upcoming_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a><a class="schedule_upcoming_action calendar" href="#" title="Add to calendar"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,19V7H5V19H19M16,1H18V3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1M11,9H13V12H16V14H13V17H11V14H8V12H11V9Z" /></svg></a>
							<span class="schedule_upcoming_date">18 July, 2017</span>
						</div>
						<div class="schedule_upcoming light_blue">
							<a class="schedule_upcoming_title" href="#">Lorem Event with a really long lorem title that won't fit</a>
							<span class="schedule_upcoming_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</span>
							<a class="schedule_upcoming_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a><a class="schedule_upcoming_action calendar" href="#" title="Add to calendar"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,19V7H5V19H19M16,1H18V3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1M11,9H13V12H16V14H13V17H11V14H8V12H11V9Z" /></svg></a>
							<span class="schedule_upcoming_date">25 July, 2017</span>
						</div>
						<div class="schedule_upcoming amber">
							<a class="schedule_upcoming_title" href="#">Lorem Hall Night</a>
							<span class="schedule_upcoming_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa.</span>
							<a class="schedule_upcoming_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a><a class="schedule_upcoming_action calendar" href="#" title="Add to calendar"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,19V7H5V19H19M16,1H18V3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1M11,9H13V12H16V14H13V17H11V14H8V12H11V9Z" /></svg></a>
							<span class="schedule_upcoming_date">1 August, 2017</span>
						</div>
						<div class="schedule_upcoming yellow">
							<a class="schedule_upcoming_title" href="#">Lorem Event</a>
							<span class="schedule_upcoming_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</span>
							<a class="schedule_upcoming_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a><a class="schedule_upcoming_action calendar" href="#" title="Add to calendar"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,19V7H5V19H19M16,1H18V3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1M11,9H13V12H16V14H13V17H11V14H8V12H11V9Z" /></svg></a>
							<span class="schedule_upcoming_date">8 August, 2017</span>
						</div>
					</div>
				</div>
				<div class="section awardScheme">
					<h2>Award Scheme</h2>
					<h3>Recently Viewed</h3>
				</div>
				<div class="section dirk">
					<h2>Unlimited Dirk</h2>
					<h3>Sublorem iptitle</h3>
					<p>Dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk dirk.</p>
				</div>
			</div>
		</main>
		<?php include '../includes/footer.php' ?>
		<script src="/js/main.js"></script>
	</body>
</html>