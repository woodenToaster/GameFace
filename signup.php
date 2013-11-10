<!DOCTYPE html>
<html>
<head>
	<link href="css/main.css" rel="stylesheet" type="text/css">
	<title>GameFace: Sign up</title>
</head>
<body>
	<div id="wrapper2">
		<?php include_once("php_includes/header.php"); ?>	
		<div id="signup">
			<h2>Sign Up For Free Now!</h2>
			<form action="addUser.php" method="POST">
				Email: <input type="text" name="email"><br>
				Re-Enter Email: <input type="text" name="email2"><br>
				Password: <input type="text" name="pw"><br>
				Re-Enter Password: <input type="text" name="pw2"><br>
				Top Five Games<br>
				1. <input type="text" name="game1"><br>
				2. <input type="text" name="game2"><br>
				3. <input type="text" name="game3"><br>
				4. <input type="text" name="game4"><br>
				5. <input type="text" name="game5"><br>
				First Name: <input type="text" name="fname"><br>
				Last Name: <input type="text" name="lname"><br>
				School Year: <input type="text" name="year"><br>
				Major: <input type="text" name="major"><br>
				<input type="submit" name="Sign Up"><br>
			</form>
		</div>
		<div id="info">
			<h2>Connect With Gamers Across KU!</h2>
			<ul>
				<li>Need to play a multiplayer game but just can't find
					anybody to play with?</li>
				<li>GameFace is the answer!</li>
				<li>Find friends through our trusty, advanced suggestions feed.</li>
				<li>Talk strategy on the latest games in the forum.</li>
				<li>Create events, invite friends, profit!</li>
			</ul>
		</div>
	</div>
	<?php include_once("php_includes/footer.php"); ?>
</body>
</html>
