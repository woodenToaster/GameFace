<?php
	function dbConnect() {
		$hostname = "mysql.eecs.ku.edu";
		$user = "chogan";
		$pw = "GameFace";
		$db = "chogan";
		
		$c = mysqli_connect($hostname, $user, $pw, $db);
		if (mysqli_connect_errno($c)) {
			
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			exit;
		}
		return $c;
	}
?>