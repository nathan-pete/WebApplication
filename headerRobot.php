<?php
	include_once "connect.php"
?>

<div class="header-style">
	<div class="nav">
		<input type="checkbox">
		<span></span>
		<div class="menu">
			<li><a href="index.php" class="home">Home</a></li>
			<li class="line"> &VerticalLine;</li>
			<li><a href="events.php" class="events">Events</a></li>
			<li class="line"> &VerticalLine;</li>
			<li><a href="leaderboard.php" class="lead">Leaderboard</a></li>
			<li>
				<class
				="line"> &VerticalLine;
			</li>
			<li>
				<div class="dropdown">
					<button class="dropbtn">Minigames</button>
					<div class="dropdown-content">
						<a href="2048.php">2048</a>
						<a href="fallingRobot.php">Falling Robot</a>
					</div>
				</div>
			</li>
			<li class="line"> &VerticalLine;</li>
			<?php
				if (isset($_SESSION['robotLoggedIn']) && $_SESSION['robotLoggedIn'] == TRUE) {
					echo '<li><div class="dropdown"><a href="robotControl.php"><button class="dropbtn">' . $_SESSION['robotName'] . '</button></a><div class="dropdown-content"><a href="logout.php">Logout</a></div></div></li>';
				} else {
					echo '<li><a href="loginpage.php" class="login">Login</a></li>';
				}
			?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
		<div class="h-sign">
			<h2>&larr; Menu Bar</h2>
		</div>
	</div>
</div>
