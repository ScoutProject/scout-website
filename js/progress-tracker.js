function switchTab(tab) {
	if (tab == 1) {
		if (document.getElementById('tracker_tasks_container').classList.contains('completed')) {
			document.getElementById('tab_in-progress').classList.add('active');
			document.getElementById('tab_completed').classList.remove('active');
			document.getElementById('tracker_tasks_container').className = 'in-progress';
		}
	} else if (tab == 2) {
		if (document.getElementById('tracker_tasks_container').classList.contains('in-progress')) {
			document.getElementById('tab_in-progress').classList.remove('active');
			document.getElementById('tab_completed').classList.add('active');
			document.getElementById('tracker_tasks_container').className = 'completed';
		}
	}
	return false;
}