<?php
    session_start();

    include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./style/style.css">
  <link rel="icon" href="./assets/PBBwhite.png">

  <link href="http://designify.me/code-snippets/animated-buttons/css/btns.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="submit" name="smile" value = "smile" />
            <input type="submit" name="laugh" value = "laugh"/>
            <input type="submit" name="angry" value = "angry" />
            </form>

            <?php

                        $userID = 1;
                        $query ="SELECT `points` FROM users WHERE userID = ?";
                        if ($stmt = mysqli_prepare($conn, $query)) {
                          mysqli_stmt_bind_param($stmt, "i", $userID);
                          if (mysqli_stmt_execute($stmt)) {
                            $result = mysqli_stmt_get_result($stmt);
                            while ($row = mysqli_fetch_array($result)) {
                              if (isset($_POST['smile']))
                              {
                                $action = 10;
                                if ($row['points'] > $action)
                                {
                                  if ($sql = mysqli_prepare($conn, "UPDATE users SET points = ? WHERE userID = ?"))
                                  {
                                    $newPoints = $row['points'] - $action;
                                    $message = "smile :)";
                                    mysqli_stmt_bind_param($sql, 'ii', $newPoints, $userID);
                                    //echo $userID;
                                    //echo $newPoints;
                                    echo "<form><textarea>$message</textarea></form>";
                                    if (mysqli_stmt_execute($sql))
                                    {
                                      mysqli_stmt_close($sql);
                                    } else {
                                      echo "error" . mysqli_error($conn);
                                    }
                                  } else {
                                    echo "error" . mysqli_error($conn);
                                  }
                                } else {echo "you don't have enough points";}
                              }
                            }
                          }
                        } 

                              
                              
                              if (isset($_POST["submit"])) {
                                $comment = $_POST["comments"];
                                if (!empty($comment)) {
                                      $sql = mysqli_prepare($conn, "INSERT INTO `Comments` (userID, `message`) VALUES (?, ?)");
                                      mysqli_stmt_bind_param($sql, 'is', $userID, $message);
                                    if (mysqli_stmt_execute($sql))
                                    {
                                      mysqli_stmt_close($sql);
                                    } else {
                                      echo "error" . mysqli_error($conn);
                                    }
                                  } else {
                                    echo "error" . mysqli_error($conn);
                                  }
                            }
?>
<form action="#"class="comments_form" method="POST">
        <button type="submit" name="submit" class="comments_button">Add message</button>   
    </form>
    </body>
</html>