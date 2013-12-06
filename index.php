<html>
    <head>
		<?php 
			include_once('php_includes/header.php');
			include_once('php_includes/nav.php');
			include('php_includes/sessions.php'); 
		?>
        <link href="css/main.css" rel="stylesheet" type="text/css">
        <title>GameFace: Home</title>
		<script type="text/javascript" src="js/ajax.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/displayNotifications.js"></script>
    </head>
    <body>
		<div id="wrapper">
			
			<div id="view">
				<?php include_once('php_includes/sidebar.php'); ?>
				<div id="content">
					<div id="notifications"></div>
					<div id="suggestions"></div>
				</div>
			</div>
		</div>
		<?php include_once('php_includes/footer.php'); ?>
    </body>
</html>
