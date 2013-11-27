<?php
  session_start();
  $table = "Accounts";

  $host = "mysql.eecs.ku.edu";
  $user = "chogan";
  $pw = "GameFace";
  $db = "chogan";
  $table = "Accounts";

  $c = mysqli_connect($host, $user, $pw, $db)or die("Cannot connect");
?>