<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Falling Robot</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>

<?php
  if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1){
        include('header.php');
  } elseif (isset($_SESSION['robotLoggedIn']) && $_SESSION['robotLoggedIn'] == TRUE) {
            include('headerRobot.php');
  } else {
      include('header.php');
  }
?>


<div id="gameContainer">
    <div id="game">
	    <div id="character">
	    	<img src="assets/robot.png" alt="robot">
	    </div>
   </div>

	<div id="result"></div>

	<div class="restart_button"><a href="fallingRobot.php"><button>Restart</button></a></div>

  <div class="tooltip"> Rules &#9432;
    <span class="tooltiptext">In this fun mini-game you will have to make sure to get the most points by passing the robot through the holes. If you fail, you will lose and the game will restart!</span>
  </div>
</div>


<?php include_once "footer.html"; ?>

</body>
    <script src="js/scriptFallingRobot.js" charset="utf-8"></script>
</html>
