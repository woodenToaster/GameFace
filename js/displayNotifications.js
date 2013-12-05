//This function is called every 15 seconds when the user is
//logged in and on the home page.  It updates and displays 
//notifications dynamically.
function displayNotifications(user) {
	$.ajax({
		url: "feed.php",
		dataType: "json",
		success: function(json){
			var i;
			for(i = 0; i < json.length; i++) {
				var notif = document.getElementById("notifications");
				//format depending on type
				if(json.type == "Invite") {
					notif.innerHTML += "<div>" + json.fromUser + 
						" has invited you to the event <a href='#'>" + json.text + 
						"</a></div>";
				}
			}
		}
	});
}

$(document).ready(setInterval(displayNotifications(), 15000));