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
					<h1 style="color: yellow"> Event Calendar - View Created Events </h1>
						<h5 style="color: yellow; padding-left:20px">Click on an Event to see more about it, or click here to <a href="events.php">Create A New Event</a></h5>						
							<?php
								require_once('php_includes/dbAccess.php');
								$c = dbConnect();
								$x = "SELECT * FROM Events ORDER BY eventDate, eventTime";
								$result = mysqli_query($c,$x);

								echo "<table width=600 border='1px' bordercolor='grey' cellpadding='5' cellspacing='0'>";
								echo "<tr bgcolor = 'black'>";
								echo "<td align = 'center'><strong><font color = 'yellow' size='6'>" . 'Event Name' . "</font></strong></td>";
								echo "<td align = 'center'><strong><font color = 'yellow' size='6'>" . 'Event Date' . "</font></td>";
								echo "<td align = 'center'><strong><font color = 'yellow' size='6'>" . 'Event Time' . "</font></td>";
								echo "</tr>";
							    while($row = mysqli_fetch_array($result)) 
							    {
							        $name = $row['eventName'];
							        $date = $row['eventDate'];
							        $time = $row['eventTime'];
							        $location = $row['eventLocation'];
							        $description = $row['eventDescription'];
							        $creator = $row['eventCreator'];
							        
								     echo "<tr bgcolor = 'black'>";
							        echo "<td align = 'center' class= 'event' id='".$name."' value='".$location."' title='".$date."' name='".$time."' lang='".$description."' dir='".$creator."'><strong><font color = 'yellow' size='3'>" . $name . "</font></strong></td>";
									  echo "<td align = 'center'><strong><font color = 'white'  size='3'>" . $date . "</font></strong></td>";
							        echo "<td align = 'center'><strong><font color = 'white'  size='3'>" . $time . "</font></strong></td>";
								     echo "</tr>";
							    }
						      echo "</table>";
								mysqli_close($c);
							?>



					<script>
						$('.event').on('click', function(){
							var name = $(this).attr("id");
							var location = $(this).attr("value");
							var date = $(this).attr("title");
							var time = $(this).attr("name");
							var datetime = date + " at " + time;
							var description = $(this).attr("lang");
							var creator = $(this).attr("dir");
							var creatorstr = "For more information, please contact the event creator " + creator;
							document.getElementById("newTitle").innerHTML= name;
							document.getElementById("newDate").innerHTML= datetime;
							document.getElementById("newDescription").innerHTML = description;
							document.getElementById("newCreator").innerHTML = creatorstr;
						});
					</script>

					<div id="new" style="width:600; background-color:black;">
						<br>
						<h1 id="newTitle" style="color:yellow; padding-left:10px;"></h1>
						<h3 id="newDate" style="color:white; padding-left:10px;"></h3>
						<h4 id="newDescription" style="color:yellow; padding-left:30px;"></h4>
						<h4 id="newCreator" style="color:white; padding-left:10px;"></h4>
					</div>
				</div>
		
		<?php include_once('php_includes/footer.php'); ?>
    </body>
</html>
