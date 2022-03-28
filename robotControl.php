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

<form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
    <input type="submit" value="Forward" name="Forward">
    <input type="submit" value="Back" name="Back">
    <input type="submit" value="Stop" name="Stop">
    <br><br>
    <input type="submit" value="TurnLeft" name="TurnLeft">
    <input type="submit" value="Turn90Left" name="Turn90Left">
    <input type="submit" value="TurnRight" name="TurnRight">
    <input type="submit" value="Turn90Right" name="Turn90Right">
    <br><br>
    <input type="submit" value="LineTrack" name="LineTrack">
    <input type="submit" value="Maze" name="Maze">
    <br><br>
    <input type="submit" value="ScanNetwork" name="ScanNetwork">
    <input type="submit" value="SendHTTPRequest" name="SendHTTPRequest">
    <h3>Testing</h3>
    <input type="submit" value="findFlag" name="findFlag">
    <input type="submit" value="giveFlag" name="giveFlag">
    <input type="submit" value="turnLeftOrRight" name="turnLeftOrRight">
    <input type="submit" value="printCalibration" name="printCalibration">
</form>

<div style="height: 40px"></div>

<label for="message">Enter your message!</label>
<input type="text" name="message" id="message">
<span class="submit_txt_db">Submit</span>

<div class="main"></div>

<?php
    $ipAddress = "192.168.10.109";
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
