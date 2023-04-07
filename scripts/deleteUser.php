<?php 
require_once("./../sql/login_functions.php");
$username = $_GET['username'];
deleteUser($username);
header("Location: ../views/pages/adminDeleteUser.php");
