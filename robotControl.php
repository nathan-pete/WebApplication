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
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="" type="text/css">
	<!-- This should be changed to a normal stylesheet -->
	<style>
		.controlBox {
			display: grid;
			grid-template-columns: 25% 25% 25% 25%;
			width: 42em;
		}
		
		.controlBox h3 {
			grid-column: 1 / 5;
		}
		
		.robotControl {
			width: 10em;
			height: 2em;
			background-color: #ff8800;
			border-radius: 10px;
			border: 1px solid black;
			text-align: center;
			line-height: 2em;
			margin: 0.5em 0 0.5em 0;
			cursor: pointer;
		}
		
		.robotControl:active {
			background-color: #b2a7a7;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="./js/liveChat.js"></script>
	<!-- Also changed to a proper js document -->
	<script>
		$(function () {
			$(".robotControl").on("click", function () {
				let request = $(this).text();
				
				$.ajax({
					type: "post",
					url: "./robotControl.php",
					data: {
						"httpRequest": request,
						"ipAddress": <?= $_SESSION["robotIP"]; ?>
					},
					success: function (data) {
						$(".robotHTTPSuccess").text(data + " executed successfully!")
					}
				});
			})
		})
	
	</script>
	<title><?= $_SESSION["robotName"] ?></title>
</head>

<body>
<h1>Hello <?= $_SESSION["robotName"] ?></h1>
<!--<form action="--><? //= htmlentities($_SERVER['PHP_SELF']) ?><!--" method="post">-->
<!--	<!-- Same for everyone (but not everyone might use it) -->-->
<!--	<input type="submit" value="Forward" name="Forward">-->
<!--	<input type="submit" value="Back" name="Back">-->
<!--	<input type="submit" value="Stop" name="Stop">-->
<!--	<br><br>-->
<!--	<!-- Most probably not used in the game -->-->
<!--	<input type="submit" value="TurnLeft" name="TurnLeft">-->
<!--	<input type="submit" value="Turn90Left" name="Turn90Left">-->
<!--	<input type="submit" value="TurnRight" name="TurnRight">-->
<!--	<input type="submit" value="Turn90Right" name="Turn90Right">-->
<!--	<br><br>-->
<!--	<!-- Games (definitely used!!!) -->-->
<!--	<input type="submit" value="LineTrack" name="LineTrack">-->
<!--	<input type="submit" value="Maze" name="Maze">-->
<!--	<input type="submit" value="Race" name="Race">-->
<!--	<br><br>-->
<!--	<!-- NOT USED -->-->
<!--	<input type="submit" value="ScanNetwork" name="ScanNetwork">-->
<!--	<input type="submit" value="SendHTTPRequest" name="SendHTTPRequest">-->
<!--	<h3>Testing</h3>-->
<!--	<!-- Used by capture the flag, but are NOT buttons, only functionality configured in PHP -->-->
<!--	<input type="submit" value="findFlag" name="findFlag">-->
<!--	<input type="submit" value="giveFlag" name="giveFlag">-->
<!--	<input type="submit" value="turnLeftOrRight" name="turnLeftOrRight">-->
<!--	<input type="submit" value="printCalibration" name="printCalibration">-->
<!--</form>-->

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

<div class="main"></div>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Classic method
//		$ipAddress = $_SESSION["robotIP"];
//		foreach ($_POST as $postRequest) {
//			if (isset($postRequest)) {
//				$url = curl_init("http://" . $ipAddress . "/" . $postRequest); //  http://192.168.137.225/Request
//				curl_setopt_array($url, [
//						CURLOPT_HTTPGET => TRUE,
//						CURLOPT_CONNECTTIMEOUT => 1,
//						CURLOPT_TIMEOUT => 2
//				]);
//				curl_exec($url);
//				curl_close($url);
//				//echo $postRequest;
//			}
//		}
		// Ajax method (preferred)
		if (
				$postRequest = filter_input(INPUT_POST, "httpRequest", FILTER_SANITIZE_FULL_SPECIAL_CHARS) &&
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
			echo $postRequest;
		}
	}
?>

</body>

</html>
