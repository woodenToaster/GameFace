<?php
//Created by Chris Hogan
//This file sets all notifications 'displayed' value to false so they will display once on login.
	session_start();
	require_once('php_includes/dbAccess.php');
	$c = dbConnect();
	$user = $_SESSION['username'];
	$q = "UPDATE Notifications SET displayed='false' WHERE toUser='$user'";
	$result = mysqli_query($c, $q);
?>
