<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./style/style.css">
        <title>Register users</title>
    </head>
    <body>
        <div class="body">
            <?php
                include_once "header.php";
            ?>
            <div class="registerContent">
                <div class="registerBox">
                    <div>
                        <h1>Register User</h1>
                        <form method="post" autocomplete="off" action="<?php echo $_SERVER['PHP_SELF'];?>">
                            <div>
                                <label for="userName">Username</label><br>
                                <input type="text" name="userName">
                            </div>
                            <div>
                                <label for='firstName'>First name</label><br>
                                <input type="text" name="firstName">
                            </div>
                            <div>
                                <label for='lastName'>Last name</label><br>
                                <input type="text" name="lastName">
                            </div>
                            <div>
                                <label for="dOb">Date of Birth</label><br>
                                <input type="date" name="dOb" value="">
                            </div>
                            <div>
                                <label for='email'>Email</label><br>
                                <input type="text" name="email">
                            </div>
                            <div>
                                <label for='password'>Password</label><br>
                                <input type="password" name="password">
                            </div>
                            <div>
                                <label for='confirmPassword'>Confirm Password</label><br>
                                <input type="password" name="confirmPassword">
                            </div>
                            <div></div>
                            <div>
                                <input type="submit" name="register" value="Create account"><br>
                            </div>
                        </form>
                        <?php
                        include "./Utils/agetest.php";
                        include "connect.php";
                        if (isset($_POST['register'])) {
                            if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmPassword']) && !empty($_POST['dOb']) && !empty($_POST['userName'])) { //check if all fields are filled
                                if(strlen(trim($_POST['userName'])) < 30){
                                    $date = date('Y/m/d H:i:s');
                                    if ($_POST['dOb'] > $date or $ageCalc >='10'){
                                        if ($_POST['password'] == $_POST['confirmPassword']) { //check if the entered passwords are the same
                                            if (strlen(trim($_POST['password'])) > 6) { //check if the password is longer than 6 char.
                                                $email = $_POST["email"];
                                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //validate the email format
                                                    $sql = "SELECT email FROM users WHERE email = ?"; //query to search if email already exists
                                                    if($stmt = mysqli_prepare($conn, $sql)) {
                                                        mysqli_stmt_bind_param($stmt, "s", $_POST['email']);
                                                        if (mysqli_stmt_execute($stmt)) {
                                                            mysqli_stmt_store_result($stmt);
                                                            if (mysqli_stmt_num_rows($stmt) == 0) {
                                                                mysqli_stmt_close($stmt); //close statement
                                                                $userName = $_POST["userName"];
                                                                $firstName = $_POST['firstName'];
                                                                $lastName = $_POST['lastName'];
                                                                $dOb = $_POST['dOb'];
                                                                $points = 500;
                                                                $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //hash password
                                                                $sql = "INSERT INTO users (userName, email, points, firstName, lastName, DoB, password) VALUES (?,?,?,?,?,?,?)"; //the query for inserting into the database
                                                                if ($stmt = mysqli_prepare($conn, $sql)) {
                                                                    mysqli_stmt_bind_param($stmt, "ssissds", $userName, $email, $points, $firstName, $lastName, $dOb, $password); //bind values to parameters
                                                                    if (mysqli_stmt_execute($stmt)) {
                                                                        mysqli_stmt_close($stmt); //close statement
                                                                        mysqli_close($conn); //close connection
                                                                        echo "You successfully registered!";
                                                                    } else {
                                                                        echo "Error: " . mysqli_error($conn);
                                                                        die();
                                                                    }
                                                                } else {
                                                                    echo "Error: " . mysqli_error($conn);
                                                                    die();
                                                                }
                                                            } else {
                                                                echo "Email already exists.";
                                                            }
                                                        } else {
                                                            echo "Error executing query" . mysqli_error($conn);
                                                            die();
                                                        }
                                                    }else {
                                                        echo "Error executing query" . mysqli_error($conn);
                                                        die();
                                                    }
                                                }else {
                                                    echo "Invalid email.";
                                                }
                                            }else {
                                                echo "Password must be longer than 6 characters!";
                                            }
                                        }else{
                                            echo "Passwords don't match!";
                                        }
                                    }else{
                                        echo"You must be older than 10 years old to register!";
                                    }
                                }else{
                                    echo "Username can't be longer than 30 characters!";
                                }
                            }else{
                                echo "Please fill in all fields!";
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