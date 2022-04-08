<?php
  session_start();
  include "connect.php";
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
      <meta charset="utf-8">
      <link href="./style/style.css" type="text/css" rel="stylesheet">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Project Battle Bots</title>
      <!--Highlight the page the user has open. Home in this case-->
      <?php
        echo "
          <style>
            .header-style .nav .menu .home{
              color: #83c0ff;
            }
            .header-style .nav .menu .home:hover{
              color: #0386FF;
              text-decoration: none;
            }
          </style>
        ";
      ?>
    </head>
    <body>
    <?php
      if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1){
            include('header.php');
      } elseif (isset($_SESSION['robotLoggedIn']) && $_SESSION['robotLoggedIn'] == TRUE) {
            include('headerRobot.php');
      } else {
          include('header.php');
      }
    ?>
    <div class="space-pass"></div>
    <div id="indexContainer">
      <div id="indexCenterGallery">
        <div id="indexCenterTitle">
          <h1>Project <br> Battle Bots</h1>
        </div>
        <div id="indexCenterImage">
          <img src="./assets/PBBblack.png" alt="Battle bot" width="55%">
        </div>
      </div>
      <!--Scroll group title-->
      <div id="indexScrollTitle">
        <h2>Welcome to Project Battle Bots!</h2>
      </div>
      <!--Scroll group-->
      <div class="indexScrollGroup">
        <?php
          //<a href="profilerobot.php?robotName=First"></a>
          $sql = "SELECT robotName, robotPicture FROM robots";
          if ($stmt = mysqli_prepare($conn, $sql)) {
            if (mysqli_stmt_execute($stmt)) {
              mysqli_stmt_bind_result($stmt, $robotName, $robotPicture);
              mysqli_stmt_store_result($stmt);
              while (mysqli_stmt_fetch($stmt)) {
                if ($robotPicture == NULL) {
                  echo '
                    <div class="indexScrollItem">
                      <a href="profilerobot.php?robotName=' . $robotName . '">
                        <h4>' . $robotName . '</h4>
                      </a>
                    </div>';
                } else {
                  echo '
                    <div class="indexScrollItem">
                      <a href="profilerobot.php?robotName=' . $robotName . '">
                        <h4>' . $robotName . '</h4>';
                        echo '<a href="profilerobot.php?robotName=' . $robotName . '">' . '<img src="./uploads/robots/' . $robotPicture . '" alt="Picture of the robot" class="index-img"></a>';
                      echo '</a>
                    </div>';
                }
              }
            } else {
              echo "Error executing" . mysqli_error($conn);
              mysqli_close($conn);
            }
          } else {
            echo "Error preparing: " . mysqli_error($conn);
            mysqli_close($conn);
          }
          mysqli_stmt_close($stmt);
        ?>
      </div>
      <div class="space-indx"></div>
    </div>
    <?php
      include_once "footer.html";
    ?>
    </body>
</html>
