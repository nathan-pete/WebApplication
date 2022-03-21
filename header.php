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
      <li><a href="#" class="bets">Bets</a></li>
      <li class="line"> &VerticalLine;</li>
      <?php
        if (isset($_SESSION["isLogged"])) {
          echo '<li><a href="usrpnl.php" class="login">' . $_SESSION["islogged"] . '</a></li>';
        } else {
          echo '<li><a href="#" class="login">Login</a></li>';
        }
      ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="h-sign">
      <h2>&larr; Header</h2>
    </div>
  </div>
</div>
