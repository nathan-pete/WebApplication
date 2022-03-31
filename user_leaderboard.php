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
    <title>Document</title>
</head>
<body>
    <div class="body">
        <?php
            include "header.php";
            require_once "connect.php";
   
        ?>
        <h2>Leaderboard</h2>
            <table>
            <tr>
                <td>Ranking</td>
                <td>UserName</td>
                <td>Marks</td>
            </tr>
        <?php
            $result = mysqli_query($conn, "SELECT userName, 
            points FROM users ORDER BY points DESC");
              
            /* First rank 1 */
            $ranking = 1;
              
            /* Fetch Rows from the SQL query */
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_array($result)) {
                    //Making tables for Points
                    echo '<tr>';
                    echo "<td>{$ranking}</td>
                    <td>{$row['userName']}</td>
                    <td>{$row['points']}</td>";
                    echo '</tr>';
                    $ranking++;
                    
                }
            }
        ?>
        </table>
    </div>
    <?php
        require 'footer.html'
    ?>
     
</body>
</html>