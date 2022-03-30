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
			<li><class="line"> &VerticalLine;</li>
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
				if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
					$sql = "SELECT DoB FROM users WHERE userID = ?";
					if ($stmt = mysqli_prepare($conn, $sql)) {
                        $userID = $_SESSION['userID'];
						$stmt->bind_param('i', $userID);
						if (mysqli_stmt_execute($stmt)) {
							mysqli_stmt_bind_result($stmt, $dateOfBirth);
							mysqli_stmt_fetch($stmt);
							if ($dateOfBirth == 1) {
								echo '<li><a href="betting18p.php" class="bets">Bets</a></li>';
							} else {
								echo '<li><a href="betting18m.php" class="bets">Bets</a></li>';
							}
                            mysqli_stmt_close($stmt);
						} else {
							echo "Error: " . mysqli_error($conn);
							die();
						}
					} else {
						echo "Error: " . mysqli_error($conn);
						die();
					}
				} else {
					echo ' <li><a href="loginpage.php" class="bets">Bets</a></li>';
				}
				echo "<li class='line'> &VerticalLine;</li>";
				if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {
					echo '<li><a href="usrpnl.php" class="login">' . $_SESSION['userName'] . '</a></li>';
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
