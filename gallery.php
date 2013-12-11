<!--written and tested by: Katherine-->
<html>
<head>
  <link href="css/main.css" rel="stylesheet" type="text/css">
  <title>Screenshots</title>
  <?php
    include_once("php_includes/nav.php");
    include_once("php_includes/header.php");
    include("php_includes/sessions.php");
    include("php_includes/connection.php");
  ?>
</head>
<body>
  <div id="gallery">
    <?php
      $usern = $_GET['user'];
      $sql = "SELECT * FROM screenshots WHERE username='".$usern."'";

      $result = mysqli_query($c, $sql);

      $i = 1;

      echo "<table width=\"100%\" style=\"min-height: 13em;\">";
      while($pic = mysqli_fetch_array($result)) {
        if($i%5 == 1){
          echo "<tr>";
        }
        $pathToPic = "user_screenshots/" . $usern . "/" . $pic['data'];
        $i ++;
        echo "<td style=\"width:20%;\"><a href=\"image.php?id="
			. $pic['id'] . "\">
			<img src=\"" . $pathToPic . "\"
			style=\"width:13em;\"></a><br>";
        echo "<small>" . $pic['gamename'] . "<br>";
        echo $pic['filename'] . "<br>";
        echo $pic['description'] . "</small></td>";
      }
      if($i%5 == 0){
        echo "</tr>";
      }
      echo "</table>";

    ?>
  </div>
</body>
</html>
