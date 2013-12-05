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
	?>

	<div id="wrapper3">
	  <div id="smallProfile">
	    <h3><?php echo "$firstname $lastname" ?></h3>
	    <br>
	    <?php echo $username ?><br>
	    <?php echo $major ?><br>
	    <?php echo $year ?><br>
	    <?php echo $email ?><br>
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
	  </div>
	</div>
  </body>
</html>