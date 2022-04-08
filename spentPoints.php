<?php

  /*
    Send a GET request via form 
  */

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
            <input type="submit" name="love" value = "love" />
            <input type="submit" name="sad" value = "sad" />
            <input type="submit" name="wink" value = "wink" />
            <input type="submit" name="strong" value = "strong" />
            </form>

            <script>
            $(function () {
              setInterval(function () {
                  $.ajax({
                      type: "post",
                      url: "sendRequest.php",
                      success: function (data) {
                          $(".main").html(data);
                          //do something with response data
                      }
                  });
              }, 2000);
            </script>
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
                                    $message = "(❛ ͜ʖ ͡❛)";
                                    
                                    mysqli_stmt_bind_param($sql, 'ii', $newPoints, $userID);
                                    //echo $userID;
                                    //echo $newPoints;
                                    echo "<form action='spentPoints.php' method='POST'>
                                        <textarea name = 'comments' type = 'text'  rows='10' cols='50';>$message</textarea>
                                        <input type='submit' name='submit'>
                                    </form>";
                                    if (mysqli_stmt_execute($sql))
                                    {
                                      mysqli_stmt_close($sql);
                                    } else {
                                      echo "error" . mysqli_error($conn);
                                    }
                                  } else {
                                    echo "error" . mysqli_error($conn);
                                  }
                                } else {echo "you don't have enough points";
                                }
                              }

                              if (isset($_POST['laugh']))
                              {
                                $action = 10;
                                if ($row['points'] > $action)
                                {
                                  if ($sql = mysqli_prepare($conn, "UPDATE users SET points = ? WHERE userID = ?"))
                                  {
                                    $newPoints = $row['points'] - $action;
                                    $message = "( ͡❛ ⏥ ͡❛)";
                                    
                                    mysqli_stmt_bind_param($sql, 'ii', $newPoints, $userID);
                                    //echo $userID;
                                    //echo $newPoints;
                                    echo "<form action='spentPoints.php' method='POST'>
                                        <textarea id='test' name = 'comments' rows='10' cols='50';>$message</textarea>
                                        <input type='submit' name='submit'>
                                    </form>";
                                    if (mysqli_stmt_execute($sql))
                                    {
                                      mysqli_stmt_close($sql);
                                    } else {
                                      echo "error" . mysqli_error($conn);
                                    }
                                  } else {
                                    echo "error" . mysqli_error($conn);
                                  }
                                } else {echo "you don't have enough points";
                                }
                              }
                              
                              if (isset($_POST['angry']))
                              {
                                $action = 10;
                                if ($row['points'] > $action)
                                {
                                  if ($sql = mysqli_prepare($conn, "UPDATE users SET points = ? WHERE userID = ?"))
                                  {
                                    $newPoints = $row['points'] - $action;
                                    $message = "(︡* ⏥*︠)";
                                    
                                    mysqli_stmt_bind_param($sql, 'ii', $newPoints, $userID);
                                    //echo $userID;
                                    //echo $newPoints;
                                    echo "<form action='spentPoints.php' method='POST'>
                                        <textarea id='test' name = 'comments' rows='10' cols='50';>$message</textarea>
                                        <input type='submit' name='submit'>
                                    </form>";
                                    if (mysqli_stmt_execute($sql))
                                    {
                                      mysqli_stmt_close($sql);
                                    } else {
                                      echo "error" . mysqli_error($conn);
                                    }
                                  } else {
                                    echo "error" . mysqli_error($conn);
                                  }
                                } else {echo "you don't have enough points";
                                }
                              }

                              if (isset($_POST['love']))
                              {
                                $action = 10;
                                if ($row['points'] > $action)
                                {
                                  if ($sql = mysqli_prepare($conn, "UPDATE users SET points = ? WHERE userID = ?"))
                                  {
                                    $newPoints = $row['points'] - $action;
                                    $message = "(ɔ◔‿◔)ɔ ♥";
                                    
                                    mysqli_stmt_bind_param($sql, 'ii', $newPoints, $userID);
                                    //echo $userID;
                                    //echo $newPoints;
                                    echo "<form action='spentPoints.php' method='POST'>
                                        <textarea id='test' name = 'comments' rows='10' cols='50';>$message</textarea>
                                        <input type='submit' name='submit'>
                                    </form>";
                                    if (mysqli_stmt_execute($sql))
                                    {
                                      mysqli_stmt_close($sql);
                                    } else {
                                      echo "error" . mysqli_error($conn);
                                    }
                                  } else {
                                    echo "error" . mysqli_error($conn);
                                  }
                                } else {echo "you don't have enough points";
                                }
                              }

                              if (isset($_POST['sad']))
                              {
                                $action = 10;
                                if ($row['points'] > $action)
                                {
                                  if ($sql = mysqli_prepare($conn, "UPDATE users SET points = ? WHERE userID = ?"))
                                  {
                                    $newPoints = $row['points'] - $action;
                                    $message = "( ˘︹˘ )";
                                    
                                    mysqli_stmt_bind_param($sql, 'ii', $newPoints, $userID);
                                    //echo $userID;
                                    //echo $newPoints;
                                    echo "<form action='spentPoints.php' method='POST'>
                                        <textarea id='test' name = 'comments' rows='10' cols='50';>$message</textarea>
                                        <input type='submit' name='submit'>
                                    </form>";
                                    if (mysqli_stmt_execute($sql))
                                    {
                                      mysqli_stmt_close($sql);
                                    } else {
                                      echo "error" . mysqli_error($conn);
                                    }
                                  } else {
                                    echo "error" . mysqli_error($conn);
                                  }
                                } else {echo "you don't have enough points";
                                }
                              }

                              if (isset($_POST['wink']))
                              {
                                $action = 10;
                                if ($row['points'] > $action)
                                {
                                  if ($sql = mysqli_prepare($conn, "UPDATE users SET points = ? WHERE userID = ?"))
                                  {
                                    $newPoints = $row['points'] - $action;
                                    $message = "(>‿◠)✌";
                                    
                                    mysqli_stmt_bind_param($sql, 'ii', $newPoints, $userID);
                                    //echo $userID;
                                    //echo $newPoints;
                                    echo "<form action='spentPoints.php' method='POST'>
                                        <textarea id='test' name = 'comments' rows='10' cols='50';>$message</textarea>
                                        <input type='submit' name='submit'>
                                    </form>";
                                    if (mysqli_stmt_execute($sql))
                                    {
                                      mysqli_stmt_close($sql);
                                    } else {
                                      echo "error" . mysqli_error($conn);
                                    }
                                  } else {
                                    echo "error" . mysqli_error($conn);
                                  }
                                } else {echo "you don't have enough points";
                                }
                              }

                              if (isset($_POST['strong']))
                              {
                                $action = 10;
                                if ($row['points'] > $action)
                                {
                                  if ($sql = mysqli_prepare($conn, "UPDATE users SET points = ? WHERE userID = ?"))
                                  {
                                    $newPoints = $row['points'] - $action;
                                    $message = "(ง︡'-'︠)ง";
                                    
                                    mysqli_stmt_bind_param($sql, 'ii', $newPoints, $userID);
                                    //echo $userID;
                                    //echo $newPoints;
                                    echo "<form action='spentPoints.php' method='POST'>
                                        <textarea id='test' name = 'comments' rows='10' cols='50';>$message</textarea>
                                        <input type='submit' name='submit'>
                                    </form>";
                                    if (mysqli_stmt_execute($sql))
                                    {
                                      mysqli_stmt_close($sql);
                                    } else {
                                      echo "error" . mysqli_error($conn);
                                    }
                                  } else {
                                    echo "error" . mysqli_error($conn);
                                  }
                                } else {echo "you don't have enough points";
                                }
                              }
                            }
                          }
                        }

                              if (isset($_POST["submit"])) {
                                //$smile = $_GET['smile'];
                                //var_dump($_POST);
                                $comment = $_POST["comments"];
                                if (!empty($comment)) {
                                      $sql = mysqli_prepare($conn, "INSERT INTO `Comments` (userID, `message`) VALUES (?, ?)");
                                      mysqli_stmt_bind_param($sql, 'is', $userID, $comment);
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
<form action="<?php $_SERVER['PHP_SELF']; ?>" class="comments_form" method="POST">
    </form>
    </body>
</html>