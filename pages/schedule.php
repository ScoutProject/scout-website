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
							<span title="All">All</span>
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
					<div id="cal_actions">
						<a href="#" class="cal_action prev_month" title="Previous month"><svg viewBox="0 0 24 24"><path style="fill:inherit;" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" /></svg></a>
						<a href="#" class="cal_action cur_day" title="Today"><svg viewBox="0 0 24 24"><path style="fill:inherit;" d="M7,10H12V15H7M19,19H5V8H19M19,3H18V1H16V3H8V1H6V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3Z" /></svg></a>
						<a href="#" class="cal_action next_month" title="Next month"><svg viewBox="0 0 24 24"><path style="fill:inherit;" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg></a>
						<span id="cal_month_title">January 2017</span>
						<span class="flex_spacer"></span>
						<a href="#" class="cal_action new"><svg viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" /></svg> New event</a>
					</div>
					<table id="cal_month">
						<thead>
							<tr>
								<td>Mon</td>
								<td>Tue</td>
								<td>Wed</td>
								<td>Thu</td>
								<td>Fri</td>
								<td>Sat</td>
								<td>Sun</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="faded">
									<span class="cal_month_number">26</span>
								</td>
								<td class="faded">
									<span class="cal_month_number">27</span>
									<div class="cal_events">
										<a href="#" class="cal_event orange" title="Event">Event</a>
									</div>
								</td>
								<td class="faded">
									<span class="cal_month_number">28</span>
								</td>
								<td class="faded">
									<span class="cal_month_number">29</span>
								</td>
								<td class="faded">
									<span class="cal_month_number">30</span>
								</td>
								<td class="faded">
									<span class="cal_month_number">31</span>
								</td>
								<td>
									<span class="cal_month_number">1</span>
								</td>
							</tr>
							<tr>
								<td>
									<span class="cal_month_number">2</span>
								</td>
								<td>
									<span class="cal_month_number">3</span>
									<div class="cal_events">
										<a href="#" class="cal_event orange" title="Event">Event</a>
										<a href="#" class="cal_event green" title="Event">Event</a>
										<a href="#" class="cal_event blue" title="Event">Event</a>
									</div>
								</td>
								<td>
									<span class="cal_month_number">4</span>
								</td>
								<td>
									<span class="cal_month_number">5</span>
								</td>
								<td class="today">
									<span class="cal_month_number">6</span>
									<div class="cal_events">
										<a href="#" class="cal_event purple" title="Event with a rather long title">Event with a rather long title</a>
									</div>
								</td>
								<td>
									<span class="cal_month_number">7</span>
								</td>
								<td>
									<span class="cal_month_number">8</span>
								</td>
							</tr>
							<tr>
								<td>
									<span class="cal_month_number">9</span>
								</td>
								<td>
									<span class="cal_month_number">10</span>
								</td>
								<td>
									<span class="cal_month_number">11</span>
									<div class="cal_events">
										<a href="#" class="cal_event green" title="Two-day Event">Two-day Event</a>
									</div>
								</td>
								<td>
									<span class="cal_month_number">12</span>
									<div class="cal_events">
										<a href="#" class="cal_event green" title="Two-day Event">Two-day Event</a>
									</div>
								</td>
								<td>
									<span class="cal_month_number">13</span>
								</td>
								<td>
									<span class="cal_month_number">14</span>
								</td>
								<td>
									<span class="cal_month_number">15</span>
								</td>
							</tr>
							<tr>
								<td>
									<span class="cal_month_number">16</span>
								</td>
								<td>
									<span class="cal_month_number">17</span>
								</td>
								<td>
									<span class="cal_month_number">18</span>
								</td>
								<td>
									<span class="cal_month_number">19</span>
								</td>
								<td>
									<span class="cal_month_number">20</span>
								</td>
								<td>
									<span class="cal_month_number">21</span>
								</td>
								<td>
									<span class="cal_month_number">22</span>
								</td>
							</tr>
							<tr>
								<td>
									<span class="cal_month_number">23</span>
								</td>
								<td>
									<span class="cal_month_number">24</span>
								</td>
								<td>
									<span class="cal_month_number">25</span>
								</td>
								<td>
									<span class="cal_month_number">26</span>
								</td>
								<td>
									<span class="cal_month_number">27</span>
								</td>
								<td>
									<span class="cal_month_number">28</span>
									<div class="cal_events">
										<a href="#" class="cal_event pink" title="Lorem Day">Lorem Day</a>
										<a href="#" class="cal_event yellow" title="Ipsum Night">Ipsum Night</a>
									</div>
								</td>
								<td>
									<span class="cal_month_number">29</span>
								</td>
							</tr>
							<tr>
								<td>
									<span class="cal_month_number">30</span>
								</td>
								<td>
									<span class="cal_month_number">31</span>
									<div class="cal_events">
										<a href="#" class="cal_event red" title="Last Day of January">Last Day of January</a>
									</div>
								</td>
								<td class="faded">
									<span class="cal_month_number">1</span>
								</td>
								<td class="faded">
									<span class="cal_month_number">2</span>
								</td>
								<td class="faded">
									<span class="cal_month_number">3</span>
								</td>
								<td class="faded">
									<span class="cal_month_number">4</span>
								</td>
								<td class="faded">
									<span class="cal_month_number">5</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div id="agenda">
					<div id="age_actions">
						<span class="flex_spacer"></span>
						<a href="#" class="age_action new"><svg viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" /></svg> New event</a>
					</div>
					<table id="age_container">
						<tbody>
							<tr>
								<td class="age_section"><span>Today</span></td>
								<td class="age_date"><span>6 January, 2016</span><span>6/1/2016</span></td>
								<td class="age_event">
									<div class="age_event_card purple">
										<a class="age_event_title" href="#" title="Event with a rather long title">Event with a rather long title</a>
										<span class="age_event_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</span>
										<a class="age_event_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a><a class="age_event_action calendar" href="#" title="Add to calendar"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,19V7H5V19H19M16,1H18V3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1M11,9H13V12H16V14H13V17H11V14H8V12H11V9Z" /></svg></a>
									</div>
								</td>
							</tr>
							<tr>
								<td class="age_section" rowspan="5"><span>Upcoming</span></td>
								<td class="age_date"><span>11 January, 2016</span><span>11/1/2016</span></td>
								<td class="age_event">
									<div class="age_event_card green">
										<a class="age_event_title" href="#" title="Two-day Event">Two-day Event</a>
										<span class="age_event_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.</span>
										<a class="age_event_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a><a class="age_event_action calendar" href="#" title="Add to calendar"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,19V7H5V19H19M16,1H18V3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1M11,9H13V12H16V14H13V17H11V14H8V12H11V9Z" /></svg></a>
									</div>
								</td>
							</tr>
							<tr>
								<td class="age_date"><span>12 January, 2016</span><span>12/1/2016</span></td>
								<td class="age_event">
									<div class="age_event_card green">
										<a class="age_event_title" href="#" title="Two-day Event">Two-day Event</a>
									</div>
								</td>
							</tr>
							<tr>
								<td class="age_date" rowspan="2"><span>28 January, 2016</span><span>28/1/2016</span></td>
								<td class="age_event">
									<div class="age_event_card pink">
										<a class="age_event_title" href="#" title="Lorem Day">Lorem Day</a>
										<span class="age_event_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</span>
										<a class="age_event_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a><a class="age_event_action calendar" href="#" title="Add to calendar"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,19V7H5V19H19M16,1H18V3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1M11,9H13V12H16V14H13V17H11V14H8V12H11V9Z" /></svg></a>
									</div>
								</td>
							</tr>
							<tr>
								<td class="age_event">
									<div class="age_event_card yellow">
										<a class="age_event_title" href="#" title="Ipsum Night">Ipsum Night</a>
										<span class="age_event_description">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</span>
										<a class="age_event_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a><a class="age_event_action calendar" href="#" title="Add to calendar"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,19V7H5V19H19M16,1H18V3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1M11,9H13V12H16V14H13V17H11V14H8V12H11V9Z" /></svg></a>
									</div>
								</td>
							</tr>
							<tr>
								<td class="age_date"><span>31 January, 2016</span><span>31/1/2016</span></td>
								<td class="age_event">
									<div class="age_event_card red">
										<a class="age_event_title" href="#" title="Last Day of January">Last Day of January</a>
										<span class="age_event_description">Description</span>
										<a class="age_event_action share" href="#" title="Share"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z" /></svg></a><a class="age_event_action calendar" href="#" title="Add to calendar"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path style="fill:inherit;" d="M19,19V7H5V19H19M16,1H18V3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H6V1H8V3H16V1M11,9H13V12H16V14H13V17H11V14H8V12H11V9Z" /></svg></a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<?php include '../includes/footer.php' ?>
		<script src="/js/main.js"></script>
		<script src="/js/schedule.js"></script>
	</body>
</html>