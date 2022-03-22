<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="./style/style.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Add Event</title>
        <?php
        /* if($_SESSION['user_type'] != 'administrator') {
        header("location:./errors&success.php?error=type");
        } */
        ?>
    </head>
    <body>
        <div class="body">
            <?php
                include_once "header.php";
            ?>
            <div class="addEventContainer">
                <div class="addEventBox">
                    <div class="yes">
                        <h1>Add event</h1>
                        <form method="post" autocomplete="off" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                            <div>
                                <label for="name">Event name</label><br>
                                <input type="text" name="name">
                            </div>
                            <div>
                                <label for='desc'>Event description</label><br>
                                <input type="text" name="desc">
                            </div>
                            <div class="eventUpload">
                                <label for='image'>Select image</label><br>
                                <input type="file" name="image">
                            </div>
                            <div>
                                <input type="submit" name="submit" value="Create Event"><br>
                            </div>
                        </form>
                        <?php
                        include "connect.php";
                        if (isset($_POST['submit'])){
                            $acceptedFileTypes = ["image/png", "image/jpeg", "image/jpg"];
                            $uploadedFileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['image']['tmp_name']);
                            if(!empty($_POST['name']) && !empty($_POST['desc']) && !empty($_FILES['image'])) {
                            }else {
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