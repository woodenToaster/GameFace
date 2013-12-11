<?php
//written by: Katherine
//tested by: Katherine

  session_start();
  include("connection.php");  
  $self = $_SESSION['username'];
  $Error = $description = $gamename = "";
  $target = "./user_screenshots/";
  $target = $target . $self . "/";
  if(!file_exists($target)) {
    mkdir($target);
    chmod($target, 0777);
  }
  $target = $target . basename($_FILES['uploaded_file']['name']);
  

  if(isset($_POST['UPsubmit'])){
    if($_FILES['uploaded_file']) {
      if($_FILES['uploaded_file']['error'] == 0) {
        if(!preg_match('/^image\/(pjpeg|gif|png|x-png|jpeg|jpg)/', $_FILES['uploaded_file']['type'])) {
	  $Error = "Images only";
	}
	else {
          $valid = true;

	  if(file_exists($target)){
	    $Error = "A picture with the same name already exists";
	    $valid = false;
	  }
	
	  $gamename = $_POST['gamename'];
	  $description = $_POST['description'];
	  if(!empty($_POST['name'])) {
	    $filename = $_POST['name'];
	  }
	  else {
	    $filename = $_FILES['uploaded_file']['name'];
	  }
	  $data = $_FILES['uploaded_file']['name'];
	  $size = intval($_FILES['uploaded_file']['size']);
	  $filetype = $_FILES['uploaded_file']['type'];

          if(empty($gamename)) {
	    $Error = "Please enter the game name";
	    $valid = false;
	  }
	  
	  if($valid) {
	    $sql = "INSERT INTO screenshots (date,
	    	   	   		     username,
					     gamename,
					     description,
					     data,
					     filename,
					     filesize,
					     filetype)
			   VALUES (NOW(),
			   	   '$self',
				   '$gamename',
				   '$description',
				   '$data',
				   '$filename',
				   '$size',
				   '$filetype')";
	    $result = mysqli_query($c, $sql);

	    move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target);
	    chmod($target, 0777);
	    if($result) {
	      header("location: ./uploadpic.php");
	    }
	    else {
	      $Error = "Error in uploading";
	    }
	  }
	}
      }
      else {
        $Error = "No file present";
	$valid = false;
      }
    }
  }
  mysqli_close($c);
?>
