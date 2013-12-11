<?php 
//written by: Katherine 
//tested by: Katherine

  session_start();
  include('connection.php');


  $self = $_SESSION['username'];
  $user = $_GET['user'];

  $sql1 = "SELECT * FROM $table WHERE username='".$user."'";
  $result1 = mysqli_query($c, $sql1);
  $count1 = mysqli_num_rows($result1);
  $r1 = $result1->fetch_object();   

  if($count1 != 1) {
    header('location: profile.php?user=' .$self);
    mysqli_close($c);
  }
  else {
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
    if($r1->pic == 'default') {
      $path = "./img/default.png";
    }
    else {
      $path = "./profilepics/" . $user . "/" . $r1->pic;
    }
  }
?>
