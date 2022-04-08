<?php
    session_start();
    require "connect.php";
    include "Sidebar.php";
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
    <style>
            
    </style>
</head>
<body>
    <div class="streamContainer">
        <div class="body">
    <?php
            
            
            $sql = "SELECT * FROM feedback";
            $stmt = mysqli_prepare($conn, $sql) OR DIE ("Preparation Error" . mysqli_error($conn));
            mysqli_stmt_execute($stmt) OR DIE ("Error getting data");
            //retrieving info
            //think about changing it
            $result = $stmt->get_result();
        ?>
        <h1 class="Titlepanel">Feedback Overview</h1>
        <div class="contrainerusersrobot">
        <table class="table">
            <tr>
                <th class="td">Id</th>
                <th class="td">Impression</th>
                <th class="td">Future events</th>
                <th class="td">Role</th>
                <th class="td">Email</th>
                <th class="td">Image</th>
                <th class="td">Delete Feedback</th>
            </tr>
            <?php
                while ($row = mysqli_fetch_array($result)) 
                {
                   $idf = $row['IDFeedback'];
                   $ev =$row['ev_cool_ent'];
                   $feve = $row['future_eve'];
                   $view =$row['viewer_partc'];
                   $email =$row['email'];
                   $img =$row['image'];
                
            ?>
                                <td class="td"><?php echo $idf ?></td>
                                <td class="td"><?php echo $ev ?></td>
                                <td class="td"><?php echo $feve ?></td>
                                <td class="td"><?php echo $view ?></td>
                                <td class="td"><?php echo $email ?></td>
                                <td class="td"><?php echo $img ?></td>
                                <td class="td"><a href="feedback.php?IDFeedback=<?php echo $row['IDFeedback']; ?>" class="td">Delete</a></td>
        </table>
        </div>
        </div>
             <?php   
            } 
            ?>
        <?php
             //selects Id from feedback and deletes it
           include 'connect.php';
           if (isset($_GET['IDFeedback'])) {
               $idf = $_GET['IDFeedback'];
               $query = "DELETE FROM `feedback` WHERE IDFeedback = '$idf'";
               $run = mysqli_query($conn, $query);
               if ($run) {
                   header('location:feedback.php');
               } else {
                   echo "Error: " . mysqli_error($conn);
               }
           }
           ?> 
    </div>
</div>
</body>
</html>
