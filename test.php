<?php

require_once('./sql/store.php');
$resp= getProductInfo("eggs","2");
echo print_r($resp);


?>