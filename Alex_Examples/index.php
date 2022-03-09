<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="./style/style.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="./js/liveChat.js"></script>
	<title>Robot E</title>
</head>

<body>

<form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
	<input type="submit" value="Forward" name="Forward">
	<input type="submit" value="Back" name="Back">
	<input type="submit" value="Stop" name="Stop">
	<input type="submit" value="TurnLeft" name="TurnLeft">
	<input type="submit" value="TurnRight" name="TurnRight">
	<input type="submit" value="LineTrack" name="LineTrack">
</form>

<div style="height: 40px"></div>

<label for="message">Enter your message!</label>
<input type="text" name="message" id="message">
<span class="submit_txt_db">Submit</span>

<div class="main"></div>

<?php
	$ipAddress = "192.168.10.6";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		foreach ($_POST as $postRequest) {
			if (isset($postRequest)) {
				$url = curl_init("http://" . $ipAddress . "/" . $postRequest); //  http://192.168.137.225/Request
				curl_exec($url);
				curl_close($url);
				//echo $postRequest;
			}
		}
	}
?>

</body>

</html>
