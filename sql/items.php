<?php
$host = "localhost";
$database = "lab_9";
$user = "test";   // i created a new user using this login for the db
$password = "password";

$connection = mysqli_connect($host, $user, $password, $database);

// Returns all the items in a store, give then the store ID .
function getItems($store_id)
{
}

function getItemComments($product_id)
{
}

function addCommment($item_Id, $comment)
{
}
