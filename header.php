<?php
	//session_start();
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
			<li class="line"> &VerticalLine;</li>
			<li><a href="leaderboard.php" class="lead">Minigames</a></li>
			<li class="line"> &VerticalLine;</li>
			<?php
				if (isset($_SESSION['loggedin'])) {
					include "connect.php";
					$sql = "SELECT DoB FROM users WHERE userID = ?";
					if ($stmt = mysqli_prepare($conn, $sql)) {
						$stmt->bind_param('i', $userID);
						if (mysqli_stmt_execute($stmt)) {
							mysqli_stmt_bind_result($stmt, $dateOfBirth);
							mysqli_stmt_fetch($stmt);
							mysqli_stmt_close($stmt);
							if ($dateOfBirth == 1) {
								echo '<li><a href="betting18p.php" class="bets">Bets</a></li>';
							} else {
								echo '<li><a href="betting18m.php" class="bets">Bets</a></li>';
							}
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
				if (isset($_SESSION['loggedin'])) {
					echo '<li><a href="usrpnl.php" class="login">' . $firstName . '</a></li>';
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
