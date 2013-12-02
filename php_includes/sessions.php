<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("location: http://people.eecs.ku.edu/~kwu96/Test/signup.php");
  }
?>