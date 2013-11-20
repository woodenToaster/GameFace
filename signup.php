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
		global $fnameErr, $lnameErr, $emailErr, $email2Err, $unameErr, $pwErr, $top5Err;
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
			
			if($_POST['pw'] != $_POST['pw2'])
			{
				$pwErr = "Passwords don't match";
				$err = true;
			}
			
			if(empty($_POST['email']))
			{
				$emailErr = "Email is required";
				$err = true;
			}
			
			if(empty($_POST['pw']))
			{
				$pwErr = "Password required";
				$err = true;
			}
			
			if(empty($_POST['username']))
			{
				$unameErr = "Username required";
				$err = true;
			}
			
			if(empty($_POST['game1']) || empty($_POST['game2']) || empty($_POST['game3']) ||
				     empty($_POST['game4']) || empty($_POST['game5']))
			{
				$top5Err = "Top 5 required";
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
				
				$x = "INSERT INTO Accounts (username, 
											email, 
											password, 
											firstName, 
											lastName,
											game1, 
											game2, 
											game3, 
											game4, 
											game5, 
											major, 
											year)
											
					  VALUES ('$_POST[username]', 
							  '$_POST[email]', 
							  '$_POST[pw]',
							  '$_POST[fname]',
							  '$_POST[lname]',
							  '$_POST[game1]',
							  '$_POST[game2]',
							  '$_POST[game3]',
							  '$_POST[game4]',
							  '$_POST[game5]',
							  '$_POST[major]',
							  '$_POST[year]')";
							  
				if(!mysqli_query($c, $x))
				{
					die('Error: ' . mysqli_error($c));
				}
				
				mysqli_close($c);
				$url = "http://people.eecs.ku.edu/~chogan/448_Project/success.html";
				header("Location: $url");
			}
		}	
		?>
</head>
<body>
	<div id="wrapper2">
		<?php include_once("php_includes/header.php"); ?>	
		<div id="signup">
			<h2>Sign Up For Free Now!</h2>
			<form action="signup.php" method="POST">
				<table>
					<tr><td>Username:</td> <td><input type="text" name="username"><?php echo $unameErr;?></td></tr>
					<tr><td>Email:</td> <td><input type="text" name="email"><?php echo $emailErr;?></td></tr>
					<tr><td>Re-Enter Email:</td> <td><input type="text" name="email2"><?php echo $email2Err;?></td></tr>
					<tr><td>Password:</td> <td><input type="password" name="pw"></td></tr>
					<tr><td>Re-Enter Password:</td> <td><input type="password" name="pw2"><?php echo $pwErr;?></td></tr>
					<tr><td>Top Five Games</td></td></tr>
					<tr><td>1.</td> <td><input type="text" name="game1"></td></tr>
					<tr><td>2.</td> <td><input type="text" name="game2"></td></tr>
					<tr><td>3.</td> <td><input type="text" name="game3"><?php echo $top5Err;?></td></tr>
					<tr><td>4.</td> <td><input type="text" name="game4"></td></tr>
					<tr><td>5.</td> <td><input type="text" name="game5"></td></tr>
					<tr><td>First Name:</td> <td><input type="text" name="fname"><?php echo $fnameErr;?></td></tr>
					<tr><td>Last Name:</td> <td><input type="text" name="lname"><?php echo $lnameErr;?></td></tr>
					<tr><td>School Year:</td> <td><input type="text" name="year"></td></tr>
					<tr><td>Major:</td> <td><input type="text" name="major"></td></tr>
					<tr><td></td><td><input type="submit" value="Sign Up"></td></tr>
				</table>
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
