<?php
require_once("./../sql/login_functions.php");
$username = $password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$valid = validDateUser($username, $password);

	if ($valid) {
		// go to the Store
		header("Location: ../views/pages/browse.php?user=$username");
	} else {
		// show an error message
		header("Location: ../index.php");
	}
}
