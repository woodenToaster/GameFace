<?php
  session_start();
  $loginErr = "";

  if(isset($_POST['loginsubmit'])){
    if(!empty($_POST)){
    
      $luname = mysqli_real_escape_string($c, $_POST['luname']);
      $lpw = mysqli_real_escape_string($c, $_POST['lpw']);  

      $sql = "SELECT * FROM $table WHERE username='".$luname."' 
      	     	       	    	   	 and password='".$lpw."'";
      $result = mysqli_query($c, $sql); 
  
      $count = mysqli_num_rows($result);


      if($count == 1){  
        $_SESSION['username'] = $luname;
	header("location: ./index.php");
	mysqli_close($c);
      }
      else{
	$loginErr = "Wrong Username or Password";
      }
    }
  }

?>