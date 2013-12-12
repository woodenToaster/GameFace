<?php
	session_start();
	error_reporting(E_ALL);
	ini_set('display_errors','1');
	require_once('../php_includes/dbAccess.php');
	$cx3 = dbConnect();
	$uname6 = $_SESSION['username'];
	
	$text = "Test";
	$query = "INSERT INTO Notifications (fromUser, toUser, type, text, displayed)
				     VALUES ('awerner', '$uname6', 'Invite', '$text', 'false');";
	
	$result = mysqli_query($cx3, $query);
	mysqli_close($cx3);
?>