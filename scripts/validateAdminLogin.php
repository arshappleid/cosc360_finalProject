<?php
require_once("./../sql/login_functions.php");
$username = $password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$valid = validDateAdmin($username, $password);

	if ($valid) {
		// go to the Store
		header("Location: ./../views/pages/adminDeleteUser.php");
	} else {
		// show an error message
		header("Location: ./../views/pages/adminLogin.php?message=Invalid Login");
	}
}
