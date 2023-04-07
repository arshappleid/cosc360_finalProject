<?php 
require_once("./../sql/login_functions.php");
$username = $_GET['username'];
echo(deleteUser($username));
echo "User Deleted";
header("Location: ../views/pages/adminDeleteUser.php");
?>