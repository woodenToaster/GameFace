//Created by Chris Hogan

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
					var notif = "<div class='notification'>" + data[i].fromUser + " has invited you to the event <a href='./calendar.php'>" + data[i].text + "</a></div>";
					$('#notifications').prepend(notif);
				}
			}
			else if(data[i].type == "addFriend") {
				//format for 'addFriend'
			}
			else if(data[i].type == "comment") {
				//format for 'comment'
			}
		}
	});
}

$(setInterval(function(){displayNotifications()}, 15000));
