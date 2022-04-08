<?php
    include "SideBar.php";
    require_once "connect.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style/style.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="liveleaderboard.js"></script>
    <title>LeaderBoard</title>
</head>
<body>
        <?php 
            
            
            $sql = "SELECT * FROM robots";
            $stmt = mysqli_prepare($conn, $sql) OR DIE ("Preparation Error" . mysqli_error($conn));
            mysqli_stmt_execute($stmt) OR DIE ("Error getting data");
            //retrieving info
            //think about changing it
            //$result = $stmt->get_result();
            $result = mysqli_stmt_get_result($stmt);
        ?>
        <h1 class="Titlepanel">LeaderBoard Panel</h1>
        <div class="streamContainer">
        <div class="body">
        <table class="table">
            <tr class="userpanelspace">
                <td class="td"> Robot Name </td>
                <td class="td"> Serial Number </td>
                <td class="td"> Points</td>
                <td class="td"> Edit Points</td>
                <td class="td">Delete</td>
            </tr>
            <?php
                 while ($row = mysqli_fetch_assoc($result)) {
                    $robotname = $row['robotName'];
                    $serielnum = $row['serialNum'];
                    $points = $row['points'];
                    $mac = $row['mac'];
            ?>
                <tr>
                    <td class="td"><?php echo $robotname ?></td>
                    <td class="td"><?php echo $serielnum ?></td>
                    <td class="td"><?php echo $points ?></td>
                    <td class="td"><a href="updatePoints.php" class="td">Edit</a></td>
                    <td class="td"><a href="Robotpanel.php?mac=<?php echo $row['mac']; ?>" class="td">Delete</a></td>
                </tr>

        <?php
             }
        ?>                
        </table>
        </div>
        </div>
</body>
</html>
<?php   //selects mac from robots and deletes it
    
        include 'connect.php';
        if ($id = filter_input(INPUT_GET, "mac", FILTER_VALIDATE_INT)) {
            $query = "DELETE FROM `robots` WHERE mac = ?";
            
             $stmt = mysqli_prepare($conn, $query);
             mysqli_stmt_bind_param($stmt, 'i', $id);
              if (mysqli_stmt_execute($stmt)) {
    
                echo "Record deleted successfully";
                header("location: Robotpanel.php");
              }
            else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    ?>
