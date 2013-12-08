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
		//$('#notifications').prepend("<div>"+data.length+"</div>");
		//$('#notifications').prepend("<div>"+data+"</div>");
		var i;
		for(i = 0; i < data.length; i++) {
			if(data[i].type == "Invite") {
				if(data[i].displayed == "false") {
					var notif = "<div class='notification'>" + data[i].fromUser + " has invited you to the event <a href='#'>" + data[i].text + "</a></div>";
					$('#notifications').prepend(notif);
					//set displayed to "true" in the database
				}
			}
			else if(data[i].type == "addFriend") {
			
			}
			else if(data[i].type == "comment") {
			
			}
		}
	});
}

$(setInterval(function(){displayNotifications()}, 15000));

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