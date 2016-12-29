<?php
if (!function_exists("callAPI")) {
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
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
				
				if ($data)
					curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
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
}

session_start();
if (isset($_COOKIE['scouta'])) {
	$cookie_data = (array)json_decode(base64_decode($_COOKIE['scouta']));
	
	$result = callAPI('GET', 'http://api.scoutdev.ga/v1/login', false, $cookie_data['username'], $cookie_data['passHash']);
	$result = json_decode($result, true);

	if (empty($result['status'])) {
		$cookieData = array("username" => $result['username'], "passHash" => $result['password_hash']);
		setcookie("scouta", base64_encode(json_encode($cookieData)), time()+864000, "/"); //Delete after 10 days
		
		$_SESSION['id'] = $result['id'];
		$_SESSION['user'] = $result['username'];
		$_SESSION['passHash'] = $result['password_hash'];
		$_SESSION['email'] = $result['email'];
		$_SESSION['realName'] = $result['realName'];
	} else {
		$status = $result['msg'];
		setcookie("scouta","gone",time()-1,"/");
	}
}
if (isset($_SESSION['user']) && isset($_SESSION['email'])) {
	$loggedIn = true;
} else {
	$loggedIn = false;
}