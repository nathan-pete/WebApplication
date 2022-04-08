<?php
  session_start();
	include "connect.php";
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['robotName'])) {
        $robotName = $_GET['robotName'];
        $info = "SELECT * FROM robots WHERE robotName = ?";
        if ($stmt = mysqli_prepare($conn, $info)) {
          mysqli_stmt_bind_param($stmt, 's', $robotName);
          if (mysqli_stmt_execute($stmt)) {
            $infoR = mysqli_stmt_get_result($stmt);
            mysqli_fetch_array($infoR);
            mysqli_stmt_close($stmt);
          } else {
            echo "error" . mysqli_error($conn);
          }
        } else {
          echo "error" . mysqli_error($conn);
        }
        
      }
    }
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="./style/style.css">
		<link rel="icon" href="./assets/PBBwhite.png">
		<title>Battle Bot Events</title>
		<?php
			echo "
			      <style>
				        .header-style .nav .menu .events{
				          color: #83c0ff;
			        }
				        .header-style .nav .menu .events:hover{
				          color: #0386FF;
				          text-decoration: none;
			        }
	      </style>";
		?>
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

	<div class="body">
		<div id="profileCenterTitle">
			<h1>Robot <br> Profile</h1>
		</div>
		<div class="space">
		</div>
		<div class="squarecolor">
			<div class="overall">
				<div class="squarecolorsmall">
					<?php
						if ($_GET['robotName']) {
							if ($infoR) {
								foreach ($infoR as $robot) {
									echo $robot['robotName'];
								}
							}
						}
					?>
				</div>
				<div class="squarecolorsmall">
					<?php
						if ($_GET['robotName']) {
							if ($infoR) {
								foreach ($infoR as $robot) {
									echo $robot['serialNum'];
								}
							}
						}
					?>
				</div>
				<div class="squarecolorsmall">
					<audio controls>
						<source src="./assets/sound.mp3" type="audio/mp3">
					</audio>
					<?php
						if (isset($name)) {
							if ($infoR) {
								foreach ($infoR as $robot) {
								}
							}
						}
					?>
				</div>
			</div>
			<div class="overall2">
				<div class="squarecolorbig">
					<?php
						if ($_GET['robotName']) {
							if ($infoR) {
								foreach ($infoR as $robot) {
	                              echo "<img src='./uploads/robots/" . $robot['robotPicture'] . "' alt='Picture of the robot' class='robotimg'>";
								}
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
	  include_once "footer.html";
	?>
	</body>
</html>
