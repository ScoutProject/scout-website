<?php
//Not included in Github for good reason
include_once "../php/database_creds.php";

$connection = mysqli_connect($sql_server, $sql_username, $sql_password, $sql_database);
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}