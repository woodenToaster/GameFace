<html>
    <head>
        <link href="css/main.css" rel="stylesheet" type="text/css">
        <title>GameFace</title>
    </head>
    <body>
      <?php
	 session_start();
	 if(!isset($_SESSION['username'])){
	   header("location: signup.php");
	 }

      ?>
		<div id="wrapper">
			<?php include_once('php_includes/header.php'); ?>
			<?php include_once('php_includes/nav.php'); ?>
			<div id="view">
				<?php include_once('php_includes/sidebar.php'); ?>
				<div id="content">
					<p>Feed</p>
				</div>
			</div>
		</div>
		<?php include_once('php_includes/footer.php'); ?>
    </body>
</html>
