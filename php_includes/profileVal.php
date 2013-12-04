<?php 
  include('connection.php');

  session_start();
  $self = $_SESSION['username'];
  $user = $_GET['user'];

  $sql = "SELECT * FROM $table WHERE username='".$user."'";
  $result = mysqli_query($c, $sql);
  $count = mysqli_num_rows($result);
  $r = $result->fetch_object();   

  if($count != 1) {
    header('location: profile.php?user=' .$self);
    mysqli_close($c);
  }
  else {
    $firstname = $r->firstName;
    $lastname = $r->lastName;
    $username = $r->username;
    $major = $r->major;
    $year = $r->year;
    $email = $r->email;
    $game1 = $r->game1;
    $game2 = $r->game2;
    $game3 = $r->game3;
    $game4 = $r->game4;
    $game5 = $r->game5;
  }
?>