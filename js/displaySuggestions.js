//This function is called when the user first goes to his or
//her home page.  It displays suggestions based on the top 5.
function displaySuggestions() {
	var request = $.ajax({
		url: "suggestions.php",
		//type: "POST";
		dataType: "json"
	});
	request.done(function(data) {
		//$('#suggestions').prepend("<div>"+data.length+"</div>");
		//$('#suggestions').prepend("<div>"+data+"</div>");
		var i;
		for(i = 0; i < data.length; i++) {
			if(data[i].type == "Invite") {
				if(data[i].displayed == "false") {
					var notif = "<div class='notification'>" + data[i].fromUser + " has invited you to the event <a href='#'>" + data[i].text + "</a></div>";
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