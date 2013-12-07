<?php
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
	mysqli_close($c);
?>