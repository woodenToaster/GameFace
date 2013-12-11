<?php
//written by: Katherine

  session_start();
  if(!isset($_SESSION['username'])){
    header("location: signup.php");
  }
?>
