<?php
  session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./style/style.css">
        <title>Bets</title>
      <?php
        if($_SESSION['user_type'] != 'user') {
          header("location:./loginpage.php");
        }
      ?>
    </head>
    <body>
        <div class="body">
            <?php
              include_once "header.php";
            ?>
            <div class="space"></div>
            <div class="center">
                <table class="leaderboard">
                    <tr>
                        <th class="ldh">Robot name</th>
                        <th class="ldh">Game name</th>
                        <th class="ldh">Position</th>
                        <th class="ldh">Bet Amount</th>
                    </tr>
                    <?php
                      require_once "./connect.php";
                    
                      $query = "SELECT robotName, gameName, betAmount, position FROM bets WHERE userId = ?";
                      if ($stmt = mysqli_prepare($conn, $query)) {
                        mysqli_stmt_bind_param($stmt, "i", $userID);
                        if (mysqli_stmt_execute($stmt)) {
                          mysqli_stmt_bind_result($stmt, $robotName, $gameName, $betAmount, $position);
                          mysqli_stmt_store_result($stmt);
                          if (mysqli_stmt_num_rows($stmt) !== 0) {
                            while (mysqli_stmt_fetch($stmt)) {
                              echo "
                            <tr>
                              <td class='ldt'>" . $robotName . "</td>
                              <td class='ldt'>" . $gameName . "</td>
                              <td class='ldt'>" . $position . "</td>
                              <td class='ldt'>" . $betAmount . "</td>
                            </tr>
                          ";
                            }
                          } else {
                            echo "
                            <tr>
                              <td class='ldt'></td>
                              <td class='ldt'>No Entries</td>
                              <td class='ldt'></td>
                            </tr>
                          ";
                          }
                        } else {
                          echo "Error executing query" . mysqli_error($conn);
                        }
                      } else {
                        echo "Error preparing" . mysqli_error($conn);
                      }
                      ?>
                </table>
            </div>
            <div class="space"></div>
        </div>
        <?php
          include_once "footer.html";
        ?>
    </body>
</html>
        