<?php 

require_once('./../sql/store.php');
if (isset($_POST['comment']) && isset($_GET['item_id'])) {
	addCommment($_GET['item_id'], $_SESSION['username_logged_in'], $_POST['comment']);
}
