<html>
  <head>
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <title>GameFace</title>
  </head>
  <body>
	<?php include_once('php_includes/header.php');
	      include_once('php_includes/nav.php');
	      include('php_includes/sessions.php'); 
	      include('php_includes/profileVal.php'); 
	      include('php_includes/addFriend.php');
	      include('php_includes/removeFriend.php');
	      include('php_includes/connection.php');
	?>

	<div id="wrapper3">
	  <div id="smallProfile">
	    <h3><?php echo "$firstname $lastname" ?></h3>
	    <br>
	    <?php echo $username ?><br>
	    <?php echo $major ?><br>
	    <?php echo $year ?><br>
	    <?php echo $email ?><br>
	    <?php
	       $usern = $_GET['user'];
 
	       $c2 = mysqli_connect($host, $user, $pw, $db); 

	       $sql2 = "SELECT * FROM friendsList WHERE
		       friend1='".$self."' and friend2='".$usern."'";
	       $result2 = mysqli_query($c2, $sql2);
	       $count2 = mysqli_num_rows($result2);


	       if(($self != $usern) && ($count2 == 0)) {
	        echo "<form method=\"post\" action=\"";
		echo "profile.php?user=$usern"; 
		echo "\"><input type=\"submit\" name=\"addButton\" value=\"Add Friend\"></form>";
	       }
	       else if($self != $usern) {
	        echo "<form method=\"post\" action=\"";
  		echo "profile.php?user=$usern"; 
		echo "\"><input type=\"submit\" name=\"removeButton\" value=\"Remove Friend\"></form>";
	       }

	       mysqli_free_result($result2);
	       mysqli_close($c2);   
	    ?>
	    <br>
	    <h3>Friends:</h3>
	    <?php  
	       $usern = $_GET['user'];
	       $c3 = mysqli_connect($host, $user, $pw, $db);

	       $sql3 = "SELECT * FROM friendsList WHERE 
		     friend1='".$usern."'";
 	   
	       $result3 = mysqli_query($c3, $sql3);

	       while($friends = mysqli_fetch_array($result3)){
	         $friend = $friends['friend2'];
	         echo "<a href=\"profile.php?user=";
		 echo $friend;
		 echo "\">$friend</a><br>";
	       }
			    
	       mysqli_free_result($result3);
	       mysqli_close($c3);  
	    ?>
	  </div>
	  <div id="bigProfile">
	    <table width="100%">
	      <tr>
	        <td style="width: 20%;">
		  <h2>1. <?php echo $game1 ?></h2>
		</td>
		<td style="width: 20%;">
		  <h2>2. <?php echo $game2 ?></h2>
		</td> 
		<td style="width: 20%;">
		  <h2>3. <?php echo $game3 ?></h2>
		</td>
		<td style="width: 20%;">
		  <h2>4. <?php echo $game4 ?></h2>
		</td>
		<td style="width: 20%;">
		  <h2>5. <?php echo $game5 ?></h2>
		</td>
	      </tr>
	    </table>
	    <table width="100%">
	      <tr>
	        <td style="width: 20%;">
		  
		</td>
		<td style="width: 20%;">
		 
		</td> 
		<td style="width: 20%;">
		 
		</td>
		<td style="width: 20%;">
	
		</td>
		<td style="width: 20%;">
	
		</td>
	      </tr>
	    </table>
	    <br><br>
	    <h3>Screenshots:</h3>
	    <table width="100%">
	    <tr>
	    <?php
	      $usern = $_GET['user'];
	      $c4 = mysqli_connect($host, $user, $pw, $db);

	      $sql4 = "SELECT * FROM screenshots WHERE username='".$usern."'";
	      $result4 = mysqli_query($c4, $sql4);
	       
	      $count4 = mysqli_num_rows($result4);

	      if($count4 == 0) {
	        echo $usern . " have not uploaded any screenshots.";
	      }
	       
	      $i = 0;

	      while(($pic = mysqli_fetch_array($result4)) && ($i < 5)) {
                echo "<td style=\"width:20%;\"><img src=\"user_screenshots/" . 
			$usern . "/" .
			$pic['data'] . "\" style=\"width:12em;\"><br>";
		echo "<small>" . $pic['gamename'] . "<br>";
		echo $pic['filename'] . "<br>";
		echo $pic['description'] . "</small><br></td>";
				
                $i ++;
	      }
	      echo "</tr></table>";
	      if($usern==$self){
	        echo "<a href=\"uploadpic.php\">Upload Screenshot</a>";
	      }
	      else {
		echo '<a href="gallery.php?user=' . $usern .'">View Gallery</a>';
	      }
	       mysqli_close($c4);
	    ?>
	    
	  </div>
	</div>
  </body>
</html>
