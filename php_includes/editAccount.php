<?php

//written by: Katherine

  include('connection.php');

  $username = $_SESSION['username'];
  $sql = $c->query("SELECT * FROM $table 
		       		WHERE username='$username'");
  $result = $sql->fetch_object();
  $email = $result->email;
  $game1 = $result->game1;
  $game2 = $result->game2;
  $game3 = $result->game3;
  $game4 = $result->game4;
  $game5 = $result->game5;
  $firstname = $result->firstName;
  $lastname = $result->lastName;
  $schoolyear = $result->year;
  $major = $result->major;
  if($result->pic == 'default') {
    $path = "./img/default.png";
  }
  else {
    $path = "./profilepics/" . $username . "/" . $result->pic;
  }

  mysqli_close($c);
?>
