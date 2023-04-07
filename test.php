<?php

require_once('./sql/store.php');
$prices = getPriceChanges("10");
echo $prices[0]."<br>";
echo "Boolean value : ".var_dump(($prices[0] > intval("4")));
if(($prices[0] > intval("4"))==1){
    echo "<p style ='color:red;'".prices[i]." $, </p>";
}else{
    // lower or equal show as green
    echo "<p style ='color:green;'".prices[i]."$, </p>";
}
?>