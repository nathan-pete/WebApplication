<!DOCTYPE html>
<body lang="en">
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
        .header-style .nav .menu .login{
          color: #83c0ff;
        }
        .header-style .nav .menu .login:hover{
          color: #0386FF;
          text-decoration: none;
        }
      </style>";
  ?>
</head>
<div class="body">
  <?php
    include_once "header.html";
  ?>
  <div class="events-title">
    <h1 style="font-weight: 700; pointer-events: none;">Events</h1>
  </div>
  <div class="events-content">

    <div class="user-items">
      <div class="user-text">
        <h3 class="user-h" style="padding-bottom:0.5%;">Sumo</h3>
        <p class="user-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Quisque condimentum diam vel velit lobortis, tempor dictum lacus hendrerit.</p>
      </div>
    </div>

  </div>
</div>
<br>
<?php
  include_once "footer.html";
?>
</body>
</html>
