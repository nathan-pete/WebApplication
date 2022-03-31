<?php
    session_start();
    include "header.php";
    require_once "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style/style.css" type="text/css" rel="stylesheet">
    <title>Feedback</title>
</head>
<body>
    <div class="body">
    
    <div class="main-feed">
        <h1 class="main-content-heading">Feedback</h1>
        <div class="feedback_inputs">
            <form action="<?= htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" >
                <!--1-->
                <p>The event was interesting and entertaining:</p>
                <input type="radio" id="agree" name="event_fel" value="agree" checked="checked">
                <label for="agree">Agree</label>
                <input type="radio" id="disagree" name="event_fel" value="disagree">
                <label for="disagree">Disagree</label>


                <!--2-->
                <div class="future_events">
                <p>Would you like more events like this in the future?</p>
                <input type="radio" id="yes" name="future_eve" value="yes" checked="checked">
                <label for="yes">Yes</label>
                <input type="radio" id="no" name="future_eve" value="no">
                <label for="no">No</label>
                </div>

                <!--3-->
                <div class="role_event">
                <p>You was a viewer or participant?</p>
                <input type="radio" id="viewer" name="role_event" value="viewer">
                <label for="viewer">Viewer</label>
                <input type="radio" id="participant" name="role_event" value="participant">
                <label for="participant">Participant</label>
                </div>

                <!--Event photo-->
                <div class="event_image">
                        <label for="image" class="event-image-text"><b>Do you want to share photos with us?</b></label>
                        <br>
                        <input type="file" name="event_photo">
                </div>
                <div class="additional_message">
                <label for="additional_message" class="event-image-text"><b>Additional message</b></label>
                <input type="text" name="additional_message">
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
        if(isset($_POST['event_fel'])){
            if(isset($_POST['future_eve'])){
                if(isset($_POST['role_event'])){
                    if(!empty($_POST['email'])){
                        $event_fel = $_POST['event_fel'];
                        $future_eve = $_POST['future_eve'];
                        $role_event = $_POST['role_event'];
                        $email = $_POST['email'];
                        //Checking if there is message
                        if(!empty($_POST['additional_message'])){
                            $additional_message = $_POST['additional_message'];
                        }
                        else{
                            $additional_message = "None";
                        }
                        if(!empty($_FILES['event_photo']['tmp_name'])){
                            //Image
                            //Changing name
                            $randomno = rand(0, 100000);
                            $rename = 'Event-Photo' . date('Ymd') . $randomno;
                            $target_dir = "./uploads/event_photos/";
                            $target_file_main = $target_dir . $rename . basename($_FILES["event_photo"]["name"]);
                           // Get file extension
                            $imageExtension = finfo_open(FILEINFO_MIME_TYPE);
                            // Allowed file types
                            $allowd_file_ext = ["image/jpg", "image/jpeg", "image/png", "image/gif"];
                            $MainPhotoType = finfo_file($imageExtension, $_FILES["event_photo"]["tmp_name"]);
                            if (in_array($MainPhotoType, $allowd_file_ext)) {
                                if ($_FILES["event_photo"]["size"] < 3057152) {
                                    if (move_uploaded_file($_FILES["event_photo"]["tmp_name"], $target_file_main)) {
                                        //prepared
                                        $event_photo = $_FILES["event_photo"]["tmp_name"];
                                        $sql = "INSERT INTO feedback (ev_cool_ent, future_eve, viewer_partc, email, `image`, additionalMessage) VALUES (?,?,?,?,?,?)";
                                        $stmt = mysqli_prepare($conn, $sql) OR DIE ("Error inserting into database" . mysqli_error($conn));
                                        //echo mysqli_error($conn);
                                        mysqli_stmt_bind_param($stmt, 'ssssss', $event_fel, $future_eve, $role_event, $email, $event_photo, $additional_message );
                                        mysqli_stmt_execute($stmt) OR DIE ("Errro while putting the product");
                                        echo "<div style='width: 100%; text-align:center; color: #266bf9; font-size: 22px; padding-top: 10px'>Succes!</div>";
                                        mysqli_stmt_close($stmt);
                                        mysqli_close($conn);
                                        echo "<p><a href='index.php'>&lt;&lt; Back to home page</a></p>";
                                        echo $target_file_main;
                                        //die();
                                    }else {
                                        echo '<span style="color:red;text-align:center;font-size:18px;">Error uploading picture</span>';
                                    }
                                }else {
                                    echo '<span style="color:red;text-align:center;font-size:18px;">File is too large. File size should be less than 2 megabytes.</span>';
                                }
                            }else {
                                echo "Invalid file type!";
                            }
                        }

                        //If there is no image
                        else{
                            $sql = "INSERT INTO feedback (ev_cool_ent, future_eve, viewer_partc, email) VALUES (?,?,?,?)";
                            $stmt = mysqli_prepare($conn, $sql) OR DIE ("Error inserting into database" . mysqli_error($conn));
                            //echo mysqli_error($conn);
                            mysqli_stmt_bind_param($stmt, 'ssss', $event_fel, $future_eve, $role_event, $email);
                            mysqli_stmt_execute($stmt) OR DIE ("Errro while putting the product");
                            echo "<div style='width: 100%; text-align:center; color: #266bf9; font-size: 22px; padding-top: 10px'>Succes!</div>";
                            mysqli_stmt_close($stmt);
                            mysqli_close($conn);
                            echo "<p><a href='index.php'>&lt;&lt; Back to home page</a></p>";
                            //die();
                            
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
            else{
                echo "Do you want future events?";
            }

        }
        else{
            echo "Please check agree or disagree!";
        }
    }

?>
</div>
<?php
require 'footer.html'
?>
</body>
</html>