<?php
function callAPI($method, $url, $data = false) {
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

$status = 'Post not set';
if (isset($_POST['action'])) {
	//Login
	if ($_POST['action'] == "login") {
		$username = $_POST['user'];
		$raw_password = $_POST['pass'];
		if (isset($_POST['remember'])) {
			$remember = $_POST['remember'];
		} else {
			$remember = false;
		}

		//Connect to the database
		include_once '../php/database.php';

		$result = mysqli_query($connection, "SELECT id, username, password, email, realName FROM users WHERE username='$username' OR email='$username'");
		
		//Query for the username
		if ($result && mysqli_num_rows($result) > 0) {
			//Add the results to an array
			$data = array();
			$i = 0;
			while ($row = mysqli_fetch_array($result)) {
				$data[$i] = array('id' => $row['id'], 'username' => $row['username'], 'password' => $row['password'], 'email' => $row['email'], 'realName' => $row['realName']);
				$i++;
			}
			
			//If pass correct
			if (password_verify($raw_password, $data[0]['password'])) {
				//Password correct!
				$cookieData = array("username" => $data[0]['username'], "passHash" => $data[0]['password']);
				setcookie("scouta", base64_encode(json_encode($cookieData)), time()+864000); //Delete after 10 days
				
				//Update currentIp
				$result = mysqli_query($connection, "UPDATE users SET currentIp='" . $_SERVER['REMOTE_ADDR'] . "', lastLoginDate=NOW() WHERE id='" . $data[0]['id'] . "'");
				
				//Make a session
				session_start();
				$_SESSION['id'] = $data[0]['id'];
				$_SESSION['user'] = $data[0]['username'];
				$_SESSION['email'] = $data[0]['email'];
				$_SESSION['realName'] = $data[0]['realName'];
				if (isset($_POST['prev_location']) && $_POST['prev_location'] != "/home/") {
					header('Location: ' . $_POST['prev_location']);
				} else {
					header('Location: /');
				}
				exit;
			} else {
				//Password incorrect
				$status = "Error: Username or password is incorrect.";
			}
		} else {
			//Username incorrect
			$status = "Error: Username or password is incorrect.";
		}

		//Close the connection
		mysqli_close($connection);
	}

	//Signup
	if ($_POST['action'] == "signup") {
		$username = $_POST['user'];
		$email = $_POST['email'];
		$raw_password = $_POST['pass'];
		$raw_password_repeat = $_POST['passRepeat'];

		$result = callAPI('POST', 'http://api.scoutdev.ga/v1/users/new', array("user" => $username, "email" => $email, "pass" => $raw_password, "passRepeat" => $raw_password_repeat));
		$result = json_decode($result, true);
		
		if (empty($result['status'])) {
			$cookieData = array("username" => $result['username'], "passHash" => $result['password_hash']);
			setcookie("scouta", base64_encode(json_encode($cookieData)), time()+864000); //Delete after 10 days
			//Send them to the home page, which should make a session from the cookie
			header('Location: /');
			exit;
		} else {
			$status = $result['msg'];
		}
	}
}