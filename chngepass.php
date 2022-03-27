<?php
  require_once "./connect.php";
  $_SESSION["userId"] = 13;
  if (isset($_POST['submit'])) {
    $result = mysqli_query($conn, "SELECT * from users WHERE userId='" . $_SESSION["userId"] . "'");
    $row = mysqli_fetch_array($result);
    //$currpass = password_hash($_POST['currentPassword'], PASSWORD_DEFAULT); //hash password
    $newpass = password_hash($_POST['newPassword'], PASSWORD_DEFAULT); //hash password
    if (password_verify($_POST['currentPassword'], $row["password"])) {
      header("refresh:3; url=./usrpnl.php");
      mysqli_query($conn, "UPDATE users set password='" . $newpass . "' WHERE userId='" . $_SESSION["userId"] . "'");
      $message = "<div class='passmsgsuc'>Password Changed</div>";
    } else {
      $message = "<div class='passmsgfail'>Current Password is not correct</div>";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style/style.css">
  <link rel="icon" href="./assets/PBBwhite.png">
  <title>Change Password</title>
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
  <script>
      function validatePassword() {
          let currentPassword, newPassword, confirmPassword, output = true;

          currentPassword = document.frmChange.currentPassword;
          newPassword = document.frmChange.newPassword;
          confirmPassword = document.frmChange.confirmPassword;

          if (!currentPassword.value) {
              currentPassword.focus();
              document.getElementById("currentPassword").innerHTML = "<h4><br>Current Password Required</h4>";
              output = false;
          } else if (!newPassword.value) {
              newPassword.focus();
              document.getElementById("newPassword").innerHTML = "<h4><br>New Password Required</h4>";
              output = false;
          } else if (newPassword.value != confirmPassword.value) {
              newPassword.value = "";
              confirmPassword.value = "";
              newPassword.focus();
              document.getElementById("confirmPassword").innerHTML = "<h4><br>Passwords do not match</h4>";
              output = false;
          }
          return output;
      }
  </script>
</head>
<body>
<div class="body">
  <?php
    include_once "./header.php";
  ?>
  <br>
  <div class="events-title">
    <h1 style="font-weight: 700; pointer-events: none;">Change Password</h1>
  </div>
  <br>
  <div class="pass-content">
    <div class="user-items">
      <div class="events-text">
        <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
          <div class="passbox">
            <div class="message">
              <?php
                if (isset($message)) {
                  echo "<div class='space-pass'></div>";
                  echo $message;
                }
              ?>
            </div>
            <div class="space-pass"></div>
            <h3>Current Password<span style="color: #ba1616;">*</span></h3>
            <label>
              <input type="password" name="currentPassword" class="passin"><span id="currentPassword" class="required"></span>
            </label>
            <div class="space-pass"></div>
            <h3>New Password<span style="color: #ba1616;">*</span></h3>
            <label>
              <input type="password" name="newPassword" class="passin"><span id="newPassword" class="required"></span>
            </label>
            <div class="space-pass"></div>
            <h3>Confirm Password<span style="color: #ba1616;">*</span></h3>
            <label>
              <input type="password" name="confirmPassword" class="passin"><span id="confirmPassword" class="required"></span>
            </label>
            <br>
            <div class="space-pass"></div>
            <input type="submit" name="submit" value="Submit" class="passbut">
            <div class="space-pass"></div>
            <p class='passmsgfail'><u>*Required</u></p>
            <br>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="space"></div>
<br>
<?php
  include_once "./footer.html";
?>
</body>
</html>