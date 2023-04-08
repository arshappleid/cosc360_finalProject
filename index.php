<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
	<!--Add bootstrap-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script type="text/javascript" src="./scripts/checkLoginForm.js"></script>
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


		input[type=text],
		input[type=password] {
			padding: 10px;
			margin: 5px 0;
			border: 1px solid #ccc;
		}

		button {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			cursor: pointer;
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
	$_SESSION['breadcrumb'] = array();
	array_push($_SESSION['breadcrumb'], 'home');
	?>
	<div class="container text-center">
		<h2>Login:</h2>

		<form class="" method="post" action="./scripts/validateLoginDb.php" id="mainForm">
			<div class="col-md text-center">
				<label for="username"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<span class="error"><?php echo $usernameErr; ?></span>
				<br>
				<label for="password"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<span class="error"><?php echo $passwordErr; ?></span>

				<br>
				<button type="submit" style="margin:5 rem 4rem ;" onclick="ifEmptyTurnRed()">Login</button><br>
				<button type="button" onclick="location.href='./views/pages/browse.php?user=guest'">Continue as Guest</button><br>
				<button type="button" onclick="location.href='./views/pages/createAccount.php'">Create new Account</button><br>
				<button type="button" onclick="location.href='./views/pages/adminLogin.php'">Admin</button><br>
				<br>
				<button type="reset" class="cancelbtn">Reset</button><br>
			</div>
		</form>
		<?php echo "<b style = 'color:red;'>" . $_GET['message'] . "</b>" ?>
	</div>

</body>

</html>