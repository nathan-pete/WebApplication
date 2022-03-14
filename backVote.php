<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Battle Bot Events</title>
</head>
<body>
    <?php 
            $query = "SELECT * FROM games";
            $result = mysqli_query($conn,$query);

            $count = mysqli_num_rows($result);
    ?>
    <?php 
            while ($game_details = mysqli_fetch_assoc($result) ) { 
                echo $game_details['name'];
    ?>
    <?php
            }
    ?>
</body>
</html>