<?php
if (!$loggedIn) {
?>
<section id="loggedOutInfo">
	<div class="container">
		<h2>What are you waiting for?</h2>
		<p>With Scout, you can easily manage your <a href="/progress-tracker/">badges</a>, <a href="/schedule/">group schedule</a>, and view the <a href="/award-scheme/">full award scheme</a>. It works on all your devices, including <a href="#">Android</a> and <a href="#">iOS</a>. All for free. Scout is built <em>by</em> scouts, <em>for</em> scouts.</p>
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