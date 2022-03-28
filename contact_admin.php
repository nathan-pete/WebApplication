<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style/style.css" type="text/css" rel="stylesheet">
    <title>Contact Admin</title>
</head>
<body>
    <div class="body">
        <?php
            require("header.php");
            require "connect.php";
            session_start();
        ?>
        <div class="main-contact-box">
            <h1 class="main-contact-heading">Contact with our Admin for support</h1>
            <div class="feedback_inputs">
                <form action="<?= htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" >
                    <h2 class="form-heading-contact">Please share with us your questions<span class="slash-heading">/</span>problems</h2>


                   

                    <!--1-->
                    <p class="intr_quest">Let's start with your role in the event:</p>
                    <div class="role_event">
                        <p>You was a viewer or participant?</p>
                        <input type="radio" id="viewer" name="role_event" value="viewer">
                        <label for="viewer">Viewer</label>
                        <input type="radio" id="participant" name="role_event" value="participant">
                        <label for="participant">Participant</label>
                    </div>

                    <div class="description_message_div">
                        <label for="description_problem" class="event-image-text"><b>Description of your problem or question</b></label>
                        <input type="text" name="description_problem">
                    </div>
                    <!--Contact photo-->
                    <div class="contact_photo">
                            <label for="image" class="contact-image-text"><b>You can also send us a screenshot of the (statement)</b></label>
                            <br>
                            <input type="file" name="contact_photo">
                    </div>
                    
                    
                    <!--Email-->
                    <div class="email">
                    <label for="email"><b>Your email for future events:</b></label>
                    <input type="text" placeholder="Email" name="email" id="email" >
                    </div>

                    <!--Submit-->
                    <input type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    <?php
        if(isset($_POST['submit'])){
            if(isset($_POST['role_event'])){
                if(!empty($_POST['email'])){ 
                    $role_event = $_POST['role_event'];
                    $email = $_POST['email'];
                    //Checking if there is message
                    if(!empty($_POST['description_problem'])){
                        $description_problem = $_POST['description_problem'];
                        if(!empty($_FILES['contact_photo']['tmp_name'])){
                            //Image
                            //Changing name
                            $randomno = rand(0, 100000);
                            $rename = 'Contact-Photo' . date('Ymd') . $randomno;
                            $target_dir = "./uploads/admin_contact_photos/";
                            $target_file_main = $target_dir . $rename . basename($_FILES["contact_photo"]["name"]);
                            // Get file extension
                            $imageExtension = finfo_open(FILEINFO_MIME_TYPE);
                            // Allowed file types
                            $allowd_file_ext = ["image/jpg", "image/jpeg", "image/png", "image/gif"];
                            $MainPhotoType = finfo_file($imageExtension, $_FILES["contact_photo"]["tmp_name"]);
                            if (in_array($MainPhotoType, $allowd_file_ext)) {
                                if ($_FILES["contact_photo"]["size"] < 3057152) {
                                    if (move_uploaded_file($_FILES["contact_photo"]["tmp_name"], $target_file_main)) {
                                        //prepared
                                        $contact_photo = $_FILES["contact_photo"]["tmp_name"];
                                        $sql = "INSERT INTO contact_admin (viewer_partc, `Message`, `image_problem`, email) VALUES (?,?,?,?)";
                                        $stmt = mysqli_prepare($conn, $sql) OR DIE ("Error inserting into database" . mysqli_error($conn));
                                        echo mysqli_error($conn);
                                        mysqli_stmt_bind_param($stmt, 'ssss', $role_event, $description_problem, $contact_photo, $email);
                                        mysqli_stmt_execute($stmt) OR DIE ("Errro while submitting your request");
                                        echo "<div style='width: 100%; text-align:center; color: #266bf9; font-size: 22px; padding-top: 10px'>Succes!</div>";
                                        mysqli_stmt_close($stmt);
                                        mysqli_close($conn);
                                        echo "<p><a href='index.php'>&lt;&lt; Back to home page</a></p>";
                                        echo $target_file_main;
                                        die();
                                    }else{
                                        echo '<span style="color:red;text-align:center;font-size:18px;">Error uploading picture</span>';
                                    }
                                }else{
                                    echo '<span style="color:red;text-align:center;font-size:18px;">File is too large. File size should be less than 2 megabytes.</span>';
                                }
                            }else{
                                echo "Invalid file type!";
                            }
                        }
    
                        //If there is no image
                        else{
                            $sql = "INSERT INTO contact_admin (viewer_partc, `Message`, email) VALUES (?,?,?)";
                            $stmt = mysqli_prepare($conn, $sql) OR DIE ("Error inserting into database" . mysqli_error($conn));
                            echo mysqli_error($conn);
                            mysqli_stmt_bind_param($stmt, 'sss', $role_event, $description_problem, $email);
                            mysqli_stmt_execute($stmt) OR DIE ("Error inserting into database");
                            echo "<div style='width: 100%; text-align:center; color: #266bf9; font-size: 22px; padding-top: 10px'>Succes!</div>";
                            mysqli_stmt_close($stmt);
                            mysqli_close($conn);
                            echo "<p><a href='index.php'>&lt;&lt; Back to home page</a></p>";
                            die();         
                        }
                    }
                    else{
                        echo "The message cannot be empty!";
                    }

                    
                   
                }
                else{
                    echo "Please enter your email";
                }
            }
            else{
                echo "Please select your role!";
            }
                
        }

    ?>









    </div>
<?php
require 'footer.html'
?>
</body>
</html>