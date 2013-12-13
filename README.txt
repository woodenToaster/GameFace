README.md		- README file for github
Team 8 Project demo.ppt - Powerpoint for the presentation
about.php		- Page for about us
calendar.php		- Reads the events from the event table in the database and formats them into a table for the user to view and 
			  find more information about the events
editprofile.php		- Form and page for editing profile
eventInvite		- MySQL connection for create events page
eventPost.php		- Form and Validation for inviting friends to events
events.php		- Form and Validation for creating events
feed.php		- Accessing the database to get the user's notifications. Then sends the info to the AJAX request
friendsList.php		- Page for the friends list
gallery.php		- Page to view gallery of every user
image.php		- Page for adding comments to the screenshots
index.php		- Functions as the home page once the user signs in
profile.php		- Page for all user's profile
searchQuery.php		- Validation and MySQL connection to database for the search bar
searchbar.php		- Search bar and form validation for search bar
uploadpic.php		- Form for uploading screenshots as well as viewing screenshots already uploaded


/*****Authentication*****/
username: kwu
password: Katherine

username: test
password: test

/*****TEST FOLDER******/
simpletest     		- This folder contains files that is downloaded for the sign in test
UNIT.txt		- Instructions on how to use the testing codes
feedTest.php		- Testing code for notification bar
test2.php		- Testing code for signing in

/*******css FOLDER*****/
main.css 		- The styling css for everything

/*******IMG FOLDER******/
GameFaceLogo.png	- The image for the GameFace logo
background.png  	- Striped background in index page
default.png     	- Default profile picture for users without a profile picture
search_icon     	- Little search icon on search bar

/*********JS FOLDER******/
ajax.js			- JS file that allows ajax
displayNotifications.js - Dynamically creates notifications to display on the feed
editProfile.js		- Hide and show edit link in the edit profile page

/******PHP_INCLUDES FOLDER******/
addFriend.php		- Code for add friend button which add friend to friends database table
connection.php		- Database connection
dbAccess.php		- Encapsulation of the database connection
defaultDisplay.php	- Sets the 'displayed' column in the user's notification to faulse to ensure they get rendered once upon sign 				  in
editAccount.php		- Displays all the information in edit profile page
editValidation.php	- Validation and MySQL updates for editing profile
footer.php		- Encapsulation of the footer
friends.php		- Redirects user to their own friends list if the user of a friends list don't exist
gcomment.php		- Inserts gallery comments to the database
header.php		- Encapsulation of the header
login.php		- Encapsulation of the login form
loginValidation.php	- Validation of user sign in by checking if the username exists and the password matches and starts session
nav.php			- Encapsulation of the links in the navigation bar
profileVal.php		- Displays information of the user in the profile and redirects the user to their own profile if the profile 			  	  exists
removeFriend.php	- Remove friend from the database when the remove friend button is clicked
removegcomm.php		- Remove gallery comment from the database when user delete comment from their own screenshots
removeimg.php		- Remove screenshot from gallery and database
search.php		- Search through database for search bar
sessions.php		- For every page, sessions will redirect the user to the sign in/sign up page if they are not logged in
sidebar.php		- The column of links that appear on most pages for easy navigation
signout.php		- Destroys sessions when user clicks sign out
signupValidation.php	- Form validations for signing up and inserting sign up information into the database 
suggestions.php		- Finds users with similar games in the Top 5 and suggests as friends by putting a link to their profile
upload_file.php		- Validations and insertions in database for gallery


 