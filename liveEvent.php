<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Battle Bot Live Stream</title>
  <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<?php require 'header.php' ?>

<div class="streamContainer">
  <div id="stream_video">
    <img src="http://root:passw0rd098!@camera1.serverict.nl/mjpg/1/video.mjpg?Axis-Orig-Sw=true">
  </div>
</div>

<?php
require 'chatBox.php';
require 'footer.html';
?>
</body>
</html>
