<?php
$host = "localhost";
$database = "lab_9";
$user = "test";   // i created a new user using this login for the db
$password = "password";

$connection = mysqli_connect($host, $user, $password, $database);

// will return the data as an associative array from a sql query.
function getData($sql_query)
{
	global $connection;
	$error = mysqli_connect_error();
	if ($error != null) {
		return ("Unable to connect to database");
	} else {
		//good connection, so do you thing
		// check if user exists 

		$result = mysqli_query($connection, $sql_query);
		$data = array();
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
		} else {
			return ("No data returned.");
		}
		mysqli_free_result($result);
		return $data;
	}
}

// Returns boolean if the user exists , in the users table.
// We pass it the normally written password
function validDateUser($username, $password)
{
	global $connection;
	$error = mysqli_connect_error();

	if ($error != null) {
		echo ("Unable to connect to database");
	} else {
		//good connection, so do you thing
		// check if user exists 
		$query = "SELECT * FROM users WHERE username = '$username'";
		$result = mysqli_query($connection, $query);

		$row = mysqli_fetch_assoc($result);

		if ($row == null) {
			return false;
		}

		echo $row;
		if ($row['password'] == md5($password)) {
			return true;
		} else {
			return false;
		}
	}
}

function addUser($firstname, $lastname, $email, $username, $password)
{
	$md5_hashed_paswd = md5($password);
	global $connection;
	$error = mysqli_connect_error();
	if ($error != null) {
		echo ("Unable to connect to database");
	} else {
		//good connection, so do you thing
		// check if user exists
		$exists = validDateUser($username, $password);
		//echo "Account validated";
		if (!$exists) {
			$query = "INSERT INTO users (firstName, lastName, username,email ,password) VALUES ('$firstname', '$lastname', '$username', '$email','$md5_hashed_paswd')";
			$result = mysqli_query($connection, $query);
			if ($result) {
				return "User Added.";
			} else {
				return "Error occured while adding to the database.";
			}
		} else {
			return "User Already exists";
		}
	}
}

function addAdmin($firstname, $lastname, $email, $username, $password)
{

	$md5_hashed_paswd = md5($password);
	global $connection;
	$error = mysqli_connect_error();
	if ($error != null) {
		echo ("Unable to connect to database");
	} else {
		//good connection, so do you thing
		// check if user exists
		$exists = validDateAdmin($username, $password);
		//echo "Account validated";
		if (!$exists) {
			$query = "INSERT INTO admins (firstName, lastName, username,email ,password) VALUES ('$firstname', '$lastname', '$username', '$email','$md5_hashed_paswd')";
			$result = mysqli_query($connection, $query);
			if ($result) {
				return "User Added.";
			} else {
				return "Error occured while adding to the database.";
			}
		} else {
			return "User Already exists";
		}
	}
}

// Returns boolean if the user exists , in the users table.
// We pass it the normally written password
function validDateAdmin($username, $password)
{
	global $connection;
	$error = mysqli_connect_error();

	if ($error != null) {
		echo ("Unable to connect to database");
	} else {
		//good connection, so do you thing
		// check if user exists 
		$query = "SELECT * FROM admins WHERE username = '$username'";
		$result = mysqli_query($connection, $query);

		$row = mysqli_fetch_assoc($result);

		if ($row == null) {
			return false;
		}

		echo $row;
		if ($row['password'] == md5($password)) {
			return true;
		} else {
			return false;
		}
	}
}
