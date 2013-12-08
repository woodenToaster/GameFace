<?php
  include('connection.php');
  
  $username = $_SESSION['username'];

  $emailErr = $pwErr = "";

  $emailval = '/^[A-Za-z0-9._%-]+@ku\.edu/';

  if(isset($_POST['editaccsubmit'])) {
    if(!empty($_POST)){
	$err = false;

	if($_POST['pw'] != $_POST['pw2']) {
	  $pwErr = "*passwords need to match";
	  $err = true;
	}

	if(!empty($_POST['email'])) {
	  if(!preg_match($emailval, $_POST['email'])){
	    $emailErr = "*Please enter a valid KU email";
	    $err = true;
	  }
	  else if($_POST['email'] != $_POST['email2']) {
	    $emailErr = "*emails need to match";
	    $err = true;
	  }
	}
    }
  }

  if ($err == false) {
    if(!empty($_POST['email'])){
      $x = $c->query("UPDATE $table 
      	    SET email='".$_POST['email']."'
	    WHERE username='$username'");
    }

    if(!empty($_POST['pw'])){
      $x = $c->query("UPDATE $table 
      	    SET password='".$_POST['pw']."'
	    WHERE username='$username'");
    }

    if(!empty($_POST['game1'])){
      $x = $c->query("UPDATE $table 
      	    SET game1='".$_POST['game1']."'
	    WHERE username='$username'");
    }

    if(!empty($_POST['game2'])){
      $x = $c->query("UPDATE $table 
      	    SET game2='".$_POST['game2']."'
	    WHERE username='$username'");
    }

    if(!empty($_POST['game3'])){
      $x = $c->query("UPDATE $table 
      	    SET game3='".$_POST['game3']."'
	    WHERE username='$username'");
    }

    if(!empty($_POST['game4'])){
      $x = $c->query("UPDATE $table 
      	    SET game4='".$_POST['game4']."'
	    WHERE username='$username'");
    }

    if(!empty($_POST['game5'])){
      $x = $c->query("UPDATE $table 
      	    SET game5='".$_POST['game5']."'
	    WHERE username='$username'");
    }

    if(!empty($_POST['fname'])){
      $x = $c->query("UPDATE $table 
      	    SET firstName='".$_POST['fname']."'
	    WHERE username='$username'");
    }

    if(!empty($_POST['lname'])){
      $x = $c->query("UPDATE $table 
      	    SET lastName='".$_POST['lname']."'
	    WHERE username='$username'");
    }

    if(!empty($_POST['year'])){
      $x = $c->query("UPDATE $table 
      	    SET year='".$_POST['year']."'
	    WHERE username='$username'");
    }

    if(!empty($_POST['major'])){
      $x = $c->query("UPDATE $table 
      	    SET major='".$_POST['major']."'
	    WHERE username='$username'");
    }
    mysqli_close($c);
  }

  $c2 = mysqli_connect($host, $user, $pw, $db)or die("Cannot connect");

  $Error = "";

  $target = "./profilepics/" . $username . "/";
  if(!file_exists($target)) {
    mkdir($target);
    chmod($target, 0777);
  }
  $target = $target . basename($_FILES['profilepic']['name']);

  if(isset($_POST['picsubmit'])) {
    if($_FILES['profilepic']) {
      if($_FILES['profilepic']['error'] == 0) {
        if(!preg_match('/^image\/(pjpeg|gif|png|x-png|jpeg|jpg)/', $_FILES['profilepic']['type'])) {
	  $Error = "Images only";
	}
	else {
	  if(file_exists($target)) {
	    $Error = "Please rename file or pick another file";
	  }
	  else {
	    $data = $_FILES['profilepic']['name'];
	    $sql2 = "UPDATE Accounts SET pic='".$data."' 
	    	    	    WHERE username='$username'";

	    $result2 = mysqli_query($c2, $sql2);

	    move_uploaded_file($_FILES['profilepic']['tmp_name'], $target);

	    chmod($target, 0777);
	    if($result2) {
	      header("location: ./editprofile.php");
	    }
	    else {
	      $Error = "Error in uploading";
	    }
	  }
	}
      }
      else {
        $Error = "No file present";
      }
    }
  }
  mysqli_close($c2);

  $c3 = mysqli_connect($host, $user, $pw, $db)or die("Cannot connect");  
  $c4 = mysqli_connect($host, $user, $pw, $db)or die("Cannot connect");


  if(isset($_POST['removepic'])) {
    if(!empty($_POST)) {
      $target = "./profilepics/" . $username . "/";
      $sql4 = "SELECT pic FROM Accounts WHERE username='".$username."'";
      $result4 = mysqli_query($c4, $sql4);
      $r4 = $result4->fetch_object();
      $target = $target . $r4->pic;
      unlink($target);
      
      $sql3 = "UPDATE Accounts SET pic='default' 
	    	    	    WHERE username='".$username."'";

      $result3 = mysqli_query($c3, $sql3);
    }
  }
  mysqli_close($c3);
  mysqli_close($c4);
?>