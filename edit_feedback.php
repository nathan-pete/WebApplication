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
        require("header.php");
    ?>

<?php
            $ID = $_GET['IDFeedback'];
            $event_feeling = $_GET['ev_cool_ent'];
            $future_eve = $_GET['future_eve'];
            $role_user = $_GET['viewer_partc'];
            $get_email = $_GET['email'];
            



            //Filtering the input
            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            {
            $post_event_feeling = filter_input(INPUT_POST, 'first_name');
            $post_last_name = filter_input(INPUT_POST, 'last_name');
            $post_username = filter_input(INPUT_POST,'username');
            $post_email = filter_input(INPUT_POST,'email');

            













            //preparating and updating the database
            //pprep
            //$sql = "UPDATE feedback SET `ev_cool_ent`=?, `future_eve`=?, `viewer_partc`=?, `email`=? WHERE `IDFeedback`=?";
            //$stmt = mysqli_prepare($conn, $sql) OR DIE ("Preparation Error1" .mysqli_error($conn));
            //mysqli_stmt_bind_param($stmt, 'ssssi', $post_first_name, $post_last_name, $post_username, $post_email, $ID);
            //mysqli_stmt_execute($stmt) OR DIE ("Submission Error");
            //echo "<div style='width: 100%; text-align:center; color: #266bf9; font-size: 30px; padding-top: 25px'>Customer updated!</div>";
            //$result = $stmt->get_result();
            //mysqli_stmt_close($stmt);
            //echo "<p><a href='customers-overview.php'>&lt;&lt; See customers</a></p>";
            //}
       
        ?>



    
        <br>
        <div class="main-content">
            <h1>Edit feedback</h1>
            <form method="POST">

                <!--First Name
                <label for="firstname"><b>The event was interesting and entertaining:</b></label>
                <input type="text" name="first_name" id="firstname" value="<?php echo $event_feeling; ?>">
                -->
                <input type="radio" id="agree" name="event_fel" value="agree" checked="<?php if ($event_feeling == 'agree'){ echo 'checked'; } ?>">
                <label for="agree">Agree</label>
                <?php
                echo $event_feeling;
                ?>
                <input type="radio" id="disagree" name="event_fel" value="disagree" checked="<?php if ($event_feeling == 'disagree'){ echo 'checked'; } ?>">
                <label for="disagree">Disagree</label>


                <!--Last Name-->
                <label for="lastname"><b>Would you like more events like this in the future?</b></label>
                <input type="text" name="last_name" id="lastname" value="<?php echo $future_eve; ?>">

                <!--Username-->
                <label for="username"><b>You was a viewer or participant?</b></label>
                <input type="text" name="username" id="username" value="<?php echo $role_user; ?>">

                <!--Email-->
                <label for="email"><b>Email</b></label>
                <input type="text" name="email" value="<?php echo $get_email; ?>">
                
                
                <!--Submit-->
                <input type="submit" class="registerbtn" name="placed" value="Place">
            </form>
        </div>
       





    <?php
        require("footer.html");
    ?>
</body>
</html>