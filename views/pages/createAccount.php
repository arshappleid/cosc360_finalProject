<!DOCTYPE html>
<html>

<head>
	<title>User Registration</title>
	<style>
		label {
			display: inline-block;
			width: 120px;
			text-align: right;
			margin-right: 10px;
		}

		input[type=text],
		input[type=email],
		input[type=password] {
			width: 300px;
			padding: 5px;
			margin-bottom: 10px;
		}

		input[type=submit],
		input[type=reset] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 15px;
			margin-top: 10px;
			border: none;
			cursor: pointer;
			border-radius: 5px;
		}

		input[type=submit]:hover,
		input[type=reset]:hover {
			background-color: #3e8e41;
		}

		.error {
			color: red;
			margin-bottom: 10px;
		}
	</style>
	<script>
		function validateForm() {
			var password = document.forms["registration"]["password"].value;
			var retype_password = document.forms["registration"]["retype_password"].value;

			if (password !== retype_password) {
				document.getElementById("error_msg").innerHTML = "Passwords do not match";
				return false;
			}
		}
	</script>
</head>

<body>
	<h2>User Registration</h2>
	<form name="registration" method="post" action="">
		<label for="username">Username:</label>
		<input type="text" id="username" name="username" required><br>

		<label for="first_name">First Name:</label>
		<input type="text" id="first_name" name="first_name" required><br>

		<label for="last_name">Last Name:</label>
		<input type="text" id="last_name" name="last_name" required><br>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br>

		<label for="retype_password">Retype Password:</label>
		<input type="password" id="retype_password" name="retype_password" required><br>
		<div id="error_msg" class="error"></div>

		<input type="submit" value="Submit" onclick="return validateForm();">
		<input type="reset" value="Reset">
		<a href="./../../index.php">Login</a>
	</form>



	<?php
	require_once("./../../sql/login_functions.php");

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Get form data
		$username = $_POST["username"];
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$email = $_POST["email"];
		$password = $_POST["password"];

		// Store data in database or do other processing
		$message = addUser($first_name, $last_name, $email, $username, $password);
		echo "<b>" . $message . "</b>";
		// Redirect to success page
		header("Location: ./../../index.php?message=User Added");
		exit();
	}


	?>


</body>

</html>