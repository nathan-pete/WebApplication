<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style/style.css" type="text/css" rel="stylesheet">
    <title>Overview</title>
    <!--Will be removed later -->



</head>
<body>
    <div class="body">
    <?php
        require("header.php");
        require "connect.php";
        session_start();
    ?>
    <?php
            
            
        $sql = "SELECT * FROM feedback";
        $stmt = mysqli_prepare($conn, $sql) OR DIE ("Preparation Error" . mysqli_error($conn));
        mysqli_stmt_execute($stmt) OR DIE ("Error getting data");
        //retrieving info
        //think about changing it
        //$result = $stmt->get_result();
        $result = mysqli_stmt_get_result($stmt);
        


    ?>
        <h1 class="feedback-overview-heading">Feedback Overview</h1>
        
        <table id="table">
            <tr>
                <th>Id</th>
                <th>Impression</th>
                <th>Future events</th>
                <th>Role</th>
                <th>Email</th>
                <th>Image</th>
                <th>Edit Feedback</th>
                <th>Delete Feedback</th>
            </tr>
            <?php
                while ($row = mysqli_fetch_array($result)) 
                {
                    echo "<tr>";
                    echo "<td>".$row['IDFeedback']."</td>";
                    echo "<td>".$row['ev_cool_ent']."</td>";
                    echo "<td>".$row['future_eve']."</td>";
                    echo "<td>".$row['viewer_partc']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['image']."</td>";
                    echo "<td>" . '<a href="edit_feedback.php?IDFeedback=' . $row['IDFeedback'] . '&ev_cool_ent=' . $row['ev_cool_ent'] . '&future_eve=' . $row['future_eve'] . '&viewer_partc=' . $row['viewer_partc'] . '&email=' . $row['email'] . '">Edit</a>' . "</td>";
                    echo "<td>" . '<a href="delete_feedback.php?IDFeedback=' . $row['IDFeedback'] . '">Delete</a>' . "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <?php
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        ?>
</div>
<?php
require 'footer.html'
?>
</body>
</html>