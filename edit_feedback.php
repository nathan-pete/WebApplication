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
    <title>Edit Feedback</title>
</head>
<body>

<?php
            $ID = $_GET['IDFeedback'];
            $event_feeling = $_GET['ev_cool_ent'];
            $future_eve = $_GET['future_eve'];
            $role_user = $_GET['viewer_partc'];
            $get_email = $_GET['email'];
       
        ?>



    
        <br>
        <div class="main-content">
            <h1>Edit feedback</h1>
            <form method="POST">
                 <!--Event feeling-->
                <label for="event_feeling"><b>The event was interesting and entertaining:</b></label>
                <input type="text" name="post_event_fel" id="event_feeling" value="<?php echo $event_feeling; ?>">
                <br>

                <!--<input type="radio" id="agree" name="post_event_fel" value="agree" checked=" //if ($event_feeling == 'agree'){ echo 'checked'; }?>">
                <label for="agree">Agree</label>
                <input type="radio" id="disagree" name="post_event_fel" value="disagree" checked=" if ($event_feeling == 'disagree'){ echo 'checked'; } ?>">
                <label for="disagree">Disagree</label>
                -->


                <!--Future Events-->
                <label for="lastname"><b>Would you like more events like this in the future?</b></label>
                <input type="text" name="post_future_ev" id="lastname" value="<?php echo $future_eve; ?>">
                <br>
                <!--Role-->
                <label for="username"><b>You was a viewer or participant?</b></label>
                <input type="text" name="post_role" id="username" value="<?php echo $role_user; ?>">

                <!--Email-->
                <label for="email"><b>Email</b></label>
                <input type="text" name="post_email" value="<?php echo $get_email; ?>">                
                
                <!--Submit-->
                <input type="submit" class="registerbtn" name="placed" value="Update">
            </form>
        </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $post_event_feeling = $_POST['post_event_fel'];
            $post_future_ev = $_POST['post_future_ev'];
            $post_role = $_POST['post_role'];
            $post_email = $_POST['post_email'];
            $sql = "UPDATE feedback SET `ev_cool_ent`=?, `future_eve`=?, `viewer_partc`=?, `email`=? WHERE `IDFeedback`=?";
            $stmt = mysqli_prepare($conn, $sql) OR DIE ("Error inserting into database" . mysqli_error($conn));
            //echo mysqli_error($conn);
            mysqli_stmt_bind_param($stmt, 'ssssi', $post_event_feeling, $post_future_ev, $post_role, $post_email, $ID);
            mysqli_stmt_execute($stmt) OR DIE ("Errror while putting the product");
            echo "<div style='width: 100%; text-align:center; color: #266bf9; font-size: 22px; padding-top: 10px'>Succes!</div>";
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            echo "<p><a href='index.php'>&lt;&lt; Back to home page</a></p>";

            
            
        }


    ?>
       
    <?php
        require("footer.html");
    ?>
</body>
</html>