<nav <?php if ($loggedIn) { echo 'class="loggedIn"'; } ?>>
	<?php if ($loggedIn) { ?>
		<a id="home_button" href="/">SCOUT</a>
		<div id="navItems">
			<a class="nav_item" href="/award-scheme/">Award Scheme</a>
			<a class="nav_item" href="/progress-tracker/">Progress Tracker</a>
			<a class="nav_item" href="/schedule/">Your Schedule</a>
			<a class="nav_item" href="/groups/">Your Groups</a>
			<!--<a class="nav_item" href="/dirkdirk/">Unlimited Dirk</a>-->
			<span class="flex_spacer"></span>
			<a id="profile_button" href="/profile/" onclick="return userMenu(event);">
				<img id="profile_button_picture" src="/res/avatar.png" />
				<span id="profile_button_name"><?php if (isset($_SESSION['realName']) && $_SESSION['realName'] != '') { echo $_SESSION['realName']; } else { echo $_SESSION['user']; } ?></span>
				<svg id="profile_button_chevron" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>
			</a>
			<div id="userMenu">
				<a href="/profile/">My Account</a>
				<a href="#">Leader Profile</a>
				<span class="topMenuDiv"></span>
				<a href="/logout/">Sign Out</a>
			</div>
		</div>
		<span id="vice_flex_spacer"></span>
		<div id="menu_button" title="Menu" tabindex="1" onclick="return mobileNav();">
			<div class="menu_button_bar"></div>
			<div class="menu_button_bar"></div>
			<div class="menu_button_bar"></div>
		</div>
	<?php } else { ?>
		<a id="home_button" href="/">SCOUT</a>
		<span class="flex_spacer"></span>
		<a id="login_button" href="/login/" onclick="return loginModal();">LOGIN</a>
	<?php } ?>
</nav>