<?php
require_once('./sql/login_functions.php');
echo "Start";
$sql = "select * from users";
$response = validDateUser("test5", "test5");
//        foreach ($response as $record){
//            echo ($record['username']) . "<br>";
//        }

echo $response;
echo "<br>Done";
