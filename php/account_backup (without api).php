<?php
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
		
		//Validate username
		if (!preg_match('/^[A-Za-z0-9-_]{3,45}$/', $username)) {
			$status = "Error: Username must be longer than 2 characters and shorter than 46 characters, and must only contain letters, numbers, hyphens and underscores.";
		} else {
			//Check passwords match
			if ($raw_password != $raw_password_repeat) {
				$status = "Error: Passwords must match.";
			} else {
				//Vaidate password
				if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,72}$/', $raw_password)) {
					$status = "Error: Password must be longer than 7 characters, and must only contain at least one lowercase letter, one uppercase letter and one number.";
				} else {
					//Validate email
					if (filter_var(strtolower(trim($email)), FILTER_VALIDATE_EMAIL) === false) {
						$status = "Error: Email address is not valid.";
					} else {
						//Connect to the database
						include_once '../php/database.php';

						$result = mysqli_query($connection, "SELECT username FROM users WHERE UPPER(username)=UPPER('$username')");
						//If username exists in db already
						if ($result && mysqli_num_rows($result) > 0) {
							mysqli_free_result($result);
							$status = "Error: Username is taken.";
						} else {
							//Make the new account
							$password_hash = password_hash($raw_password, PASSWORD_DEFAULT);
							if (mysqli_query($connection, "INSERT INTO users (username, password, email, registerDate, originalIp) VALUES ('$username','$password_hash','" . strtolower(trim($email)) . "',NOW(),'" . $_SERVER['REMOTE_ADDR'] . "')")) {
								$status = "Success: New user created successfully.";

								$cookieData = array("username" => $username, "passHash" => $password_hash);
								setcookie("scouta", base64_encode(json_encode($cookieData)), time()+864000); //Delete after 10 days
								//Send them to the home page, which should make a session from the cookie
								header('Location: /');
								exit;
							} else {
								$status = "Error: SQL error.";
							}
						}
						mysqli_close($connection);
					}
				}
			}
		}
	}
}