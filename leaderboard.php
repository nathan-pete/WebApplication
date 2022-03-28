<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./style/style.css">
  <link rel="icon" href="./assets/PBBwhite.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>Battle Bot Events</title>
  <?php
    echo "
      <style>
        .header-style .nav .menu .lead{
          color: #83c0ff;
        }
        .header-style .nav .menu .lead:hover{
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
    <h1 style="font-weight: 700; pointer-events: none;">Leaderboard</h1>
    <div class="space-event"></div>
    <p class="leadnote">**Note: Leaderboard Refresh every Two seconds**</p>
  </div>
  <div class="space-event"></div>
  <div class="center">
    <table class="leaderboard">
    </table>
  </div>
</div>
<script>
    setInterval(function () {
        $('.leaderboard').load('./Utils/lbdData.php');
    }, 2000)
</script>
<div class="space-pass"></div>


<br>
<?php
  include_once "footer.html";
?>
</body>
</html>
