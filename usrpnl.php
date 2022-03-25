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
          <?php
            $userID = 10;

            $query = "
              SELECT profilePic 
              FROM users 
              WHERE userID = ?";
            if ($stmt = mysqli_prepare($conn, $query)) {
              mysqli_stmt_bind_param($stmt, "s", $userID);
              if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_bind_result($stmt, $profilePicture);
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) > 0) {
                  while (mysqli_stmt_fetch($stmt)) {
                  }
                } else {
                  $profilePicture = "defaultpfp.png";
                }

              }
            }

            if (isset($_POST['submit'])) {

              $uploadedFileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES["uploadedFile"]["tmp_name"]);
              $acceptedFileTypes = ["image/jpg", "image/jpeg", "image/png"];


              if (in_array($uploadedFileType, $acceptedFileTypes)) {
                if ($_FILES["uploadedFile"]["size"] > 20000000) {
                  echo "<div class='errormessage-usr'>File can't exceed 2MB</div>";
                } elseif (strlen($_FILES["uploadedFile"]["name"]) >= 20) {
                  echo "<div class='errormessage-usr'>File name can't be longer than 20 chars.</div>";
                } elseif (file_exists("./uploads/profilePictures/" . $_FILES["uploadedFile"]["name"])) {
                  echo "<div class='errormessage-usr'>File already exsists!</div>";
                } elseif (move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], "./uploads/profilePictures/" . $_FILES["uploadedFile"]["name"])) {
                  $sql = "UPDATE `users` SET `profilePic` = ? WHERE userID = ?;";
                  if ($stmt = mysqli_prepare($conn, $sql)) {
                    mysqli_stmt_bind_param($stmt, "si", $_FILES["uploadedFile"]["name"], $userID);
                    if (!mysqli_stmt_execute($stmt)) {
                      $error = "Error executing query" . mysqli_error($conn);
                      die();
                    } else {
                      mysqli_stmt_close($stmt); //close statement
                      mysqli_close($conn); //close connection
                    }
                  }
                } else {
                  echo "<div class='errormessage-usr'>Error somewhere :/</div>";
                }
              } else {
                echo "<div class='errormessage-usr'>Invalid image type!</div>";
              }
            }

          ?>
          <img src="./uploads/profilePictures/<?= $profilePicture ?>" alt="Profile picture" class="usrtweak">
          <div class="space-usr"></div>
          <div class="usr-form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
              <input type="file" name="uploadedFile">
              <div>
                <br>
                <button type="submit" name="submit" value="submit" class="profile-upload">Upload Profile Picture</button>
              </div>
            </form>
          </div>
          <div class="space"></div>
          <h3>Username: &nbsp;<?php echo $userName; ?></h3>
          <br>
        </div>
        <div class="usr-details">
          <p class="user-p"><b>Name:</b>&nbsp;<?php echo $name; ?></p>
          <p class="user-p"><b>E-mail:</b>&nbsp;<?php echo $email; ?></p>
          <p class="user-p"><b>Age Threshold:</b>&nbsp;<?php
              if ($DoB == 1) {
                echo "Above 18";
              } elseif ($DoB == 0) {
                echo "Below 18";
              } else {
                echo "";
              }
            ?></p>
          <p class="user-p"><b>Points:</b>&nbsp;<?php echo $points; ?></p>
        </div>
        <br>
        <div class="usr-buttons">
          <div class="info">
            <p>Edit My Info</p>
          </div>
          <div class="info">
            <p>
              <a href="chngepass.php">Change Password</a>
            </p>
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
