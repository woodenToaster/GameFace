<?php 
	session_start();
	$con = mysqli_connect("mysql.eecs.ku.edu", "chogan", "GameFace", "chogan");
	if (mysqli_connect_errno())
		{
		echo "Failed to connect to MySQL:". mysqli_connect_error();
		}

	$search = $_POST['search'];
	$option = $_POST['option'];

	$eventCreator = $_SESSION['username'];

	echo($search);
	echo($option);

	$result1 = mysqli_query($con, "SELECT * FROM Accounts WHERE username LIKE '%$search%' OR email LIKE '%$search%' OR firstName LIKE '%$search%'OR lastName LIKE '%$search%'OR game1 LIKE '%$search%'OR game2 LIKE '%$search%'OR game3 LIKE '%$search%'OR game4 LIKE '%$search%' OR game5 LIKE '%$search%' OR major LIKE '%$search%'OR year LIKE '%$search%' " );

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
					<h1 style="color: yellow"> Search Results </h1>
					<div id="eventLabel" style="color: white; margin-left: 50px; float:left">
					</br></br>
					<h2> Search Results for <?php echo $search ?> </h2>
					
					<div id = "friendslist">
						<?php 
						while($row = mysqli_fetch_array($result1))
						  {
						  $friend = $row['username'];
						  echo "<a style=\"color:yellow\" href=\"profile.php?user=";
		 		                  echo $friend;
		 				  echo "\">$friend</a><br>";
						  } 
						?>
						
						</br>
						<button name="finished" value="Finished" onClick = homePage();> Finished </button>
					</div>
					<script>
						function homePage(){
							window.location.assign("./index.php")
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
