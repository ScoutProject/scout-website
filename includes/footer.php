<?php
if (!$loggedIn) {
?>
<section id="loggedOutInfo">
	<div class="container">
		<h2>What are you waiting for?</h2>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus <a href="#">malesuada libero</a>, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus.</p>
		<div class="center"><a href="/login/" onclick="return signupModal();" class="button">Get Started!</a></div>
	</div>
</section>
<?php
}
?>
<footer>
	<div class="container">
		<div id="footerLinks">
			<a href="/contact/">Contact</a>
			<a href="/faq/">FAQ</a>
			<a href="/privacy-policy/">Privacy Policy</a>
			<a href="/terms-conditions/">T&C's</a>
			<span class="footerDiv"></span>
			<a href="#">iOS App</a>
			<a href="#">Android App</a>
			<span class="footerDiv"></span>
			<a href="#">Facebook</a>
			<a href="#">Twitter</a>
		</div>
		<div id="footerInfo">Created and maintained by Benjamin Grant. &copy; Scout 2016</div>
	</div>
</footer>