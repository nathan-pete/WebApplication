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
    include_once "header.html";
  ?>
  <div class="events-title">
    <h1 style="font-weight: 700; pointer-events: none;">Events</h1>
  </div>
  <div class="events-content">

    <div class="event-items">
      <div class="event-img">
        <img src="./assets/sumo.png" class="tweak" alt="Battle Bot - Sumo" height="110" width="135">
        <div class="event-text">
          <h3 class="event-h" style="padding-bottom:0.5%;">Sumo</h3>
          <p class=" event-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Quisque condimentum diam vel velit lobortis, tempor dictum lacus hendrerit.</p>
        </div>
      </div>
    </div>

    <div class="event-items">
      <div class="event-img">
        <img src="./assets/line.png" class="tweak" alt="Battle Bot - Line Tracking" height="110" width="109">
        <div class="event-text">
          <h3 class="event-h" style="padding-bottom:0.5%;">Line Tracking</h3>
          <p class=" event-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Quisque condimentum diam vel velit lobortis, tempor dictum lacus hendrerit.</p>
        </div>
      </div>
    </div>

    <div class="event-items">
      <div class="event-img">
        <img src="./assets/pen.png" class="tweak" alt="Battle Bot - Figure Drawing" height="110" width="135">
        <div class="event-text">
          <h3 class="event-h" style="padding-bottom:0.5%;">Figure Drawing</h3>
          <p class=" event-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Quisque condimentum diam vel velit lobortis, tempor dictum lacus hendrerit.</p>
        </div>
      </div>
    </div>

    <div class="event-items">
      <div class="event-img">
        <img src="./assets/maze.png" class="tweak" alt="Battle Bot - Maze Race" height="110" width="135">
        <div class="event-text">
          <h3 class="event-h" style="padding-bottom:0.5%;">Maze Race</h3>
          <p class=" event-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Quisque condimentum diam vel velit lobortis, tempor dictum lacus hendrerit.</p>
        </div>
      </div>
    </div>

    <div class="event-items">
      <a href="controlRobot.php">
        <div class="event-img">
          <img src="./assets/rc.png" class="tweak" alt="Battle Bot" height="110" width="107">
          <div class="event-text">
            <h3 class="event-h" style="padding-bottom:0.5%;">Control a Robot</h3>
            <p class=" event-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Quisque condimentum diam vel velit lobortis, tempor dictum lacus hendrerit.</p>
          </div>
        </div>
      </a>
    </div>

  </div>
</div>
<br>
<?php
  include_once "footer.html";
?>
</body>
</html>
