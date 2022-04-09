<?php
    require_once "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <div class="body">
   <?php
            
            
        $sql = "SELECT * FROM bets";
        $stmt = mysqli_prepare($conn, $sql) OR DIE ("Preparation Error" . mysqli_error($conn));
        mysqli_stmt_execute($stmt) OR DIE ("Error getting data");
        //retrieving info
        //think about changing it
        $result = mysqli_stmt_get_result($stmt);
    ?>
    <h2>Bets</h2>
        <table>
            <tr>
                <td>UserId</td>
                <td>gameName</td>
                <td>betAmount</td>
                <td>Position</td>
                <td>Check</td>
            </tr>
            <?php
                while ($row = mysqli_fetch_assoc($result)) 
                {   
                    $userID = $row['userId'];
                    $game_name = $row['gameName'];
                    $betAmount = $row['betAmount'];
                    $position = $row['position'];

                
            ?>
                <tr>
                    <td class="td"><?php echo $userID?></td>
                    <td class="td"><?php echo $game_name?></td>
                    <td class="td"><?php echo $betAmount?></td>
                    <td class="td"><?php echo $position?></td>
                    <td class="td"><a href="check_bet.php?userId=<?php echo $row['userId']. "&betAmount=".$row['betAmount'];?>" class="td">Mark bet</td>
                </tr>

        <?php
             }
        ?>                
        </table>
    </div>
</body>
</html>