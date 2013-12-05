<?php
	require_once('php_includes/dbAccess.php');
	//This needs to be called immediately when the user
	//first logs in, and periodically throughout the session.
	function getNotifications() {
		$c = dbConnnect();
		$uname = $_SESSION['username'];
		$x = "SELECT * FROM Notifications WHERE toUser='$uname'";
		$result = mysqli_query($c,$x);
		$results = Array();
		$i = 0;
		while($row = mysqli_fetch_array($result) {
		
			$results[$i] = $row;
			$i++;
		}
		
		echo json_encode($results);
		mysqli_close($c);
	}
?>