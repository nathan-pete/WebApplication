<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./style/style.css">
  <link rel="icon" href="./assets/PBBwhite.png">
  <title>Battle Bot Events</title>
  <?php
    echo "
      <style>
        .header-style .nav .menu .login{
          color: #83c0ff;
        }
        .header-style .nav .menu .login:hover{
          color: #0386FF;
          text-decoration: none;
        }
        .space-delete {
          margin: 17.3%;
        }
      </style>";
  ?>
</head>
<body>
<div class="body">
  <?php
    include_once "./header.php";
    include_once "./Utils/userDB.php";
    include "connect.php";
  ?>
  <div class="space-delete"></div>
  <div class="user-content">
    <div class="user-items">
      <div class="user-text">
        <div class="space"></div>

        <div class="usr-details">
          <div class="space"></div>

          <h3 style="font-weight: 700; pointer-events: none;">Would you like to delete your account <?php echo $firstName; ?>!</h3>
          <h4 style="font-weight: 700; pointer-events: none;"> This is irreversible!</h4>
        </div>
        <br>
        <div class="usr-buttons">
          <div class="delete-profile">
            <form action="delete.php" method="post">
              <input type="submit" name="submit" value="Yes" class="del-sub">
              <?php
                if (isset($_POST['submit'])) {
                  $sql = "DELETE FROM users WHERE userID = ?";
                  $userID = 13;
                  if ($stmt = mysqli_prepare($conn, $sql)) {
                    mysqli_stmt_bind_param($stmt, 'i', $userID);
                    if (mysqli_stmt_execute($stmt)) {
                      session_start();
	                    session_destroy();
                      header ('Location: index.php');

                    } else {
                      echo "Error deleting record: " . mysqli_error($conn);
                    }
                  } else {
                    echo "Error preparing: " . mysqli_error($conn);
                  }
                  mysqli_stmt_close($stmt);
                  mysqli_close($conn);
                }
              ?>

            </form>
          </div>

          <div class="info">
            <a href="usrpnl.php">
              <p>
                No
              </p>
            </a>
          </div>

        </div>
        <div class="space"></div>
      </div>
    </div>
    <div class="space"></div>
  </div>

</div>
<div class="space-delete"></div>

<div class="space-pass"></div>
<?php
  include_once "footer.html";
?>
</body>
</html>
