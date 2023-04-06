<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
	<style>
		body {
			display: flex;
			align-items: center;
			justify-content: center;
			height: 100vh;
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}

		form {
			background-color: #f1f1f1;
			border: 1px solid #ccc;
			padding: 20px;
			width: 300px;
		}

		input[type=text],
		input[type=password] {
			padding: 10px;
			margin: 5px 0;
			border: 1px solid #ccc;
			width: 100%;
		}

		button {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			cursor: pointer;
			width: 100%;
		}

		button:hover {
			opacity: 0.8;
		}

		.cancelbtn {
			background-color: #f44336;
		}

		.container {
			padding: 16px;
		}

		span.psw {
			float: right;
			padding-top: 16px;
		}
	</style>
</head>

<body>
	<?php
	$username = $password = "";
	$usernameErr = $passwordErr = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["username"])) {
			$usernameErr = "Username is required";
		} else {
			$username = $_POST["username"];
		}

		if (empty($_POST["password"])) {
			$passwordErr = "Password is required";
		} else {
			$password = $_POST["password"];
		}
	}


	?>
	<div class="container">
		<h2>Login:</h2>

		<form method="post" action="index.php">
			<div>
				<label for="username"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<span class="error"><?php echo $usernameErr; ?></span>

				<label for="password"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<span class="error"><?php echo $passwordErr; ?></span>

				<button type="submit" style="margin:5 rem 4rem ;">Login</button><br>
				<button type="button" onclick="location.href='guest.php'">Continue as Guest</button><br>
				<button type="reset" class="cancelbtn">Reset</button><br>
			</div>
		</form>
	</div>

</body>

</html>