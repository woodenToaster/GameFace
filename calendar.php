<html>
    <head>
		<?php 
			include_once('php_includes/header.php');
			include_once('php_includes/nav.php');
			include('php_includes/sessions.php'); 
		?>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
       		<link href="css/main.css" rel="stylesheet" type="text/css">
        	<title>GameFace: Home</title>
		<script type="text/javascript" src="js/ajax.js"></script>
		<script type="text/javascript" src="js/displayNotifications.js">
		

			var user = <?php echo $_SESSION['username']; ?>;
			
		</script>
    </head>
    <body>
		<div id="wrapper">
			<div id="view">
				<?php include_once('php_includes/sidebar.php'); ?>
				<div id="content">
					<h1 style="color: yellow"> Event Calendar - Created Events </h1>
						<h5 style="color: yellow; padding-left:20px"><a href="events.php">Create A New Event</a></h5>
							<?php
								require_once('php_includes/dbAccess.php');
								$c = dbConnect();
								$x = "SELECT * FROM Events";
								$result = mysqli_query($c,$x);

							    while($row = mysqli_fetch_array($result)) 
							    {
							        echo "<td style=\"width:20%;\"><style=\"width:13em;\"><br>";
							        echo $row['eventDate'] . "<br>";
							        echo $row['eventTime'] . "<br>" ;
							        echo $row['eventName'] .  "<br></td>";
							    }
						       	
						    	echo "</table>";
								mysqli_close($c);
							?>
								
					</div>								
				</div>
		
		<?php include_once('php_includes/footer.php'); ?>
    </body>
</html>
