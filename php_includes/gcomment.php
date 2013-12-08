<?php
  session_start();
  include("connection.php");


  if(isset($_POST['commentsubmit'])) {
    $c2 = mysqli_connect($host, $user, $pw, $db)or die("Cannot connect");
    $c6 = mysqli_connect($host, $user, $pw, $db)or die("Cannot connect");


    $self = $_SESSION['username'];
    $picid = $_POST['picid'];
    $usern = $_POST['usern'];
    $comment = $_POST['comment'];

    if(empty($comment)) {
      $Error = "Please enter a comment";
    }
    else {
      $sql2 = "INSERT INTO galleryComments (imgid,
	  				    commenter,
					    user,
					    comment)
				    VALUES ('$picid',
				            '$self',
					    '$usern',
					    '$comment')";

      $result2 = mysqli_query($c2, $sql2);
      $sql6 = "INSERT INTO Notification (fromUser,
					 toUser,
					 type,
					 text)
				VALUES ('$self',
				        '$usern',
					'photocomment',
					'$comment')";
      $result6 = mysqli_query($c6, $sql6);
    }
  }
  mysqli_close($c2);
  mysqli_close($c6);
?>