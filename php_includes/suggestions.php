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
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$length = count($row);
	for($i = 0; $i < $length; $i++) {
		echo "<div class='notification'>" . $row[$i] . "</div>"; 
	}
	
	mysqli_close($c);
	
?>