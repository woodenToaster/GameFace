<?php 
  include('sessions.php');
  include('connections.php');

  $username = $_SESSION['username'];

  $verify = verifyUser($_GET['user']);

  if(!verify) {
    die('This profile does not exist');
  }
?>
