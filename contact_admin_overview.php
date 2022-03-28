<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style/style.css" type="text/css" rel="stylesheet">
    <title>Contact Overview</title>
</head>
<body>
    <div class="body">
        <?php
            require("header.php");
            require "connect.php";
            session_start();
        ?>
        <?php
            
            
            $sql = "SELECT * FROM contact_admin";
            $stmt = mysqli_prepare($conn, $sql) OR DIE ("Preparation Error" . mysqli_error($conn));
            mysqli_stmt_execute($stmt) OR DIE ("Error getting data");
            //retrieving info
            //think about changing it
            $result = $stmt->get_result();
            
        ?>
        <h1 class="contact-overview-heading">Contact Overview</h1>
        
        <table id="table">
            <tr>
                <th>Id</th>
                <th>Role</th>
                <th>Message</th>
                <th>Image</th>
                <th>Email</th>
                <th>Delete</th>
            </tr>
            <?php
                while ($row = mysqli_fetch_array($result)) 
                {
                    echo "<tr>";
                    echo "<td>".$row['IDContact']."</td>";
                    echo "<td>".$row['viewer_partc']."</td>";
                    echo "<td>".$row['Message']."</td>";
                    echo "<td>".$row['image_problem']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>" . '<a href="delete_contact.php?IDContact=' . $row['IDContact'] . '">Delete</a>' . "</td>";
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