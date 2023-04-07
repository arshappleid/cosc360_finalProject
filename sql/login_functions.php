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

function addData($sql_query)
{
	global $connection;
	$error = mysqli_connect_error();
	if ($error != null) {
		return ("Unable to connect to database");
	} else {
		//good connection, so do you thing
		// check if user exists 

		$result = mysqli_query($connection, $sql_query);
		if ($result >= 1 || $result == true) {
			return true;
		} else {
			return false;
		}
	}
	return false;
}

function deleteData($sql_query)
{
	global $connection;
	$error = mysqli_connect_error();
	if ($error != null) {
		return ("Unable to connect to database");
	} else {
		//good connection, so do you thing
		// check if user exists

		$result = mysqli_query($connection, $sql_query);
		if ($result >= 1 || $result == true) {
			return true;
		} else {
			return false;
		}
	}
	return false;
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

function getAllUsers()
{
	$resp = getData("SELECT * FROM users;");
	return $resp;
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

function deleteUser($username)
{
    deleteData("DELETE FROM comments where user_name ='$username'");
	deleteData("DELETE FROM users where username ='$username'");
    echo "done";
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
