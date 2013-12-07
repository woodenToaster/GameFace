//This function is called every 15 seconds when the user is
//logged in and on the home page.  It updates and displays 
//notifications dynamically.
function displayNotifications() {
	var request = $.ajax({
		url: "feed.php",
		//type: "POST";
		dataType: "json"
	});
	request.done(function(data) {
		$('#notifications').prepend(data);
		/*
			$('#notifications').prepend(
				"<div class='notification'>" + data[0].fromUser + " has invited you to the event <a href='#'>"
				+ data[0].text + "</a></div>");
		*/
	});
}

//change back to 5000 after testing
$(setInterval(function(){displayNotifications()}, 5000));

//TODO: format each type of notification for a specific output.  The one above
//is for event notifications.  CSS can spruce up divs with the .notification class.

//TODO:  need to iterate through all new notifications at login.  Also, once a
//notification has been displayed, set a flag so it doesn't get displayed again.

/*
var i;
for(i = 0; i < json.length; i++) {
	var notif = document.getElementById("notifications");
	//format depending on type
	//if(json.type == "Invite") {
		notif.innerHTML += "<div>" + json.fromUser + 
			" has invited you to the event <a href='#'>" + json.text + 
			"</a></div>";
		
	}
*/