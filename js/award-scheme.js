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