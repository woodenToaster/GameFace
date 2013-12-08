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
	//find users to suggest as friends based on top 5
	for($i = 0; $i < $length; $i++) {
		$x2 = "SELECT * FROM Accounts WHERE 
				(game1='$row[$i]'
				OR game2='$row[$i]'
				OR game3='$row[$i]'
				OR game4='$row[$i]'
				OR game5='$row[$i]')
				AND (username<>'$uname')";
				
		$result2 = mysqli_query($c, $x2);
		
		while($row2 = mysqli_fetch_assoc($result2)) {
			echo "<div class='suggestion'><a href='profile.php?user="
					. $row2['username']. "'>".$row2['username']."</a> also likes " . $row[$i] . "</div>"; 
		}
	}
	
	mysqli_close($c);
	
?>