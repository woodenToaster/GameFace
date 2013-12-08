<?php 
	
	$con = mysqli_connect("mysql.eecs.ku.edu", "chogan", "GameFace", "chogan");
	if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySQL:". mysqli_connect_error();
		}

	$toUser = $_POST['toUser'];
	$fromUser = $_POST['fromUser'];
	$text = $_POST['text'];
	$type = "Invite";

	$x = mysqli_query($con, "INSERT INTO Notifications (fromUser, toUser, type, text) VALUES ('$fromUser','$toUser', '$type','$text');");

	mysqli_close($con);
	
?>
