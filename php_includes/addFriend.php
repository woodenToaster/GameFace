//written by: Katherine
//tested by: Katherine

<?php
  include('connection.php');
 
if(isset($_POST['addButton'])) {
  if(!empty($_POST)) {			 
    $self = $_SESSION['username'];
    $usern = $_GET['user'];

    $x = "INSERT INTO friendsList (friend1, friend2)
                 VALUE ('$self', '$usern')";

    $addresult = mysqli_query($c, $x);

    $y = "INSERT INTO friendsList (friend1, friend2)
       	         VALUE ('$usern', '$self')";
  
    $addresultn = mysqli_query($c, $y);
   
    mysqli_close($c);
  }
}
?>
