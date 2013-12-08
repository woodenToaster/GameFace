<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors','1');
	require_once('php_includes/dbAccess.php');
	$c = dbConnect();
	$uname = $_SESSION['username'];
	//get user's top 5
	$x = "SELECT game1, game2, game3, game4, game5 FROM Accounts WHERE username='$uname'";
	$result = mysqli_query($c,$x);
	$results = Array();
	$results = $result;
	for($i = 0; $i < $results.length; $i++) {
		echo "<div class='notification'>".$results[$i]."</div>"; 
	}
	
	
	mysqli_close($c);
	
?>