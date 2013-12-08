<!DOCTYPE html>
<html>
  <head>
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/editProfile.js"></script>
    <title>Edit Profile</title>
    <?php include('php_includes/sessions.php'); 
    	  include('php_includes/editValidation.php');
	  include('php_includes/editAccount.php');
          include_once('php_includes/header.php');
	  include_once('php_includes/nav.php'); ?>
  </head>
  <body>
    <div id="editProfile">
    <br>
      <h2>Edit Your Profile</h2>
      <div id="editpropic">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data" name="editpicform">
	  <table>
	    <tr>Profile Picture:</tr>
	    <tr>
	      <td>
		<img src="<?php echo $path ?>" style="width:13em;">
	      </td>
	      <td>
		<form method="post" action="editprofile.php">
		  <input type="submit" name="removepic" style="width:5em;" value="Remove">
		</form>
	      </td>
	    </tr>
	    <tr>
	      <td>Add Profile Picture:</td>
	      <td><input type="file" name="profilepic" id="file"></td>
	    </tr>
	    <tr>
	      <td>
		<input type="submit" name="picsubmit" value="Change Picture">
	      </td>
	      <td>
		<?php echo $Error ?>
	      </td>
	    </tr>
	  </table>
	</form>
      </div>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" name="editaccForm">
	<table width="50%" align="center">
	  <tr>
	    <td>Email:</td>
	    <td> <?php echo $email ?></td>
	    <td><a href="#" onclick="edit('editEmail'); 
	    	   	             edit('editEmail2');
				     return false;">edit</a></td> 
	  </tr>
	  <tr id="editEmail" style="display: none;">
	    <td>New Email:</td>
	    <td><input type="text" name="email"></td>
	    <td><?php echo $emailErr;?></td>
	  </tr> 
	  <tr id="editEmail2" style="display: none;">
	    <td>Re-Enter Email:</td>
	    <td><input type="text" name="email2"></td>
	  </tr>
	  <tr>
	    <td>Change Password</td>
	    <td></td>
	    <td><a href="#" onclick="edit('editPW'); 
	    	   	             edit('editPW2');
				     return false;">edit</a></td>
	  <tr id="editPW" style="display: none;">
	    <td>New Password:</td>
	    <td><input type="password" name="pw"></td>
	    <td><?php echo $pwErr;?></td>
	  </tr>
	  <tr id="editPW2" style="display: none;">
	    <td>Re-Enter Password:</td> 
	    <td><input type="password" name="pw2"></td>	    
	    <td></td>
	  </tr>
	  <tr>
	    <td>Top Five Games</td>
	  </tr>
	  <tr>
	    <td>1.</td> 
	    <td><?php echo $game1 ?></td>
	    <td><a href="#" onclick="edit('editGame1'); return false;">edit</a></td>
	  </tr>
	  <tr id="editGame1" style="display: none;">
	    <td></td>
	    <td><input type="text" name="game1"></td>
	  </tr>
	  <tr>
	    <td>2.</td> 
	    <td><?php echo $game2 ?></td>
	    <td><a href="#" onclick="edit('editGame2'); return false;">edit</a></td>
	  </tr>
	  <tr id="editGame2" style="display: none;">
	    <td></td>
	    <td><input type="text" name="game2"></td>
	  </tr>
	  <tr>
	    <td>3.</td> 
	    <td><?php echo $game3 ?></td></td>
	    <td><a href="#" onclick="edit('editGame3'); return false;">edit</a></td>
	  </tr>
	  <tr id="editGame3" style="display: none;">
	    <td></td>
	    <td><input type="text" name="game3"></td>
	  </tr>
	  <tr>
	    <td>4.</td> 
	    <td><?php echo $game4 ?></td>
	    <td><a href="#" onclick="edit('editGame4'); return false;">edit</a></td>
	  </tr>
	  <tr id="editGame4" style="display: none;">
	    <td></td>
	    <td><input type="text" name="game4"></td>
	  </tr>
	  <tr>
	    <td>5.</td> 
	    <td><?php echo $game5 ?></td>
	    <td><a href="#" onclick="edit('editGame5'); return false;">edit</a></td>
	  </tr>
	  <tr id="editGame5" style="display: none;">
	    <td></td>
	    <td><input type="text" name="game5"></td>
	  </tr>
	  <tr>
	    <td>First Name:</td>
	    <td> <?php echo $firstname ?></td>
	    <td><a href="#" onclick="edit('editFN'); return false;">edit</a></td> 
	  </tr>
	  <tr id="editFN" style="display: none;">
	    <td>New First Name:</td> 
	    <td><input type="text" name="fname"></td><td><?php echo $fnameErr;?></td>
	  </tr>
	  <tr>
	    <td>Last Name:</td>
	    <td> <?php echo $lastname ?></td>
	    <td><a href="#" onclick="edit('editLN'); return false;">edit</a></td> 
	  </tr>
	  <tr id="editLN" style="display: none;">
	    <td>New Last Name:</td> 
	    <td><input type="text" name="lname"></td><td><?php echo $lnameErr;?></td>
	  </tr>
	  <tr>
	    <td>School Year:</td>
	    <td> <?php echo $schoolyear ?></td>
	    <td><a href="#" onclick="edit('editSY'); return false;">edit</a></td> 
	  </tr>
	  <tr id="editSY" style="display: none;">
	    <td>New School Year:</td> 
	    <td><input type="text" name="year"></td>
	  </tr>
	  <tr>
	    <td>Major:</td>
	    <td> <?php echo $major ?></td>
	    <td><a href="#" onclick="edit('editMajor'); return false;">edit</a></td> 
	  </tr>
	  <tr id="editMajor" style="display: none;">
	    <td>New Major:</td> 
	    <td><input type="text" name="major"></td>
	  </tr>

	  <tr>
	    <td></td>
	    <td><input type="submit" value="Submit" name="editaccsubmit"></td>
	  </tr>	   
	</table>      
      </form>
    </div>
    <?php  include_once('php_includes/footer.php'); ?>
  </body>
</html>
