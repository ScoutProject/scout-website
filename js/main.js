//Main.js
//For the login/signup modals and stuff on every page

var loginModalOpen, signupModalOpen, userMenuOpen, mobileNavOpen = false;

function loginModal() {
	if (loginModalOpen) {
		document.getElementById('loginModal').className = '';
		document.getElementsByTagName('body')[0].className = '';
		loginModalOpen = false;
	} else {
		if (signupModalOpen) {
			document.getElementById('signupModal').className = '';
			signupModalOpen = false;
		} else {
			document.getElementsByTagName('body')[0].className = 'modalOpen';
		}
		document.getElementById('loginModal').className = 'open';
		loginModalOpen = true;
	}
	return false;
}

function signupModal() {
	if (signupModalOpen) {
		document.getElementById('signupModal').className = '';
		document.getElementsByTagName('body')[0].className = '';
		signupModalOpen = false;
	} else {
		if (loginModalOpen) {
			document.getElementById('loginModal').className = '';
			loginModalOpen = false;
		} else {
			document.getElementsByTagName('body')[0].className = 'modalOpen';
		}
		document.getElementById('signupModal').className = 'open';
		signupModalOpen = true;
	}
	return false;
}

function mobileNav() {
	if (mobileNavOpen) {
		document.getElementById('navItems').className = '';
		document.getElementById('menu_button').className = '';
		mobileNavOpen = false;
	} else {
		document.getElementById('navItems').className = 'open';
		document.getElementById('menu_button').className = 'open';
		mobileNavOpen = true;
	}
	return false;
}

function userMenu(e = null) {
	if (e != null) {
		e.stopPropagation();
	}
	if (userMenuOpen) {
		document.getElementById('userMenu').className = '';
		userMenuOpen = false;
	} else {
		document.getElementById('userMenu').className = 'open';
		userMenuOpen = true;
	}
	return false;
}
document.getElementsByTagName('body')[0].onclick = function() {
	if (userMenuOpen) {
		userMenu();
	}
}