<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title>Two Pane Layout with Links to PHP Pages</title>
	<style>
	#left-pane {
		float: left;
		display: inline;
		width: 10%;
		height: 600px;
		background-color: #f1f1f1;
		padding: 20px;
	}

	#top-pane {
		background-color: #f1f1f1;
		margin-left: 20%;
		margin-bottom: 5%;
		padding: 20px;
		margin-right: 5%;
	}

	#main-pane {
		background-color: #f1f1f1;
		margin-left: 20%;
		padding: 20px;
		margin-right: 5%;

	}

	footer {
		margin-top: 5%;
		margin-right: 5%;
		background-color: #f1f1f1;
		position: sticky;
		padding: 20px 0;
		position: static;
		margin-left: 20%;
		bottom: 0;
	}
	</style>
</head>

<body>
	<div id="left-pane">
		<?php
        require_once('./../../sql/store.php');
        $selected_store_id = "1";
        ?>
		<h2>Select Stores:</h2>
		<ul>
			<?php
            $stores = getStores();
            foreach ($stores as $store) {
                $user = $_GET['user'];
                echo "<button onclick=\"location.href='?user=$user&store_id=" . $store['id'] . "'\">" . $store['name'] . "</button>";
            }
            ?>

		</ul>
	</div>
	<div id="top-pane">
		<h1 style="margin-left: auto">Welcome to the Grocery Price Tracker </h1>
		<h3> Logged in as : <?php echo $_GET['user'] ?><h3>
	</div>
	<div id="main-pane">
		<?php
        if (isset($_GET['store_id'])) {
            $store_id = $_GET['store_id'];
            $store_info = getStoreInfo($store_id);
            echo "<span>";
            echo "<div>";
            echo "<h3>" . $store_info['name'] . "</h3><br>";
            echo "<img style = 'width:20rem;height:20rem' src=" . $store_info['img_url'] . " alt=" . $store_info['name'] . ">";
            echo "</div>";
            echo "<div>";
            echo "<h4>Available items:</h4>";
            foreach (getItems($store_id) as $item) {
                $itemid = $item['id'];

                echo "<p>" . $item['item_name'] . " : " . $item['default_price'] . "$" . "</p>";


                echo "Price History : ";

                $prices = getPriceChanges($item['id']);

                for ($i = 0; $i < count($prices); $i++) {
                    echo "<span>";
                    if (intval($prices[$i]) > intval($item['default_price'])) {
                        echo "<b style='color:red;'>" . $prices[$i] . " $, </b>";
                    } else {
                        echo "<b style='color:green;'>" . $prices[$i] . " $, </b>";
                    }
                    echo "</span>";
                }

                echo "<br>";
                echo "<a href = './itemInfo.php?itemid=$itemid'>";
                echo "<img style='width:10rem;height:10rem' src=" . $item['img_url'] . " alt=" . $item['item_name'] . ">";
                echo "</a>";
                echo "<br>";
                try {
                    $comments = getItemComments($itemid);
                    if ($comments != null) {
                        echo "<b>Comments : </b><br>";
                        foreach (getItemComments($item['id']) as $comment) {
                            echo $comment['user_name'] . " : ";
                            echo $comment['comment_str'] . "<br>";
                            echo "<br>";
                        }
                    }
                } catch (Exception $e) {
                    echo "<br>";
                }
                echo "<br>";
            }
            echo "</div>";
            echo "</span>";
        } else {
            echo "<h3>Please select a store</h3>";
        }
        ?>



	</div>
	<!--This is the footer-->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h4>About</h4>
					<p>This grocery tracker app helps you keep track of your grocery list and expenses, making it
						easy
						to plan and stay on budget.</p>
				</div>
				<div class="col-md-4">
					<h4>Contact</h4>
					<ul>
						<li>Email: grocerytracker@app.com</li>
						<li>Phone: 123-456-7890</li>
						<li>Address: Ubco Kelowna</li>
					</ul>
				</div>

			</div>
		</div>
	</footer>


</body>

</html>