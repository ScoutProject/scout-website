function openLevel(object, level) {
	if (object.parentElement.className.match(/(?:^|\s)open(?!\S)/)) {
		//open, close it
		object.parentElement.className = object.parentElement.className.replace( /(?:^|\s)open(?!\S)/g , '' );
	} else {
		//closed, open it
		object.parentElement.className += ' open';
	}
	return false;
}
function openAll() {
	var levels = document.getElementsByClassName('award_scheme_level');
	for (var i = 0; i < levels.length; i++) {
		if (!levels[i].className.match(/(?:^|\s)open(?!\S)/)) {
			levels[i].className += ' open';
		}
	}
	return false;
}
function closeAll() {
	var levels = document.getElementsByClassName('award_scheme_level');
	for (var i = 0; i < levels.length; i++) {
		if (levels[i].className.match(/(?:^|\s)open(?!\S)/)) {
			levels[i].className = levels[i].className.replace( /(?:^|\s)open(?!\S)/g , '' );
		}
	}
	return false;
}