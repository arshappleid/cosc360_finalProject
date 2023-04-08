<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Hello, world!</title>
</head>

<body>
	<?php
	require_once("./../../sql/login_functions.php");
	// Define the function to be called when the button is clicked


	echo "<h3> Admin Manage Users</h3>";
	$users = getAllUsers();
	foreach ($users as $user) {
		$username = $user['username'];
		echo $user['username'];
		echo " <a href = './../../scripts/deleteUser.php?username=$username'>Delete</a><br>";
	}

	echo "<br><a href = './../../index.php'>HOME</a>"
	?>
</body>

</html>