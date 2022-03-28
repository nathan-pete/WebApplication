<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.6/jquery.min.js"></script>
	<link rel="icon" href="./assets/PBBwhite.png">
	<title>Battle Bot Events</title>
</head>
<body>
<?php include_once "header.php"; ?>
<!-- Control Robot page -->
<div class="controlRobotContainer">
	<div class="controlRobottitle">
		<h1 class="title_color">Control A Robot</h1>
	</div>
	<div class="controlRobotvideo">
		<iframe width="800vw" height="450vh" src="https://www.youtube.com/embed/7u5DiF--sLg"></iframe>
	</div>
	<h1 class="title_chat">Chat</h1>
	<div id="robotcontainer">

		<div id="chat_box">
			<div class="chat_data">
				<span class="chat_text">Kaiser: </span>
				<span class="chat_text_message">How are you?</span>
				<span class="chat_text_time">12:30</span>
			</div>
		</div>

		<form class="robotchat" method="post" action="controlRobot.php">
			<input class="robot_text" type="text" name="name" placeholder="enter name"/>
			<textarea class="robot_message" name="enter message" placeholder="enter message"></textarea>
			<input class="robot_submit" type="submit" name="submit" value="Send it"/>
		</form>
	</div>
	<h1 class="title_remote">Remote</h1>
	<div id="remote_box">
		<form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
			<input type="submit" value="Forward" name="Forward">
			<input type="submit" value="Back" name="Back">
			<input type="submit" value="Stop" name="Stop">
			<input type="submit" value="TurnLeft" name="TurnLeft">
			<input type="submit" value="TurnRight" name="TurnRight">
			<input type="submit" value="LineTrack" name="LineTrack">
		</form>
	</div>
</div>

<?php include_once "footer.html"; ?>
<?php

	$ipAddress = "192.168.137.12";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		foreach ($_POST as $postRequest) {
			if (isset($postRequest)) {
				$url = curl_init("http://" . $ipAddress . "/" . $postRequest);
				curl_exec($url);
				curl_close($url);
				echo $postRequest;
			}
		}
	}
?>
</body>
</html>
