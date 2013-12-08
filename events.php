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
					<h1 style="color: yellow"> Event Calendar - Create A New Event</h1>
						<h5 style="color: grey; padding-left:20px">Enter information to create a new event, or click here to <a href="calendar.php"> View Created Events</a></h5>	
						
						<div id="eventLabel" style="color: white; margin-left: 50px; float:left">
						</br></br>
						Event Name: </br></br></br>
						Description: </br></br></br></br>
						Event Location: </br></br></br>
						Event Date: </br></br></br>
						Event Time: </br></br></br>
						</div>
						
						<div id="events" style="padding-left: 200px; padding-top: 25px">
						<form action = "eventPost.php" method = "post" name ="eventForm" onsubmit="return validate()">
						<input type = "text" name="eventName" placeholder=" enter your event name"> </br></br>
						<textarea type = "text" name = "eventDescription" cols="26" placeholder=" enter a description (optional)"></textarea></br></br>
						<input type = "text" name ="eventLocation" placeholder=" enter a location"> </br></br>
						<input type = "text" name = "eventDate" id = "eventDateId" name = "datepicker" placeholder=" click to select a date"> </br></br>
						<select type = "text" size="5" name = "eventTime" >
						  <option value="12:00 PM">12:00 PM</option>
						  <option value="12:30 PM">12:30 PM</option>
						  <option value="1:00 PM">1:00 PM</option>
						  <option value="1:30 PM">1:30 PM</option>
						  <option value="2:00 PM">2:00 PM</option>
						  <option value="2:30 PM">2:30 PM</option>
						  <option value="3:00 PM">3:00 PM</option>
						  <option value="3:30 PM">3:30 PM</option>
						  <option value="4:00 PM">4:00 PM</option>
						  <option value="4:30 PM">4:30 PM</option>
						  <option value="5:00 PM">5:00 PM</option>
						  <option value="5:30 PM">5:30 PM</option>
						  <option value="4:30 PM">4:30 PM</option>
						  <option value="5:00 PM">5:00 PM</option>
						  <option value="5:30 PM">5:30 PM</option>
						  <option value="6:00 PM">6:00 PM</option>
						  <option value="6:30 P">6:30 PM</option>
						  <option value="7:00 PM">7:00 PM</option>
						  <option value="7:30 PM">7:30 PM</option>
						  <option value="8:00 PM">8:00 PM</option>
						  <option value="8:30 PM">8:30 PM</option>
						  <option value="9:00 PM">9:00 PM</option>
						  <option value="9:30 PM">9:30 PM</option>
						  <option value="10:00 PM">10:00 PM</option>
						  <option value="10:30 PM">10:30 PM</option>
						  <option value="11:00 PM">11:00 PM</option>
						  <option value="11:30 PM">11:30 PM</option>
						  <option value="12:00 AM">12:00 AM</option>
						  <option value="12:30 AM">12:30 AM</option>
						  <option value="1:00 AM">1:00 AM</option>
						  <option value="1:30 AM">1:30 AM</option>
						  <option value="2:00 AM">2:00 AM</option>
						  <option value="2:30 AM">2:30 AM</option>
						  <option value="3:00 AM">3:00 AM</option>
						  <option value="3:30 AM">3:30 AM</option>
						  <option value="4:00 AM">4:00 AM</option>
						  <option value="4:30 AM">4:30 AM</option>
						  <option value="5:00 AM">5:00 AM</option>
						  <option value="5:30 AM">5:30 AM</option>
						  <option value="4:30 AM">4:30 AM</option>
						  <option value="5:00 AM">5:00 AM</option>
						  <option value="5:30 AM">5:30 AM</option>
						  <option value="6:00 AM">6:00 AM</option>
						  <option value="6:30 AM">6:30 AM</option>
						  <option value="7:00 AM">7:00 AM</option>
						  <option value="7:30 AM">7:30 AM</option>
						  <option value="8:00 AM">8:00 AM</option>
						  <option value="8:30 AM">8:30 AM</option>
						  <option value="9:00 AM">9:00 AM</option>
						  <option value="9:30 AM">9:30 AM</option>
						  <option value="10:00 AM">10:00 AM</option>
						  <option value="10:30 AM">10:30 AM</option>
						  <option value="11:00 AM">11:00 AM</option>
						  <option value="11:30 AM">11:30 AM</option>
						 
						</select> </br></br>
						<input type="submit" value="Create Event">
						
						</form>
					</div>										
				</div>
		<script>
		$(function() {
			$("#eventDateId").datepicker();
		});

		function validate(){
			var name = eventName();
			var location = eventLocation();
			var date = eventDate();
			var time = eventTime();

			if (name == false){
				alert("Please submit highlighted fields.");
				return false;
			}

			if (location == false){
				alert("Please submit highlighted fields.");
				return false;
			}

			if (date == false){
				alert("Please submit highlighted fields.");
				return false;
			}

			if (time == false){
				alert("Please submit highlighted fields.");
				return false;
			}

			alert("Your event has been created!");
			return true;

		}

		function eventName(){
			var name = document.forms["eventForm"]["eventName"];
			if (name.value == ""){
				name.style.border ="6px ridge yellow";
				return false;
			}
			else{
				name.style.border ="none";
				return true;
			}
		}

		function eventLocation(){
			var location = document.forms["eventForm"]["eventLocation"];
			if (location.value == ""){
				location.style.border ="6px ridge yellow";
				return false;
			}
			else{
				location.style.border ="none";
				return true;
			}
		}

		function eventDate(){
			var date = document.forms["eventForm"]["eventDate"];
			if (date.value == ""){
				date.style.border ="6px ridge yellow";
				return false;
			}
			else{
				date.style.border ="none";
				return true;
			}
		}

		function eventTime(){
			var time = document.forms["eventForm"]["eventTime"];
			if (time.value == ""){
				time.style.border ="6px ridge yellow";
				return false;
			}
			else{
				time.style.border ="none";
				return true;
			}
		}

		</script>
		<?php include_once('php_includes/footer.php'); ?>
    </body>
</html>
