<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./style/style.css">
        <title>Prediction</title>
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
            <div class="bettingContainer">
                <div class="bettingBox">
                    <h1>Make a prediction</h1><br>
                    <form method="POST" autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                      <?php
                        include "connect.php";
                        if (isset($_POST['picture'])) {
                          $startIndex = $_POST["name"];
                        } else {
                          $startIndex = "";
                        }
                        
                        //pull from db into drop down all robot names
                        echo "<p><label for='name'>Robot Name</label></p>";
                        echo "<select name='name' value='Robot Name'>";
                        echo "<option selected></option>";
                        $sql = "SELECT robotName FROM robots";
                        if ($stmt = mysqli_prepare($conn, $sql)) { //database parses, compiles, and performs query optimization and stores w/o executing
                          if (mysqli_stmt_execute($stmt)) { //execute the statement
                            $result =  mysqli_stmt_get_result($stmt); //get result
                            foreach ($result as $row){
                              echo "<option value='$row[robotName]' "; if($startIndex == $row["robotName"]) {echo "selected";}; echo ">$row[robotName]</option>";
                              /* Option values are added by looping through the array */
                            }
                            mysqli_stmt_close($stmt);
                          } else {
                            echo "Error executing: " . mysqli_error($conn);
                            mysqli_close($conn);
                          }
                        } else {
                          echo "Error preparing: " . mysqli_error($conn);
                          mysqli_close($conn);
                          
                        }
                        echo "</select>";
                        
                        echo "<p><input type='submit' name='picture' value='Picture of the robot' class='input-bttn'></p>";
                        if (isset($_POST['picture'])) {
                          //if a certain robot name is selected show it's picture
                          $sql = "SELECT robotPicture FROM robots WHERE robotName = ?";
                          if ($stmt = mysqli_prepare($conn, $sql)) {
                            $robotName = $_POST['name'];
                            mysqli_stmt_bind_param($stmt, "s", $robotName);
                            if (mysqli_stmt_execute($stmt)) {
                              mysqli_stmt_bind_result($stmt, $result);
                              mysqli_stmt_store_result($stmt);
                              while (mysqli_stmt_fetch($stmt)) {
                                if ($result == NULL) {
                                  echo "<div class='betmsg'>Sorry, this robot has no available pictures.</div><div class='space-event'></div><br>";
                                } else {
                                  echo "<p><img src='./uploads/robots/" . $result . "' alt='Picture of the robot'></p>";
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
                        }
                      ?>
                        <p><label for="place">Final position</label></p>
                        <p><input type="number" name="place"></p>
                      <?php
                        // pull from db into drop down all game names
                        echo "<p><label for='game'>Game Name</label></p>";
                        echo "<select name='game' value='Game Name'>";
                        echo "<option selected></option>";
                        $sql = "SELECT name FROM games";
                        if ($stmt = mysqli_prepare($conn, $sql)) { //database parses, compiles, and performs query optimization and stores w/o executing
                          if (mysqli_stmt_execute($stmt)) { //execute the statement
                            $result =  mysqli_stmt_get_result($stmt); //get result
                            foreach ($result as $row){
                              echo "<option value=$row[name]>$row[name]</option>";
                              /* Option values are added by looping through the array */
                            }
                          } else {
                            echo "Error executing" . mysqli_error($conn);
                            mysqli_close($conn);
                          }
                        } else {
                          echo "Error preparing" . mysqli_error($conn);
                          mysqli_close($conn);
                        }
                        echo "</select>";
                        mysqli_stmt_close($stmt);
                        echo "<p><input type='submit' name='bet' value='Place Bet' class='input-bttn'></p>";
                        if (isset($_POST['bet'])) {
                          if (!empty($_POST['name']) && !empty($_POST['game']) && !empty($_POST['place'])) {
                            $id = $_SESSION['user_Id'];
                            $robotName = $_POST['name'];
                            $gameName = $_POST['game'];
                            $place = $_POST['place'];
                            $sql = "INSERT INTO bets (userID, robotName, gameName, position) VALUES (?,?,?,?)";
                            if ($stmt = mysqli_prepare($conn, $sql)) {
                              mysqli_stmt_bind_param($stmt, "issi", $id, $robotName, $gameName, $place);
                              if (mysqli_stmt_execute($stmt)) {
                                mysqli_stmt_close($stmt); //close statement
                                mysqli_close($conn);
                                echo "Your prediction is placed!";
                              } else {
                                echo "Error preparing: " . mysqli_error($conn);
                                mysqli_close($conn);
                              }
                            } else {
                              echo "Error preparing: " . mysqli_error($conn);
                              mysqli_close($conn);
                            }
                          } else {
                            echo "Please fill in all the fields!";
                          }
                        }
                      ?>
                    </form>
                </div>
            </div>
        </div>
        <?php
          include_once "footer.html";
        ?>
    </body>
</html>