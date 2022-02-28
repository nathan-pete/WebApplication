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
    include_once "header.html";
  ?>
  <div class="user-title">
    <h1 style="font-weight: 700; pointer-events: none;">Welcome User!</h1>
  </div>
  <div class="user-content">
    <div class="user-items">
      <div class="user-text">
        <div class="user-pfp">
          <br>
          <img src="./assets/defaultpfp.png" class="usrtweak" alt="Profile Picture">
          <h3>Points: 42069</h3>
          <br>
        </div>
        <div class="usr-details">
          <p class="user-p">Username:</p>
          <p class="user-p">First Name:</p>
          <p class="user-p">Last Name:</p>
          <p class="user-p">E-mail:</p>
          <p class="user-p">Date of Birth:</p>
        </div>
        <br>
        <div class="usr-buttons">
          <div class="edit-info">
            <p>Edit My Info</p>
          </div>
          <div class="delete-profile">
            <p>Delete My Profile</p>
          </div>
        </div>
      </div>
    </div>
    <div class="space"></div>
  </div>
</div>
<br>
<?php
  include_once "footer.html";
?>
</body>
</html>
