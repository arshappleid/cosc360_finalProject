<?php
require_once("login_functions.php");
$host = "localhost";
$database = "lab_9";
$user = "test";   // i created a new user using this login for the db
$password = "password";

$connection = mysqli_connect($host, $user, $password, $database);

// Returns all the items in a store, give then the store ID .
function getItems($store_id)
{
    $resp = getData("SELECT * from item WHERE store_id = '$store_id';");
    return $resp;
}

function getItemComments($product_id)
{
    $response = getData("SELECT * FROM comments where item_id = '$product_id'");
    if ($response == "No data returned.")
        return null;
    else
        return $response;
}

function addCommment($item_Id, $username, $comment)
{
    // Adds a comment into the database , provided the above parameters.
    $response = getData("INSERT INTO comments (item_id, user_name,comment_str) values
    ('$item_Id','$username','$comment');");
    return $response;
}

function deleteCommment($commentid)
{
    // Adds a comment into the database , provided the above parameters.
    $response = getData("DELETE FROM comments WHERE id = '$commentid';");
    echo $response;
    return $response;
}

function getPriceChanges($item_id)
{
    // returns an array of prices over time, given the item_id
    $default_price = getData("SELECT default_price from item where id = '$item_id';")[0]['default_price'];
    $resp = getData("SELECT change_in_price from price_change where item_id = '$item_id';");
    $change_in_prices = array();
    foreach ($resp as $record) {
        $update_price = $record['change_in_price'] + $default_price;
        array_push($change_in_prices, $update_price);
    }

    return $change_in_prices;
}


function getProductInfo($item_name, $store_id)
{
    // Should return an array of all the info in the item table.
    $result = array();
    foreach ($result as $record) {
        array_push($result, $record);
    }
    return $result[0];
}

function getProductInfousingId($item_id)
{
    // Should return an array of all the info in the item table.
    $resp = getData("SELECT * FROM item where id = '$item_id';");
    return $resp[0];
}

function getStores()
{
    $resp = getData("SELECT * FROM store;");
    $result = array();
    foreach ($resp as $record) {
        array_push($result, $record);
    }
    return $result;
}

function getStoreInfo($store_id)
{
    $resp = getData("SELECT * FROM store where id = '$store_id';");
    return $resp[0];
}
