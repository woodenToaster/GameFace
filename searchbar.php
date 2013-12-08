<html>
	<head>
	</head>
	<body>

	<form  action="searchQuery.php" method="post" name="searchbar" onsubmit= "return validate()" >
		<input style="width: 180" type="text" name= "search" placeholder = "Search for people:"></input>
		<input type= "submit" value="Submit" style="width: 180">
	</form>
	</form>

	</body>
</html>

<script>
	function validate(){
		var search = document.forms["searchbar"]["search"];
		if (search.value == ""){
				alert("please enter a search");
				return false;
			}
			else{
				return true;
			}
	}

</script>


