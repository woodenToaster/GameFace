<?php 
	session_start();
	$con = mysqli_connect("mysql.eecs.ku.edu", "chogan", "GameFace", "chogan");
	if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySQL:". mysqli_connect_error();
		}

	$eventName = $_POST['eventName'];
	$eventDescription = $_POST['eventDescription'];
	$eventLocation = $_POST['eventLocation'];
	$eventDate = $_POST['eventDate'];
	$eventTime = $_POST['eventTime'];
	$eventCreator = $_SESSION['username'];

	$x = mysqli_query($con, "INSERT INTO Events (eventName, eventDescription, eventLocation, eventDate, eventTime, eventCreator) VALUES ('$eventName','$eventDescription', '$eventLocation','$eventDate','$eventTime','$eventCreator');");

	mysqli_close($con);
	
?>

<?php
	$con2 = mysqli_connect("mysql.eecs.ku.edu", "chogan", "GameFace", "chogan");
	if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySQL:". mysqli_connect_error();
		}

	$result = mysqli_query($con2, "SELECT * FROM friendsList WHERE friend1 = '$eventCreator'");
	
	mysqli_close($con2);

?>

<html>
    <head>

		<?php 
			include_once('php_includes/header.php');
			include_once('php_includes/nav.php'); 
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
					<h1 style="color: yellow"> Invite Friends </h1>
					<div id="eventLabel" style="color: white; margin-left: 50px; float:left">
					</br></br>
					<h2> Invite Friends to <?php echo $eventName ?> </h2>
					<h4 style ="color:gray"> Click on the friends you want to invite </h4>
					
					<div id = "friendsInvitations" style="padding-left:30px;">
						<?php 
						while($row = mysqli_fetch_array($result))
						  {
						  $var = $row['friend2'];
						  print '<form style="cursor:pointer" class="invitelist" id="'.$var.'" value="'.$var.'" > '. $var . '</form>';
						 
						  } 
						?>
						
						</br>
						<button name="finished" value="Finished" onClick = homePage();> Finished </button>
					</div>
					<script>
						function homePage(){
							window.location.assign("./index.php");
						}

						$('.invitelist').on('click', function(){
							var toUser = $(this).attr("id");
							var text = "<?php echo $eventName?>";
							var fromUser = "<?php echo $eventCreator?>";
							$(this).css('color', 'yellow');

							//alert(toUser + ' ' + text + ' ' + fromUser);

							$.post('eventInvite.php',{toUser:toUser, text:text, fromUser:fromUser},
							function(data){
							});
					
						});
					</script>

 
					</div>
					<div id="events" style="padding-left: 200px; padding-top: 25px">


					</div>
					
		<?php include_once('php_includes/footer.php'); ?>
    </body>
</html>
