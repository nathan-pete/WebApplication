<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./style/style.css" type="text/css" rel="stylesheet">
  <title>Login</title>
</head>
<body>
<?php
  require("header.php");
  require "connect.php";
?>
<?php
  // Starting session

  // Checking if user is logged it
  if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
    header("location: index.php");
    exit;
  }
?>
<div class="main-content">
  <h1 class="main-content-heading">Login</h1>
  <div class="space-event"></div>
  <div class="logins">
    <div class="div-robot-login">
      <h1 class="robot-log-heading">I have a Robot</h1>
      <form action="<?= htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        <!--Serial number-->
        <input type="text" name="serialnum_robot" min="1" placeholder="Serial No." class="agestylebox">
        <br>
        <!--Password-->
        <input type="password" placeholder="Enter Password" name="password_robot" id="psw">
        <br>
        <!--Login-->
        <!--<input type="submit" class="registerbtn" name="register" value="Login">-->
        <a class="login-bttn-robot" href="#">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <input type="submit" value="login" name="login_robot_button" class="logins-bttns">
        </a>
        <a class="bttn-fg-pass" href="#">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Forgotten password
        </a>
        <a class="register_new_t" href="url">Register a new Robot</a>


      </form>
    </div>
    <div class="div-viewer-login">
      <h1 class="viewer-log-heading">I am a Viewer</h1>
      <form action="<?= htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        <!--Email-->
        <input type="text" name="email" min="1" placeholder="Email" class="agestylebox">
        <br>
        <!--Password-->
        <input type="password" placeholder="Enter Password" name="password_viewer" id="psw" required>
        <br>
        <!--Login-->
        <!--<input type="submit" class="registerbtn" name="register" value="Login">-->
        <a class="login-bttn-viewer" href="#">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <input type="submit" value="login" name="login_viewer_button" class="logins-bttns">
        </a>
        <a class="bttn-fg-pass" href="#">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Forgotten password
        </a>
        <a class="register_new_t" href="url">Register a new User</a>


      </form>
    </div>
  </div>
</div>
<?php
  //viewer login
  $error = NULL;
  if (isset($_POST['login_viewer_button'])) {
    if (!empty($_POST['email']) && !empty($_POST['password_viewer'])) { // Checks if fields are filled
      if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { //Checks if email is an email
        $email = $_POST['email'];
        $sql = "SELECT userID, userName, `password` FROM users where email = ?"; //query to insert to db
        if ($stmt = mysqli_prepare($conn, $sql)) {
          mysqli_stmt_bind_param($stmt, "s", $email);
          if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id, $usereName, $password_db);
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) != 0) {
              mysqli_stmt_fetch($stmt);
              $viewer_password = $_POST['password_viewer'];
              //using function to verify password
              if (password_verify($viewer_password, $password_db)) {
                $_SESSION ['userId'] = $id;
                $_SESSION ['loggedIn'] = $usereName;
                echo "You are now logged in";
                echo $_SESSION ['loggedIn'], $_SESSION ['userID'];
                // Redirect user to welcome page
                header("location: index.php");

              } else {
                $error = "Wrong password!";
              }
            } else {
              $error = "Wrong Email";
            }

          } else {
            echo "Something went wrong executing statement";
            die(mysqli_error($conn));
          }
        } else {
          die(mysqli_error($conn));
        }
      } else {
        $error = "Email is not valid";
      }
    } else {
      $error = "Fill all the fields";
    }
    if ($error != NULL) { //echo error if the variable has been set
      echo $error;
    }
  }
?>
<?php
  //Robot login
  $error = NULL;
  if (isset($_POST['login_robot_button'])) {
    if (!empty($_POST['serialnum_robot']) && !empty($_POST['password_robot'])) { // Checks if fields are filled
      $serialnum_robot = $_POST['serialnum_robot'];
      $sql = "SELECT robotID, robotName, `password` FROM robots where serialNum = ?"; //query to insert to db
      if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $serialnum_robot);
        if (mysqli_stmt_execute($stmt)) {
          mysqli_stmt_bind_result($stmt, $id, $robotName, $password_db);
          mysqli_stmt_store_result($stmt);
          if (mysqli_stmt_num_rows($stmt) != 0) {
            mysqli_stmt_fetch($stmt);
            $robot_password = $_POST['password_robot'];
            //using function to verify password
            if (password_verify($robot_password, $password_db)) {
              $_SESSION ['userId'] = $id;
              $_SESSION ['loggedIn'] = $robotName;
              echo "You are now logged in";
              echo $_SESSION ['loggedIn'], $_SESSION ['userID'];
              // Redirect user to welcome page
              header("location: index.php");

            } else {
              $error = "Wrong password!";
            }
          } else {
            $error = "Wrong Email";
          }

        } else {
          echo "Something went wrong executing statement";
          die(mysqli_error($conn));
        }
      } else {
        die(mysqli_error($conn));
      }
    } else {
      $error = "Fill all the fields";
    }
  }


?>


</body>
<?php require 'footer.html' ?>

</html>
