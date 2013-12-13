<?php
//written by: Katherine

  session_start();
  include('connection.php');

  $self = $_SESSION['username'];
  $usern = $_GET['user'];

  $sql = "SELECT username FROM $table WHERE username='".$usern."'";
  $result = mysqli_query($c, $sql);
  $count = mysqli_num_rows($result);
  
  if($count != 1) {
    header('location: friendsList.php?user=' . $self);
    mysqli_close($c);
  }

?>
