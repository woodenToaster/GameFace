<?php
//written by: Katherine

  include('connection.php');

if(isset($_POST['removeButton'])) {
  if(!empty($_POST)) {
    $self = $_SESSION['username'];  
    $usern = $_GET['user'];

    $x2 = "DELETE FROM friendsList
                 WHERE friend1='".$usern."' and friend2='".$self."'";
    $y2 = "DELETE FROM friendsList
       	         WHERE friend1='".$self."' and friend2='".$usern."'";

    $removeresult = mysqli_query($c, $x2);
    $removeresultn = mysqli_query($c, $y2);
    mysqli_close($c);
  }
}
?>
