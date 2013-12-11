<!--written and tested by: Katherine -->
<html>
<head>
  <link href="css/main.css" rel="stylesheet" type="text/css">
  <title>Upload Screenshots</title>
  <?php
    include_once("php_includes/nav.php");
    include_once("php_includes/header.php");
    include("php_includes/upload_file.php");
    include("php_includes/sessions.php");
    include("php_includes/removeimg.php");
  ?>
</head>
<body>
  <div id="uploadscn">
    <h2>Screenshots</h2>
    <?php
      include("php_includes/connection.php");
  
      $sql = "SELECT * FROM screenshots WHERE username='".$self."'";
     
      $result = mysqli_query($c, $sql);
      $i = 1;
      echo "<table width=\"100%\" style=\"height: 13em;\">";
      while($pic = mysqli_fetch_array($result)) {
        if($i%5 == 1){
          echo "<tr>";
        }
        $pathToPic = "user_screenshots/" . $self . "/" . $pic['data'];
        $i ++;
        echo "<td style=\"width:20%;\"><img src=\"" . $pathToPic . "\"
			style=\"width:13em;\"><br>";
        echo "<small>" . $pic['gamename'] . "<br>";
        echo $pic['filename'] . "<br>";
        echo $pic['description'] . "</small><br>";
        echo '<form method="post" action="uploadpic.php" >';
        echo '<input type="hidden" value="'. $pic['data'] .'" name="pfile" />';
        echo '<input type="submit" name="removeimg" value="remove" />';
        echo '</form></td>';
      }
      if($i%5 == 0){
        echo "</tr>";
      }
      echo "</table>";
      mysqli_close($c);
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
    enctype="multipart/form-data">
      <?php echo $Error ?>
      <table>
        <tr>
          <td>
	    Add Screenshot:
  	  </td>
	  <td>
	    <input type="file" name="uploaded_file" id="file">
	  </td>
        </tr>
	<tr>
	  <td>
	    Game Name:
	  </td>
	  <td>
	    <input type="text" name="gamename">
	  </td>
	</tr>
	<tr>
	  <td>
	    Name:
	  </td>
	  <td>
	    <input type="text" name="name">
	  </td>
	</tr>
	<tr>
	  <td>
	    Description:
	  </td>
	  <td>
	    <input type="text" name="description">
	  </td>
	</tr>
	<tr>
	  <td>
	    <input type="submit" name="UPsubmit" value="Add">
	  </td>
	</tr>
      </table>
    </form>
  </div>
  <?php include_once('php_includes/footer.php'); ?>
</body>
</html>
