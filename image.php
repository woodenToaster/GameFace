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
  <div id="image">
    <?php
      $picid = $_GET['id'];
      $sql = "SELECT * FROM screenshots WHERE id='".$picid."'";
      $result = mysqli_query($c, $sql);
      $count = mysqli_num_rows($result);
      $r = $result->fetch_object();

      if($count != 1){
        echo "Image does not exist.  ";
	echo '<a href="javascript:history.back(1);">Go Back</a>';
      }
      else {

      }
    ?>
  </div>
</body>
</html>
