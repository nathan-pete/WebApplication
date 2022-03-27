<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="5">
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
    include_once "header.php";
    require_once "connect.php";
  ?>
  <div class="events-title">
    <h1 style="font-weight: 700; pointer-events: none;">Leaderboard</h1>
    <p>**This Pages Refresh every Five seconds**</p>
  </div>
  <div class="center">
    <table class="leaderboard">
      <tr>
        <th class="ldh">Position</th>
        <th class="ldh">Robot Name</th>
        <th class="ldh">Points</th>
      </tr>
      <?php

        /* Mysqli query to fetch rows
        in descending order of marks */
        $result = mysqli_query($conn, "SELECT robotName,points FROM robots ORDER BY points DESC");

        /* First rank will be 1 and
          second be 2 and so on */
        $ranking = 1;

        /* Fetch Rows from the SQL query */
        if (mysqli_num_rows($result)) {
          while ($row = mysqli_fetch_array($result)) {
            echo "
              <tr>
                <td class='ldt'>{$ranking}</td>
                <td class='ldt'>{$row['robotName']}</td>
                <td class='ldt'>{$row['points']}</td>
              </tr>
            ";
            $ranking++;
          }
        }
      ?>
    </table>
  </div>
</div>
<br>
<?php
  include_once "footer.html";
?>
</body>
</html>
