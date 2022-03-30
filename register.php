<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
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
      font-weight: 500;
      font-size: 15px;
    }
  </style>
</head>
<body>
<div class="body">
  <?php
    include_once "header.php";
  ?>
  <div class="registerContainer">
    <div class="registerBox">
      <div>
        <h1>Register User</h1>
        <form method="POST" autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div>
            <label for="userName">Username</label><br>
            <input type="text" name="userName" class="input">
          </div>
          <div>
            <label for='firstName'>First name</label><br>
            <input type="text" name="firstName" class="input">
          </div>
          <div>
            <label for='lastName'>Last name</label><br>
            <input type="text" name="lastName" class="input">
          </div>
          <div>
            <label for="dOb">Date of Birth</label><br>
            <input type="date" name="dOb" value="" class="input">
          </div>
          <div>
            <label for='email'>Email</label><br>
            <input type="text" name="email" class="input">
          </div>
          <div>
            <label for='password'>Password</label><br>
            <input type="password" name="password" class="input">
          </div>
          <div>
            <label for='confirmPassword'>Confirm Password</label><br>
            <input type="password" name="confirmPassword" class="input">
          </div>
          <br>
          <div class="reg-bttn">
            <input type="submit" name="register" value="Register!" class="input-bttn">
          </div>
          <br>
        </form>
        <?php
          include "connect.php";
          if (isset($_POST['register'])) {
            if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmPassword']) && !empty($_POST['dOb']) && !empty($_POST['userName'])) { //check if all fields are filled
              if (strlen(trim($_POST['userName'])) < 30) {
                $date = date('Y/m/d');
                $dateOfBirth = $_POST['dOb'];
                $age = date_diff(date_create($dateOfBirth), date_create($date));
                $ageCalc = $age->format('%y');
                if ($_POST['dOb'] > $date or $ageCalc >= '10') {
                  if ($_POST['password'] == $_POST['confirmPassword']) { //check if the entered passwords are the same
                    if (strlen(trim($_POST['password'])) > 6) { //check if the password is longer than 6 char.
                      $email = $_POST["email"];
                      if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //validate the email format
                        $sql = "SELECT email FROM users WHERE email = ?"; //query to search if email already exists
                        if ($stmt = mysqli_prepare($conn, $sql)) {
                          mysqli_stmt_bind_param($stmt, "s", $_POST['email']);
                          if (mysqli_stmt_execute($stmt)) {
                            mysqli_stmt_store_result($stmt);
                            if (mysqli_stmt_num_rows($stmt) == 0) {
                              mysqli_stmt_close($stmt); //close statement
                              $emailHandle = substr(($email), strpos(($email), "@") + 1); //get the email handle
                              if (str_contains($emailHandle, "administrator")) {
                                $status = "administrator";
                              } else {
                                $status = "user";
                              }
                              $userName = $_POST["userName"];
                              $firstName = $_POST['firstName'];
                              $lastName = $_POST['lastName'];
                              if ($ageCalc >= '18') {
                                $dateOfBirth = TRUE;
                              } else {
                                $dateOfBirth = FALSE;
                              }
                              $points = 500;
                              $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //hash password
                              $sql = "INSERT INTO users (userName, email, points, firstName, lastName, DoB, password, status) VALUES (?,?,?,?,?,?,?,?)"; //the query for inserting into the database
                              if ($stmt = mysqli_prepare($conn, $sql)) {
                                mysqli_stmt_bind_param($stmt, "ssississ", $userName, $email, $points, $firstName, $lastName, $dateOfBirth, $password, $status); //bind values to parameters
                                if (mysqli_stmt_execute($stmt)) {
                                  mysqli_stmt_close($stmt); //close statement
                                  mysqli_close($conn); //close connection
                                  echo "<div class='successmessage'>You successfully registered!</div>";
                                } else {
                                  echo "<div class='errormessage'>Error: " . mysqli_error($conn) . "</div>";
                                  die();
                                }
                              } else {
                                echo "<div class='errormessage'>Error: " . mysqli_error($conn) . "</div>";
                                die();
                              }
                            } else {
                              echo "<div class='errormessage'>Email already exists!</div>";
                            }
                          } else {
                            echo "<div class='errormessage'>Error executing query" . mysqli_error($conn) . "</div>";
                            die();
                          }
                        } else {
                          echo "<div class='errormessage'>Error executing query" . mysqli_error($conn) . "</div>";
                          die();
                        }
                      } else {
                        echo "<div class='errormessage'>Invalid email!</div>";
                      }
                    } else {
                      echo "<div class='errormessage'>Password must be longer than 6 characters!</div>";
                    }
                  } else {
                    echo "<div class='errormessage'>Passwords don't match!</div>";
                  }
                } else {
                  echo "<div class='errormessage'>You must be older than 10 years old to register!</div>";
                }
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
