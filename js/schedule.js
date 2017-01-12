var radioSpinnerOpen = false;
function switchTab(tab) {
	if (tab == 1) {
		if (document.getElementById('schedule_container').classList.contains('agenda')) {
			document.getElementById('tab_calendar').classList.add('active');
			document.getElementById('tab_agenda').classList.remove('active');
			document.getElementById('schedule_container').className = 'calendar';
		}
	} else if (tab == 2) {
		if (document.getElementById('schedule_container').classList.contains('calendar')) {
			document.getElementById('tab_calendar').classList.remove('active');
			document.getElementById('tab_agenda').classList.add('active');
			document.getElementById('schedule_container').className = 'agenda';
		}
	} else if (tab == 3) {
		alert('Settings!!');
	}
	return false;
}

function radioSpinner(e = null) {
	if (e != null) {
		e.stopPropagation();
	}
	if (radioSpinnerOpen) {
		document.getElementById('radio_spinner_dialog').className = '';
		radioSpinnerOpen = false;
	} else {
		document.getElementById('radio_spinner_dialog').className = 'open';
		radioSpinnerOpen = true;
	}
	return false;
}
document.getElementsByTagName('body')[0].addEventListener("click", function() {
	if (radioSpinnerOpen) {
		radioSpinner();
	}
});

function spinnerCheck(checkbox) {
	var cb = document.getElementById('spinner_' + checkbox);
	if (checkbox == 'all') {
		if (cb.readOnly) {
			cb.checked = true;
			cb.readOnly = false;
			var children = document.querySelectorAll('#radio_spinner_dialog input:not(#spinner_all)');
			for (var i = 0; i < children.length; i++) {
				children[i].checked = true;
			}
		} else if (!cb.checked) {
			return false;
		}
	} else {
		if (!cb.checked) {
			//Checkbox unchecked
			document.getElementById('spinner_all').readOnly = true;
			document.getElementById('spinner_all').indeterminate = true;
			var count = 0;
			var children = document.querySelectorAll('#radio_spinner_dialog input:not(#spinner_all)');
			for (var i = 0; i < children.length; i++) {
				if (!children[i].checked) {
					count++;
				}
			}
			if (count == children.length) {
				return false;
			}
		} else {
			//Checkbox checked
			var ind = false;
			var children = document.querySelectorAll('#radio_spinner_dialog input:not(#spinner_all)');
			for (var i = 0; i < children.length; i++) {
				if (!children[i].checked) {
					ind = true;
				}
			}
			if (!ind) {
				//If all checkboxes checked
				document.getElementById('spinner_all').readOnly = false;
				document.getElementById('spinner_all').checked = true;
				document.getElementById('spinner_all').indeterminate = false;
			}
		}
	}
	
	//Update spinner preview
	var labels = document.querySelectorAll('#radio_spinner_dialog input:checked + label');
	var otherLabels = document.querySelectorAll('#radio_spinner_dialog label');
	if (labels.length != otherLabels.length) {
		var previewArray = [];
		for (var i = 0; i < labels.length; i++) {
			previewArray[i] = labels[i].innerHTML;
		}
		document.querySelector('#radio_spinner > span').innerHTML = previewArray.join(', ');
		document.querySelector('#radio_spinner > span').title = previewArray.join(', ');
	} else {
		document.querySelector('#radio_spinner > span').innerHTML = 'All';
		document.querySelector('#radio_spinner > span').title = 'All';
	}
}