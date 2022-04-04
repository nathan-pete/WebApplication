<?php
    session_start();
    include "SideBar.php";
?>
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
            require_once "connect.php";
        
        ?>
        <?php
            
            
            $sql = "SELECT * FROM contact_admin";
            $stmt = mysqli_prepare($conn, $sql) OR DIE ("Preparation Error" . mysqli_error($conn));
            mysqli_stmt_execute($stmt) OR DIE ("Error getting data");
            //retrieving info
            //think about changing it
            //$result = $stmt->get_result();
            $result = mysqli_stmt_get_result($stmt);
            
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
                while ($row = mysqli_fetch_assoc($result)) 
                {   
                    $idcontact = $row['IDContact'];
                    $role = $row['viewer_partc'];
                    $message = $row['Message'];
                    $image_problem = $row['image_problem'];
                    $email = $row['email'];
                    //include "delete_contact.php";

                
            ?>
                <tr>
                    <td class="td"><?php echo $idcontact?></td>
                    <td class="td"><?php echo $role?></td>
                    <td class="td"><?php echo $message?></td>
                    <td class="td"><?php echo $image_problem?></td>
                    <td class="td"><?php echo $email?></td>
                    <td class="td"><a href="contact_admin_overview.php?IDContact=<?php echo $row['IDContact'];?>" class="td">Delete</td>
                </tr>

        <?php
             }
        ?>


                
        </table>
    </div>
</body>
</html>
