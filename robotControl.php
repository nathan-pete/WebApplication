<?php
	session_start();
	if (!isset($_SESSION["robotLoggedIn"])) {
		//echo $_SESSION["robotLoggedIn"];
		header("location: loginpage.php");
	}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style/style.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="./js/robotControl.js"></script>

	<title><?= $_SESSION["robotName"] ?></title>
</head>

<body>

<?php
		require 'headerRobot.php';
?>

<div class="streamContainer">
		<h1>Hello <?= $_SESSION["robotName"] ?></h1>

		<div class="controlBox">
			<h3>Basic functions</h3>
			<div class="robotControl">Forward</div>
			<div class="robotControl">Back</div>
			<div class="robotControl">Stop</div>
			<h3>Turning functions</h3>
			<div class="robotControl">TurnLeft</div>
			<div class="robotControl">Turn90Left</div>
			<div class="robotControl">TurnRight</div>
			<div class="robotControl">Turn90Right</div>
			<h3>Games</h3>
			<div class="robotControl">LineTrack</div>
			<div class="robotControl">Maze</div>
			<div class="robotControl">Race</div>
			<h3>Network functions</h3>
			<div class="robotControl">ScanNetwork</div>
			<div class="robotControl">SendHTTPRequest</div>
			<h3>Testing</h3>
			<div class="robotControl">findFlag</div>
			<div class="robotControl">giveFlag</div>
			<div class="robotControl">turnLeftOrRight</div>
			<div class="robotControl">printCalibration</div>
		</div>

		<div style="height: 40px"></div>

		<div class="robotHTTPSuccess"></div>
		<!-- The class robotIPAddress is used by Ajax to get the ip address of the robot, therefore it should not be seen by the user -->
		<div class="robotIPAddress" style="display: none"><?= $_SESSION["robotIP"]; ?></div>
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// Ajax method (preferred)
				if (
						$postRequest = filter_input(INPUT_POST, "httpRequest", FILTER_SANITIZE_FULL_SPECIAL_CHARS) and
						$ipAddress = filter_input(INPUT_POST, "ipAddress", FILTER_VALIDATE_IP)
				) {
					$url = curl_init("http://" . $ipAddress . "/" . $postRequest); //  http://192.168.137.225/Request
					curl_setopt_array($url, [
							CURLOPT_HTTPGET => TRUE,
							CURLOPT_CONNECTTIMEOUT_MS => 300,
							CURLOPT_TIMEOUT_MS => 500
					]);
					curl_exec($url);
					curl_close($url);
				}
			}
		?>
</div>

<?php
	require 'footer.html';
?>

</body>
</html>
