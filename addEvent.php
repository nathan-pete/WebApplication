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
                                if ($_FILES['image']['size']<2500000) {
                                    if (strlen($_FILES['image']['name']) <= 35) {
                                        if (in_array($uploadedFileType, $acceptedFileTypes)) {
                                            $fileinfo = getimagesize($_FILES["image"]["tmp_name"]);
                                            $width = $fileinfo[0];
                                            $height = $fileinfo[1];
                                            if ($width < 500 && $height < 500) {
                                                if (!file_exists("./uploads/games/" . $_FILES['image']['name'])) {
                                                    if (move_uploaded_file($_FILES['image']['tmp_name'], "./uploads/games/" . $_FILES['image']['name'])) {
                                                        $name = $_POST['name'];
                                                        $desc = $_POST['desc'];
                                                        $img = $_FILES['image']['name'];
                                                        $sql = "INSERT INTO games (name, Descrption, picture) VALUES (?,?,?)";
                                                        if ($stmt = mysqli_prepare($conn, $sql)) {
                                                            mysqli_stmt_bind_param($stmt, "sss", $name, $desc, $img);
                                                            if (!mysqli_stmt_execute($stmt)) {
                                                                echo "Error executing query" . mysqli_error($conn);
                                                                die(); //die if we cant execute statement
                                                            }else {
                                                                echo "Event created successfully";
                                                            }
                                                        }else {
                                                            echo "Error executing query" . mysqli_error($conn);
                                                            die(); //die if we cant execute statement
                                                        }
                                                    }else {
                                                        echo "Something went wrong, please try again";
                                                    }
                                                }else {
                                                    echo "<br><p>" . $_FILES['image']['name'] . " already exists.</p>";
                                                }
                                            }else {
                                                echo "Image dimensions can't exceed 500x500!";
                                            }
                                        }else {
                                            echo "Invalid image type! Only png, jpeg and jpg are permitted.";
                                        }
                                    }else {
                                        echo "File name must not exceed 35 Characters.";
                                    }
                                }else {
                                    echo "Image should not exceed 3MB.";
                                }
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