<?php
function callAPI($method, $url, $data = false, $user = false, $pass = false) {
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
	if ($user && $pass) {
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_USERPWD, "$user:$pass");
	}

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

		$result = callAPI('GET', 'http://api.scoutdev.ga/v1/login', false, $username, $raw_password);
		$result = json_decode($result, true);

		if (empty($result['status'])) {
			$cookieData = array("username" => $result['username'], "passHash" => $result['password_hash']);
			setcookie("scouta", base64_encode(json_encode($cookieData)), time()+864000); //Delete after 10 days

			//Make a session
			session_start();
			$_SESSION['id'] = $result['id'];
			$_SESSION['user'] = $result['username'];
			$_SESSION['email'] = $result['email'];
			$_SESSION['realName'] = $result['realName'];
			if (isset($_POST['prev_location']) && $_POST['prev_location'] != "/home/") {
				header('Location: ' . $_POST['prev_location']);
			} else {
				header('Location: /');
			}
			exit;
		} else {
			$status = $result['msg'];
		}
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