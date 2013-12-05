<html>
    <head>
        <link href="css/main.css" rel="stylesheet" type="text/css">
        <title>GameFace: Home</title>
    </head>
    <body>
		<div id="wrapper">
			<?php 
				include_once('php_includes/header.php');
			    include_once('php_includes/nav.php');
			    include('php_includes/sessions.php'); 
			?>
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
