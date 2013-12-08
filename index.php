<html>
    <head>
                <?php
                        include_once('php_includes/header.php');
                        include_once('php_includes/nav.php');
                        include('php_includes/sessions.php');
                        require_once('php_includes/defaultDisplay.php');
                ?>
<link href="css/main.css" rel="stylesheet" type="text/css">
<title>GameFace: Home</title>
                <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                <script type="text/javascript" src="js/displayNotifications.js"></script>
</head>
<body onload='displayNotifications()'>
                <div id="wrapper">
                        
                        <div id="view">
                                <?php include_once('php_includes/sidebar.php'); ?>
                                <div id="content">
													<table id="headings">
														<tr>
															<td><h2>Notifications</h2></td>
															<td><h2>Suggestions</h2></td>
														</tr>
													</table>
                                        <div id="notifications"></div>
                                        
                                        <div id="suggestions">
														<?php include_once('php_includes/suggestions.php'); ?>
													 </div>
                                </div>
                        </div>
                </div>
                <?php include_once('php_includes/footer.php'); ?>
</body>
</html>
