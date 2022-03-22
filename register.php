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
                    </div>
                </div>
            </div>
        </div>
        <?php
            include_once "footer.html";
        ?>
    </body>
</html>