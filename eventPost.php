<?php 
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	$con = mysqli_connect("mysql.eecs.ku.edu", "chogan", "GameFace", "chogan");
	if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySQL:". mysqli_connect_error();
		}

	$eventName = $_POST['eventName'];
	$eventDescription = $_POST['eventDescription'];
	$eventLocation = $_POST['eventLocation'];
	$eventDate = $_POST['eventDate'];
	$eventTime = $_POST['eventTime'];

	echo($eventName);
	echo($eventDescription);
	echo($eventLocation);
	echo($eventDate);
	echo($eventTime);
	

	$x = mysqli_query($con, "INSERT INTO Events (eventName, eventDescription, eventLocation, eventDate, eventTime) VALUES ('$eventName','$eventDescription', '$eventLocation','$eventDate','$eventTime');");

	mysqli_close($con);
	exit();

?>
