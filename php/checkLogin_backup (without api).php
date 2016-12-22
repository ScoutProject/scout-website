<?php
session_start();
if (isset($_COOKIE['scouta'])) {
	$cookie_data = (array)json_decode(base64_decode($_COOKIE['scouta']));
	
	//Connect to the database
	include_once '../php/database.php';
	
	if ($result = mysqli_query($connection, "SELECT id, username, password, email, realName FROM users WHERE username='" . $cookie_data['username'] . "'")) {
		//Query for the username
		if (mysqli_num_rows($result) > 0) {
			//Add the results to an array
			$data = array();
			$i = 0;
			while ($row = mysqli_fetch_array($result)) {
				$data[$i] = array('id' => $row['id'], 'username' => $row['username'], 'password' => $row['password'], 'email' => $row['email'], 'realName' => $row['realName']);
				$i++;
			}
			
			//If pass correct
			if ($cookie_data['passHash'] == $data[0]['password']) {
				//Password correct!
				$cookieData = array("username" => $cookie_data['username'], "passHash" => $data[0]['password']);
				setcookie("scouta", base64_encode(json_encode($cookieData)), time()+864000); //Delete after 10 days
				
				$_SESSION['id'] = $data[0]['id'];
				$_SESSION['user'] = $data[0]['username'];
				$_SESSION['email'] = $data[0]['email'];
				$_SESSION['realName'] = $data[0]['realName'];
			} else {
				//Pass wrong
				setcookie("scouta","gone",time()-1);
			}
		} else {
			//Username wrong
			setcookie("scouta","gone",time()-1);
		}
	}
}
if (isset($_SESSION['user']) && isset($_SESSION['email'])) {
	$loggedIn = true;
} else {
	$loggedIn = false;
}