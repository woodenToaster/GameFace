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
?>