<?php 
<<<<<<< HEAD
  session_start();
  include('connection.php');


  $self = $_SESSION['username'];
  $user = $_GET['user'];

  $sql1 = "SELECT * FROM $table WHERE username='".$user."'";
  $result1 = mysqli_query($c, $sql1);
  $count1 = mysqli_num_rows($result1);
  $r1 = $result1->fetch_object();   

  if($count1 != 1) {
=======
  include('connection.php');

  session_start();
  $self = $_SESSION['username'];
  $user = $_GET['user'];

  $sql = "SELECT * FROM $table WHERE username='".$user."'";
  $result = mysqli_query($c, $sql);
  $count = mysqli_num_rows($result);
  $r = $result->fetch_object();   

  if($count != 1) {
>>>>>>> bb8a6eff0131ff270a659ed9343b66bf776ddf71
    header('location: profile.php?user=' .$self);
    mysqli_close($c);
  }
  else {
<<<<<<< HEAD
    $firstname = $r1->firstName;
    $lastname = $r1->lastName;
    $username = $r1->username;
    $major = $r1->major;
    $year = $r1->year;
    $email = $r1->email;
    $game1 = $r1->game1;
    $game2 = $r1->game2;
    $game3 = $r1->game3;
    $game4 = $r1->game4;
    $game5 = $r1->game5;
=======
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
>>>>>>> bb8a6eff0131ff270a659ed9343b66bf776ddf71
  }
?>