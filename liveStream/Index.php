<?php

use LDAP\Result;

session_start();
include "functions.php";
include "dbh.php";
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="styling.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="liveChat.js"></script>
	<title>Live Stream</title>
</head>
<body>
<div class="box">
	<div class="user">
		<?php
		$query = "SELECT * FROM users";
		$result = mysqli_query($conn,$query);

		// Echo session variables that were set on previous page
		echo "<p>"."Hello " . $_SESSION['User'] ."</p>";
		?>
	</div>

	<div class="chatenter">
<form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
	<label for="message">Enter your message!</label>
	<input type="text" name="message" id="message">
	<span class="submit_txt_db" >Submit</span>
</form>
</div>
<div class="chatbox">
<div style="height: 10px"></div>
<div class="main"></div>
</div>
</div>
<!---</div>
<div class="ActiveRobots">
<div class="RobotBoxActivitie">Robot 1</div>
<div class="RobotBoxActivitie">Robot 2</div>
<div class="RobotBoxActivitie">Robot 3</div>
<div class="RobotBoxActivitie">Robot 4</div>
<div class="RobotBoxActivitie">Robot 5</div>
<div class="RobotBoxActivitie">Robot 6</div>
</div>--->
</body>
</html>
