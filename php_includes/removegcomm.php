<?php
  include('connection.php');

  $commid = $_POST['commid'];
  
  if(isset($_POST['removepost'])) {
        $c4 = mysqli_connect($host, $user, $pw, $db)or die("Cannot connect");
	
	$sql4 = "DELETE FROM galleryComments
	      		WHERE id='".$commid."'";

	$result4 = mysqli_query($c4, $sql4);
  }
  mysqli_close($c4);
?>