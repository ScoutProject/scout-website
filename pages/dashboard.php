<?php
include_once "../php/checkLogin.php";
$page = "/";

if (!$loggedIn) {
	header('Location: /home/');
	exit;
}

function truncate($string,$length=100,$append="&hellip;") {
  $string = trim($string);

  if(strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n", $string, 2);
    $string = $string[0] . $append;
  }

  return $string;
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
					<div id="progress_item_list">
						<div class="progress_item red">
							<a href="#" class="progress_item_title" title="VA Service">VA Service</a>
							<span class="progress_item_date">4th July, 2017 - 6th July, 2017</span>
							<span class="progress_item_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</span>
							<div class="progress_item_actions">
								<a class="progress_item_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a>
								<a class="progress_item_action star checked" href="#" title="Unstar"></a>
								<span class="flex_spacer"></span>
								<a class="progress_item_action done" href="#">Done</a>
							</div>
						</div>
						<div class="progress_item green">
							<a href="#" class="progress_item_title" title="QS Expedition">QS Expedition</a>
							<span class="progress_item_date">10th September, 2017 - 17th September, 2017</span>
							<span class="progress_item_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</span>
							<div class="progress_item_actions">
								<a class="progress_item_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a>
								<a class="progress_item_action star" href="#" title="Star"></a>
								<span class="flex_spacer"></span>
								<a class="progress_item_action done" href="#">Done</a>
							</div>
						</div>
						<div class="progress_item green">
							<a href="#" class="progress_item_title" title="QS First Aid">QS First Aid</a>
							<span class="progress_item_date">2nd February, 2018 - 2nd February, 2018</span>
							<span class="progress_item_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</span>
							<div class="progress_item_actions">
								<a class="progress_item_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a>
								<a class="progress_item_action star" href="#" title="Star"></a>
								<span class="flex_spacer"></span>
								<a class="progress_item_action done" href="#">Done</a>
							</div>
						</div>
					</div>
				</div>
				<div class="section schedule">
					<h2>Your Schedule</h2>
					<h3>Upcoming</h3>
					<div id="schedule_upcoming_list">
						<!-- TODO: Colour classes for coloured events -->
						<div class="schedule_upcoming indigo">
							<a class="schedule_upcoming_title" href="#" title="Lorem Event">Lorem Event</a>
							<span class="schedule_upcoming_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</span>
							<a class="schedule_upcoming_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a><a class="schedule_upcoming_action calendar" href="#" title="Add to calendar"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,19V7H5V19H19M16,1H18V3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1M11,9H13V12H16V14H13V17H11V14H8V12H11V9Z" /></svg></a>
							<span class="schedule_upcoming_date">11 July, 2017</span>
						</div>
						<div class="schedule_upcoming teal">
							<a class="schedule_upcoming_title" href="#" title="Lorem Hall Night">Lorem Hall Night</a>
							<span class="schedule_upcoming_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa.</span>
							<a class="schedule_upcoming_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a><a class="schedule_upcoming_action calendar" href="#" title="Add to calendar"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,19V7H5V19H19M16,1H18V3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1M11,9H13V12H16V14H13V17H11V14H8V12H11V9Z" /></svg></a>
							<span class="schedule_upcoming_date">18 July, 2017</span>
						</div>
						<div class="schedule_upcoming light_blue">
							<a class="schedule_upcoming_title" href="#" title="Lorem Event with a really long lorem title that won't fit">Lorem Event with a really long lorem title that won't fit</a>
							<span class="schedule_upcoming_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</span>
							<a class="schedule_upcoming_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a><a class="schedule_upcoming_action calendar" href="#" title="Add to calendar"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,19V7H5V19H19M16,1H18V3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1M11,9H13V12H16V14H13V17H11V14H8V12H11V9Z" /></svg></a>
							<span class="schedule_upcoming_date">25 July, 2017</span>
						</div>
						<div class="schedule_upcoming amber">
							<a class="schedule_upcoming_title" href="#" title="Lorem Hall Night">Lorem Hall Night</a>
							<span class="schedule_upcoming_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa.</span>
							<a class="schedule_upcoming_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a><a class="schedule_upcoming_action calendar" href="#" title="Add to calendar"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,19V7H5V19H19M16,1H18V3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1M11,9H13V12H16V14H13V17H11V14H8V12H11V9Z" /></svg></a>
							<span class="schedule_upcoming_date">1 August, 2017</span>
						</div>
						<div class="schedule_upcoming yellow">
							<a class="schedule_upcoming_title" href="#" title="Lorem Event">Lorem Event</a>
							<span class="schedule_upcoming_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</span>
							<a class="schedule_upcoming_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a><a class="schedule_upcoming_action calendar" href="#" title="Add to calendar"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,19V7H5V19H19M16,1H18V3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1M11,9H13V12H16V14H13V17H11V14H8V12H11V9Z" /></svg></a>
							<span class="schedule_upcoming_date">8 August, 2017</span>
						</div>
					</div>
				</div>
				<div class="section awardScheme">
					<h2>Award Scheme</h2>
					<h3>Recently Viewed</h3>
					<div id="awardscheme_viewed_list">
						<?php
						$user = callAPI('GET', 'http://api.scoutdev.ga/v1/users/' . $_SESSION['id']);
						$user = json_decode($user, true);
						
						if ($user['awardschemeViewed'] != '') {
							$awardSchemeViewed = explode(',', $user['awardschemeViewed']);

							for ($i = 0; $i < count($awardSchemeViewed); $i++) {
								$curBadge = callAPI('GET', 'http://api.scoutdev.ga/v1/award_scheme/' . $awardSchemeViewed[$i]);
								$curBadge = json_decode($curBadge, true);
								
								if (empty($curBadge['status'])) {
									?>
									<div class="awardscheme_viewed level<?php echo $curBadge['level_id']; ?>">
										<img class="awardscheme_viewed_image" alt="Badge image" src="<?php if ($curBadge['image'] != NULL) { echo $curBadge['image']; } else { echo '/res/badge_placeholder.png'; } ?>" />
										<div class="awardscheme_viewed_text">
											<a class="awardscheme_viewed_title" href="/award-scheme/<?php echo preg_replace("/[\s]/", "-", strtolower($curBadge['level'])); ?>/<?php echo preg_replace("/[\s]/", "-", strtolower($curBadge['sublevel'])); ?>/<?php echo preg_replace("/[\s]/", "-", strtolower($curBadge['name'])); ?>/" title="<?php echo $curBadge['name']; ?>"><?php echo $curBadge['name']; ?></a>
											<span class="awardscheme_viewed_description"><?php echo truncate(preg_replace('/[^a-z0-9.,!& :;\'"]+/i', '', $curBadge['data']), 100); ?></span>
										</div>
									</div>
									<?php
								}
							}
						} else {
						?>
						<div class="dash_nothing_here">
							<svg viewBox="0 0 24 24"><path fill="#999999" d="M7.5,5.6L5,7L6.4,4.5L5,2L7.5,3.4L10,2L8.6,4.5L10,7L7.5,5.6M19.5,15.4L22,14L20.6,16.5L22,19L19.5,17.6L17,19L18.4,16.5L17,14L19.5,15.4M22,2L20.6,4.5L22,7L19.5,5.6L17,7L18.4,4.5L17,2L19.5,3.4L22,2M13.34,12.78L15.78,10.34L13.66,8.22L11.22,10.66L13.34,12.78M14.37,7.29L16.71,9.63C17.1,10 17.1,10.65 16.71,11.04L5.04,22.71C4.65,23.1 4,23.1 3.63,22.71L1.29,20.37C0.9,20 0.9,19.35 1.29,18.96L12.96,7.29C13.35,6.9 14,6.9 14.37,7.29Z" /></svg>
							You haven't looked at any badges in the award scheme yet! Start <a href="/award-scheme/">here</a>.
						</div>
						<?php
						}
						?>
					</div>
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