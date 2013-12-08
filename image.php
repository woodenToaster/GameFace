<html>
<head>
  <link href="css/main.css" rel="stylesheet" type="text/css">
  <title>Screenshots</title>
  <?php
    include_once("php_includes/nav.php");
    include_once("php_includes/header.php");
    include("php_includes/sessions.php");
    include("php_includes/connection.php");
    include("php_includes/gcomment.php");
    include("php_includes/removegcomm.php");
  ?>
</head>
<body>
  <div id="image">
    <?php
      $picid = $_GET['id'];
      $self = $_SESSION['username'];
      $sql = "SELECT * FROM screenshots WHERE id='".$picid."'";
      $result = mysqli_query($c, $sql);
      $count = mysqli_num_rows($result);
      $r = $result->fetch_object();

      $pathToPic = "user_screenshots/" . $r->username . "/" . $r->data;

      if($count != 1){
        echo "Image does not exist.  ";
	echo '<a href="javascript:history.back(1);">Go Back</a>';
      }
      else {
        echo '<img src="' . $pathToPic . '" style="width:70%; align:center;">';
	
        $c3 = mysqli_connect($host, $user, $pw, $db);
        $sql3 = "SELECT * FROM galleryComments WHERE imgid='".$picid."'";
        $result3 = mysqli_query($c3, $sql3);
        $count3 = mysqli_num_rows($result3);

        if($count3 == 0) {
          echo "<br><br>There are no comments for this screenshot<br><br>";
        }

        while($cmt = mysqli_fetch_array($result3)) {
          echo '<br><br><div style="margin: 0em auto 0em auto; width: 25em; background-color: #000000;"><br>';
          echo '<p>' . $cmt['comment'] . '</p>';
          echo 'Commented by: ';
          echo '<a href="./profile.php?user=' . $cmt['commenter'] . '">'
				. $cmt['commenter'] . '</a><br><br>';
          if($self == $cmt['user']){
            echo '<form method="post" action="image.php?id=';
	    echo $picid . '"><input type="submit" name="removepost" ';
	    echo 'value="Remove">';
            echo '<input type="hidden" value="' . $cmt['id'] . '" 
			 name="commid"></form>';
          }
          echo '</div>';
        }
          echo '<form method="post" action="image.php?id=' . $picid . '">';
          echo 'Comment: <br>';
          echo '<input type="hidden" value="'.$picid.'" name="picid">';
          echo '<input type="hidden" value="'.$r->username.'" name="usern">';
          echo '<textarea style="resize:none;" rows="10" cols="40" name="comment"></textarea><br>';
	  echo '<input type="submit" value="Add Comment" name="commentsubmit">';
          echo '</form>' . $Error;

      }
      mysqli_close($c);
    ?>
  </div>
</body>
</html>
