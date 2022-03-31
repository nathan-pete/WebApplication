<?php
	session_start();
	if (!isset($_SESSION["robotLoggedIn"])) {
		//echo $_SESSION["robotLoggedIn"];
		header("location: loginpage.php");
	}
	//	$ips = [
	//			1 => "192.168.10.105",
	//			2 => "192.168.10.106",
	//			3 => "192.168.10.107",
	//			4 => "192.168.10.108",
	//			5 => "192.168.10.109",
	//			6 => "192.168.10.110"
	//	];
	
	//	$ipAddress = $ips[$_SESSION["serialNum"]];
	
	$ipAddress = $_SESSION["robotIP"];
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="./js/liveChat.js"></script>
	<title>Robot E</title>
</head>

<body>
<h1>Hello <?= $_SESSION["robotName"] ?></h1>
<form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
	<!-- Same for everyone (but not everyone might use it) -->
	<input type="submit" value="Forward" name="Forward">
	<input type="submit" value="Back" name="Back">
	<input type="submit" value="Stop" name="Stop">
	<br><br>
	<!-- Most probably not used in the game -->
	<input type="submit" value="TurnLeft" name="TurnLeft">
	<input type="submit" value="Turn90Left" name="Turn90Left">
	<input type="submit" value="TurnRight" name="TurnRight">
	<input type="submit" value="Turn90Right" name="Turn90Right">
	<br><br>
	<!-- Games (definitely used!!!) -->
	<input type="submit" value="LineTrack" name="LineTrack">
	<input type="submit" value="Maze" name="Maze">
	<input type="submit" value="Race" name="Race">
	<br><br>
	<!-- NOT USED -->
	<input type="submit" value="ScanNetwork" name="ScanNetwork">
	<input type="submit" value="SendHTTPRequest" name="SendHTTPRequest">
	<h3>Testing</h3>
	<!-- Used by capture the flag, but are NOT buttons, only functionality configured in PHP -->
	<input type="submit" value="findFlag" name="findFlag">
	<input type="submit" value="giveFlag" name="giveFlag">
	<input type="submit" value="turnLeftOrRight" name="turnLeftOrRight">
	<input type="submit" value="printCalibration" name="printCalibration">
</form>

<div style="height: 40px"></div>

<div class="main"></div>

<?php
	//$ipAddress = "192.168.10.109";
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
