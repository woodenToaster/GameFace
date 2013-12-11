<?php
//written by: Katherine

  include("connection.php");
  include("loginValidation.php");
?> 

<div id ="login">
     <form name="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<table id="signupTable">
       	       <tr><td>Username:</td><td><input type="text" name="luname"></td></tr>
	       <tr><td>Password:</td><td><input type="password" name="lpw"></td></tr>
	       <tr><td></td><td><input type="submit" value="Sign In" name="loginsubmit"></td></tr>
        </table>
	<?php echo $loginErr;?>
     </form>
</div>
