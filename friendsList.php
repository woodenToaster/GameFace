<html>
<head>
  <link href="css/main.css" rel="stylesheet" type="text/css">
  <title>Friends</title>
  <?php
    include_once("php_includes/nav.php");
    include_once("php_includes/header.php");
    include("php_includes/sessions.php");
    include("php_includes/connection.php");
    include("php_includes/friends.php");
  ?>
</head>
<body>
  <div id="friendsList">
    <?php
       if($usern == $self) {
         echo '<h2>Your Friends</h2><br>';
       }
       else {
         echo "<h2>" . $usern . "'s Friends</h2><br>";
       }
    ?>
    <table width="100%">
      <?php
	 $i = 1;
	 $c1 = mysqli_connect($host, $user, $pw, $db)or die("Cannot connect");
 	 $c2 = mysqli_connect($host, $user, $pw, $db)or die("Cannot connect");
	 $sql1 = "SELECT * FROM friendsList WHERE friend1='".$usern."'";
	 $result1 = mysqli_query($c1, $sql1);
	 
	 while($friendlist = mysqli_fetch_array($result1)) {
	   if($i%4 == 1) {
	     echo '<tr style="height: 13em;">';
	   }
	   $frienden = $friendlist['friend2'];
	   $sql2 = "SELECT * FROM Accounts
		    WHERE username='".$frienden."'";
	   $result2 = mysqli_query($c2, $sql2);
	   while($friend = mysqli_fetch_array($result2)) {
	     if($friend['pic'] == 'default') {
	       $target = "img/default.png";
	     }
	     else {
	       $target = "profilepics/".$friend['username']."/".$friend['pic'];
	     }
	     echo '<td style="width:8.75em;"><a href="profile.php?user=' .$friend['username']. '"><img src="'.$target.'" style="width:8.73em"></td>';
	     echo '<td style="width:15em;"><a href="profile.php?user='.$friend['username'].
				'">'.$friend['username'].'</a><br>';
	     echo $friend['firstName'] . ' ' . $friend['lastName'] . '</td>';
	   }
	   mysqli_free_result($result2);
	   mysqli_close();
	   if($i%4 == 0) {
	     echo '</tr>';
	   }
	   $i++;
	 }
	 mysqli_close($c1);
      ?>
    </table>
  </div>
   <?php include_once('php_includes/footer.php'); ?>
</body>
</html>
