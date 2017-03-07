<?php
include_once "../php/checkLogin.php";
$page = "/contact/";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Contact - Scout</title>
		<?php include '../includes/head.php' ?>
		<link rel="stylesheet" href="/css/contact.css" />
	</head>
	<body>
		<?php include '../includes/nav.php' ?>
		<?php include '../includes/modals.php' ?>
		<main>
			<div id="contact_container">
				<h2>Contact</h2>
				<p>Need to get in touch? Please use the form below. We read everything you send us.</p>
				<form method="post" action="./">
					<table cellspacing="0">
						<tr>
							<td>
								<label for="name">Name</label>
								<input type="text" id="name" name="name" />
							</td>
							<td>
								<label for="email">Email address</label>
								<input type="email" id="email" name="email" />
							</td>
						</tr>
						<tr>
							<td>
								<label for="reason">Reason for contact</label>
								<select id="reason" name="reason">
									<option value="comment">Comment</option>
									<option value="bug">Bug/Issue</option>
									<option value="suggestion">Suggestion</option>
									<option value="support">Support</option>
								</select>
							</td>
							<td>
								<label for="message">Message</label>
								<textarea id="message" name="message" rows="5"></textarea>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</main>
		<?php include '../includes/footer.php' ?>
		<script src="/js/main.js"></script>
	</body>
</html>