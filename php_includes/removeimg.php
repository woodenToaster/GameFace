<?php
//written by: Katherine
//tested by: Katherine

  include("connection.php");
 
  $c1 = mysqli_connect($host, $user, $pw, $db)or die("Cannot connect");

  $file = $_POST['pfile'];
  $filename = "./user_screenshots/" . $self . "/" . $file;  
  
  if(isset($_POST['removeimg'])) {
    unlink($filename);
  
    $sql1 = "DELETE FROM screenshots WHERE username='".$self."' and data='".$file."'";

    $result1 = mysqli_query($c1, $sql1);
    mysqli_close($c1);  
  }
?>
