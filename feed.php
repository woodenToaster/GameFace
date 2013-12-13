<?php
//Written by Chris Hogan
//This file checks the database for notifications and sends them
//to displayNotifications.js for rendering.
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors','1');
	require_once('php_includes/dbAccess.php');
	$c = dbConnect();
	$uname = $_SESSION['username'];
	$x = "SELECT * FROM Notifications WHERE toUser='$uname'";
	$result = mysqli_query($c,$x);
	$results = Array();
	$i = 0;
	while($row = mysqli_fetch_array($result)) {
	
		$results[$i] = $row;
		$i++;
	}
	echo json_encode($results);
	//Now we need to set the 'displayed' value of the displayed 
	//notifications to 'true' so they will only appear once.
	$q = "UPDATE Notifications SET displayed='true' WHERE toUser='$uname'";
	$sql = mysqli_query($c, $q);
	
	mysqli_close($c);
?>
