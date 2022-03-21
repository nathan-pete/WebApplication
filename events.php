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
<div class="body">
  <?php
    include_once "header.php";
  ?>
  <div class="events-title">
    <h1 style="font-weight: 700; pointer-events: none;">Events</h1>
  </div>
  <div class="events-content">
  <?php
        $query = $conn ->prepare("SELECT `name`, `description`, `picture` FROM games");
  
        $query->execute();
        $query->bind_result($name, $picture, $votes);
        while($query->fetch())
        {
          echo "<div class="event-items">
          <a href="liveEvent.php">
            <div class="event-img">
            <a href="votegame.php?name='. $picture .'"class="tweak" alt="Battle Bot - Line Tracking" height="110" width="109">
              <div class="event-text">
                <h3 class="event-h" style="padding-bottom:0.5%;">`.$name.`</h3>
                <p class=" event-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Quisque condimentum diam vel velit lobortis, tempor dictum lacus hendrerit.</p>
              </div>
            </div>
        </div>" 
        }
?>
  </div>
</div>
<br>
<?php
  include_once "footer.html";
?>
</body>
</html>
