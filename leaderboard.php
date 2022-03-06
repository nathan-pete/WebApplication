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
    include_once "header.html";
  ?>
  <div class="events-title">
    <h1 style="font-weight: 700; pointer-events: none;">Events</h1>
  </div>
  <table class="leaderboard">
    <tr>
      <th class="ldh">Position</th>
      <th class="ldh">Robot Name</th>
      <th class="ldh">Team Name</th>
      <th class="ldh">Points</th>
    </tr>
    <tr>
      <td class="ldt">1</td>
      <td class="ldt"></td>
      <td class="ldt"></td>
      <td class="ldt"></td>
    </tr>
    <tr>
      <td class="ldt">2</td>
      <td class="ldt"></td>
      <td class="ldt"></td>
      <td class="ldt"></td>
    </tr>
    <tr>
      <td class="ldt">3</td>
      <td class="ldt"></td>
      <td class="ldt"></td>
      <td class="ldt"></td>
    </tr>
    <tr>
      <td class="ldt">4</td>
      <td class="ldt"></td>
      <td class="ldt"></td>
      <td class="ldt"></td>
    </tr>
    <tr>
      <td class="ldt">5</td>
      <td class="ldt"></td>
      <td class="ldt"></td>
      <td class="ldt"></td>
    </tr>

    <tr>
      <td class="ldt">6</td>
      <td class="ldt"></td>
      <td class="ldt"></td>
      <td class="ldt"></td>
    </tr>
  </table>
</div>
<br>
<?php
  include_once "footer.html";
?>
</body>
</html>
