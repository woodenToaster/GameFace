<!DOCTYPE html>
<html>
<head>
	<link href="css/main.css" rel="stylesheet" type="text/css">
	<title>GameFace: Sign up</title>
	<style type="text/css">
	  body{
	    background: -moz-linear-gradient(black,white);
	    background: -webkit-linear-gradient(black,white);
	  }
	</style>
	<?php
		error_reporting(E_ALL);
		ini_set( 'display_errors','1'); 
		global $fnameErr, $lnameErr, $emailErr, $email2Err;
		if (!empty($_POST))
		{
			$err = false;
			
			if(empty($_POST['fname']))
			{
				$fnameErr = "First name is required";
				$err = true;
			}
			
			if(empty($_POST['lname']))
			{
				$lnameErr = "Last name is required";
				$err = true;
			}
			
			if(empty($_POST['phone']))
			{
				$phoneErr = "Phone number is required";
				$err = true;
			}
			
			if(empty($_POST['email']))
			{
				$emailErr = "Email is required";
				$err = true;
			}
			
			if($_POST['email'] != $_POST['email2']) {
				
				$email2Err = "Emails don't match";
				$err = true;
			}
			
			$hostname = "mysql.eecs.ku.edu";
			$user = "chogan";
			$pw = "GameFace";
			$db = "chogan";
			
			if ($err == false)
			{
				$c = mysqli_connect($hostname, $user, $pw, $db);
				if (mysqli_connect_errno($c))
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				
				$x = "INSERT INTO 448Lab (Fname, Lname, Address, Phone, Email, Message, Birthday)
					  VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[address]',
							  '$_POST[phone]', '$_POST[email]', '$_POST[message]', '$_POST[dob]')";
							  
				if(!mysqli_query($c, $x))
				{
					die('Error: ' . mysqli_error($c));
				}
				
				echo "Info submitted.  Thanks!";
				mysqli_close($c);
			}
		}	
		?>
</head>
<body>
	<div id="wrapper2">
		<?php include_once("php_includes/header.php"); ?>	
		<div id="signup">
			<h2>Sign Up For Free Now!</h2>
			<form action="addUser.php" method="POST">
				Email: <input type="text" name="email"><br>
				Re-Enter Email: <input type="text" name="email2"><br>
				Password: <input type="password" name="pw"><br>
				Re-Enter Password: <input type="password" name="pw2"><br>
				Top Five Games<br>
				1. <input type="text" name="game1"><br>
				2. <input type="text" name="game2"><br>
				3. <input type="text" name="game3"><br>
				4. <input type="text" name="game4"><br>
				5. <input type="text" name="game5"><br>
				First Name: <input type="text" name="fname"><?php echo $fnameErr;?><br>
				Last Name: <input type="text" name="lname"><?php echo $lnameErr;?><br>
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
