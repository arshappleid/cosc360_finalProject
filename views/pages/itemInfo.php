<?php session_start();
require_once('./../../sql/store.php');

if (isset($_POST['comment']) && isset($_GET['itemid'])) {
	addCommment($_GET['itemid'], $_SESSION['username_logged_in'], $_POST['comment']);
}

if (isset($_GET['delete']) && isset($_GET['commentId'])) {
	echo "trying...<br>";
	echo $_GET['commentId'];
	deleteCommment($_GET['commentId']);
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Two Pane Layout with Links to PHP Pages</title>
	<style>

	</style>
</head>

<body>
	<div>
		<?php

		$item_id = $_GET['itemid'];
		$item = getProductInfousingId($item_id);

		echo "<h2>" . $item['item_name'] . "</h2>";
		echo "<img style = 'width:20rem;height:20rem' src=" . $item['img_url'] . " alt=" . $store_info['item_name'] . ">";

		$comments = getItemComments($item_id);
		if ($comments != null) {
			echo "<h4>Comments : </h4>";

			foreach ($comments as $comment) {
				$commentid = $comment['id'];
				echo "<form action='itemInfo.php?itemid=$item_id&delete=yes&commentId=$commentid' method='post'>";
				echo "<br>" . $comment['user_name'] . " : " . $comment['comment_str'] . "  ";
				echo "<button type='submit'>Delete</button>";
				echo "</form>";
			}
		}

		echo "<br>";

		echo "<form action='itemInfo.php?itemid=$item_id' method='post'>";
		echo "	<label for='comment'>Add Comment:</label>";
		echo "	<input type='text' id='comment' name='comment'>";
		echo "</form>";

		?>

	</div>


</body>

</html>