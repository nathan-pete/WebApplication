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
<?php
  if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
    include('header.php');
  } elseif (isset($_SESSION['robotLoggedIn']) && $_SESSION['robotLoggedIn'] == TRUE) {
    include('headerRobot.php');
  } else {
    include('header.php');
  }
?>

<div class="streamContainer">
  <div id="stream_video">
    <iframe style="-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 25%);"
            src="http://root:passw0rd098!@camera1.serverict.nl/mjpg/1/video.mjpg?Axis-Orig-Sw=true" width="1080" height="1920"></iframe>
  </div>
</div>

<?php
  require 'chatBox.php';
  require 'footer.html';
?>

</body>
</html>
