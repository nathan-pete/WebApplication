<?php
    require_once "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="body">
        <h1 class="check-bet-heading">Check bets</h1>
        <form action="<?= htmlentities($_SERVER['PHP_SELF'])."?userId=".$_GET['userId']."&betAmount=".$_GET['betAmount']; ?>" method="POST" enctype="multipart/form-data" id="feedback_form">
            <div class="check-bet-div">
                    <p>Mark the bet</p>
                    <input type="radio" id="agree" name="marked_bet" value="correct">
                    <label for="agree">Correct</label>
                    <input type="radio" id="disagree" name="marked_bet" value="incorrect">
                    <label for="disagree">Incorrect</label>
            </div>
            <button type="submit" class="submit_feedback_button" name="checked_bet_button">Submit</button>
        </form>
    </div>
    <?php
  
  $user_id = $_GET['userId'];
  $bet_amount = $_GET['betAmount'];
  if(isset($_POST['checked_bet_button'])) {
    if (isset($_POST['marked_bet'])) {
      if ($_POST['marked_bet'] == "correct") {
        echo "The bet is correct";
        $sql = "SELECT points FROM users WHERE userID=?"; //the query for selecting from the database
        if ($stmt = mysqli_prepare($conn, $sql)) { //database parses, compiles, and performs query optimization and stores w/o executing
          mysqli_stmt_bind_param($stmt, "i", $user_id); //bind values to parameters
          if (mysqli_stmt_execute($stmt)) { //execute stmt
            $result = mysqli_stmt_get_result($stmt); //get result
            while ($row = mysqli_fetch_assoc($result)) { //fetch results
              $sql = "UPDATE users SET points = ? WHERE userID = ?";
              $newPoints = $bet_amount * 2;
              $points_2 = $newPoints + $row['points'];
              if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "ii", $points_2, $user_id);
                if (mysqli_stmt_execute($stmt)) {
                  mysqli_stmt_close($stmt); //close statement
                } else {
                  echo "Error: " . mysqli_error($conn);
                  mysqli_close($conn);
                }
              } else {
                echo "Error: " . mysqli_error($conn);
                mysqli_close($conn);
              }
            }
            } else {
              echo "Error: " . mysqli_error($conn);
              mysqli_close($conn);
            }
          } else {
            echo "Error: " . mysqli_error($conn);
            mysqli_close($conn);
          }
        } else {
          echo "Error: " . mysqli_error($conn);
          mysqli_close($conn);
        }
      } else {
        echo "The bet is incorrect";
      }
    } else {
    echo "It is required to check the bet";
  }
  
  ?>
</body>
</html>