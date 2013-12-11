<?php
//written by: Katherine
//tested by: Katherine

  session_start();
  if(!isset($_SESSION['username'])){
    header("location: signup.php");
  }
?>
