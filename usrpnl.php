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
      </style>";
  ?>
</head>
<body>
<div class="body">
  <?php
    include_once "header.php";
    require_once "./Utils/userDB.php";
    $name = $firstName . "&nbsp;" . $lastName;
  ?>
  <div class="user-title">
    <h1 style="font-weight: 700; pointer-events: none;">Welcome <?php echo $firstName; ?>!</h1>
  </div>
  <div class="user-content">
    <div class="user-items">
      <div class="user-text">
        <div class="user-pfp">
          <br>
          <div class="usrtweak">
            <img src="./uploads/profilePictures/<?= $pfp ?>" alt="Profile picture">
          </div>
          <h3>Username: &nbsp;<?php echo $userName; ?></h3>
          <br>
        </div>
        <div class="usr-details">
          <p class="user-p"><b>Name:</b>&nbsp;<?php echo $name; ?></p>
          <p class="user-p"><b>E-mail:</b>&nbsp;<<?php echo $email; ?>/p>
          <p class="user-p"><b>Date of Birth:</b>&nbsp;<?php echo $DoB; ?></p>
          <p class="user-p"><b>Points:</b>&nbsp;<?php echo $points; ?></p>
        </div>
        <br>
        <div class="usr-buttons">
          <div class="info">
            <p>Edit My Info</p>
          </div>
          <div class="info">
            <p>Change Password</p>
          </div>
          <div class="delete-profile">
            <p>Delete My Profile</p>
          </div>
        </div>
        <div class="space"></div>
      </div>
    </div>
    <div class="space"></div>
  </div>
</div>
<div class="space"></div>
<?php
  include_once "footer.html";
?>
</body>
</html>
