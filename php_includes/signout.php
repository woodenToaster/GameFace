<?php
//written by: Katherine
//tested by: Katherine

  session_start();
 
  if(isset($_SESSION['username'])){
	unset($_SESSION['username']);
  	session_destroy();
	header("location: ../signup.php");	
  }
?>
