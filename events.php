<?php
  session_start();
?>
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
<div class="streamContainer">
<div class="body">
  <?php
      if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1){
            include('header.php');
      } elseif (isset($_SESSION['robotLoggedIn']) && $_SESSION['robotLoggedIn'] == TRUE) {
                include('headerRobot.php');
      } else {
          include('header.php');
      }
  ?>
  <div class="events-title">
    <h1 style="font-weight: 700; pointer-events: none;">Events</h1>
  </div>
  <div class="events-content">
    <?php
      require_once "./connect.php";
      $query = "SELECT `name`, `picture`,`descrption`FROM games";
      if ($stmt = mysqli_prepare($conn, $query)) {
        if (mysqli_stmt_execute($stmt)) {
          mysqli_stmt_bind_result($stmt, $name, $picture, $description);
          mysqli_stmt_store_result($stmt);
          if (mysqli_stmt_num_rows($stmt) === 0) {
            echo '
              <div class="event-items">
                <a href="liveEvent.php">
                  <div class="event-img">
                    <div class="event-text-error">
                      <h3 class="event-h" style="padding-bottom:0.5%;">There are no available events.</h3>
                    </div>
                  </div>
              </div>
            ';
            mysqli_stmt_close($stmt);
          } else {
            while (mysqli_stmt_fetch($stmt)) {
              echo '
                <div class="event-items">
                  <a href="liveEvent.php">
                    <div class="event-img">
                      <img src="./uploads/games/' . $picture . '"class="tweak" alt="Battle Bot Game" height="101">
                      <div class="event-text">
                        <h3 class="event-h" style="padding-bottom:0.5%;">' . strtoupper($name) . '</h3>
                        <p class=" event-p">' . ucfirst($description) . '</p>
                      </div>
                    </div>
                </div>
                <div class="space-event"></div>
              ';
            }
            mysqli_stmt_close($stmt);
          }
        } else {
          echo "Error: " . mysqli_error($conn);
        }
      } else {
        echo "Error preparing: " . mysqli_error($conn);
      }
    ?>
  </div>
</div>
<div class="space-event"></div>
</div>
<?php
  include_once "footer.html";
?>
</body>
</html>
