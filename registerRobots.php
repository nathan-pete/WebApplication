<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="./style/style.css">
      <title>Register users</title>
      <style>
          form .input {
              display: flex;
              justify-content: center;
              align-items: center;
    
          }
      </style>
    </head>
    <body>
        <div class="body">
          <?php
            include_once "header.php";
          ?>
          <div class="registerContent">
            <div class="registerBox">
              <div>
                <h1>Register Robot</h1>
                <form method="POST" autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <div>
                    <label for="robotName">Robot name</label><br>
                    <input type="text" name="robotName" class="input">
                  </div>
                  <div>
                    <label for='serialNum'>Serial number</label><br>
                    <input type="text" name="serialNum" class="input">
                  </div>
                  <div>
                    <label for='teamName'>Team name</label><br>
                    <input type="text" name="teamName" class="input">
                  </div>
                  <div>
                    <label for='password'>Password</label><br>
                    <input type="password" name="password" class="input">
                  </div>
                  <div>
                    <label for='confirmPassword'>Confirm Password</label><br>
                    <input type="password" name="confirmPassword" class="input">
                  </div>
                  <div class="reg-bttn">
                    <input type="submit" name="register" value="Create account" class="input-bttn">
                  </div>
                </form>
                <?php
                  include "connect.php";
                  if (isset($_POST['register'])) {
                    if (!empty($_POST['robotName']) && !empty($_POST['serialNum']) && !empty($_POST['teamName']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])) { //check if all fields are filled
                      if (strlen(trim($_POST['robotName'])) < 30) {
                      } else {
                        echo "<div class='errormessage'>Username can't be longer than 30 characters!</div>";
                      }
                    } else {
                      echo "<div class='errormessage'>Please fill in all fields!</div>";
                    }
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
        <?php
          include_once "footer.html";
        ?>
    </body>
</html>
