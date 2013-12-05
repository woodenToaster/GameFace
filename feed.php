<?php
	require_once('php_includes/dbAccess.php');
	//This needs to be called immediately when the user
	//first logs in, and periodically throughout the session.
	function getNotifications($uname) {
		$c = dbConnnect();
		$x = "SELECT * FROM Notifications WHERE toUser='$uname'";
		$result = mysqli_query($c,$x);
		while($row = mysqli_fetch_array($result) {
		
			echo "From: " . $row['fromUser'] . "<br>";
			echo "Type: " . $row['type'] . "<br>";
			echo "Text: " . $row['text'] . "<br>";
		}
		mysqli_close($c);
	}
?>