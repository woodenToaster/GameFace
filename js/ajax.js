//Created by Chris Hogan
//We used jQuerty for AJAX instead of these functions.
function ajaxObj(method, url) {
	var x = new XMLHttpRequest();
	x.open(method, url, true);
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	return x
}

function ajaxReturn(x) {
	if(x.readyState == 4 && x.status == 200) {
		return true;
	}
}

/* Usage example
*****************************************
<script src="js/ajax.js"></script>
<script>
var ajax = ajaxObj("POST", "parser.php");
ajax.onreadystatechange = function() {
if(ajaxReturn(ajax) == true) {
   alert(ajax.responseText);
}
}
ajax.send("name=George&country=USA");
</script>
*****************************************
<!-- ******** parser.php ******** -->
<?php
if(isset($_POST["name"])){
    echo $_POST["name"]." is from ".$_POST["country"];
exit();
}
?>
*/
