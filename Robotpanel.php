<?php
include "Sidebar.php";
require_once("connect.php");
$query = "SELECT * FROM `robots`";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <title>View All Data</title>
</head>

<div class="streamContainer">
        <div class="body">
    <h1 class="Titlepanel">Robot Panel</h1>
    <div class="containerusersrobot"> 
        
                    <table class="table">
                        <tr class="userpanelspace">
                            <td class="td"> Robot Name </td>
                            <td class="td"> Serial Number </td>
                            <td class="td"> Robot Picture </td>
                            <td class="td"> Team Name </td>
                            <td class="td"> Points</td>
                            <td class="td"> Password</td>
                            <td class="td"> Mac Address</td>
                            <td class="td"> Ip Address</td>
                            <td class="td"> Delete </td>
                        </tr>

                        <?php

                        while ($row = mysqli_fetch_assoc($result)) {
                            $robotname = $row['robotName'];
                            $serielnum = $row['serialNum'];
                            $robotpic = $row['robotPicture'];
                            $teamname = $row['teamName'];
                            $points = $row['points'];
                            $pwd = $row['password'];
                            $mac = $row['mac'];
                            $ip  = $row['ip'];
                        ?>
                            <tr class="userpanelspace">
                                <td class="td"><?php echo $robotname ?></td>
                                <td class="td"><?php echo $serielnum ?></td>
                                <td class="td"><?php echo $robotpic ?></td>
                                <td class="td"><?php echo $teamname ?></td>
                                <td class="td"><?php echo $points ?></td>
                                <td class="td"><?php echo $pwd ?></td>
                                <td class="td"><?php echo $mac ?></td>
                                <td class="td"><?php echo $ip ?></td>
                                <td class="td"><a href="Robotpanel.php?mac=<?php echo $row['mac']; ?>" class="td">Delete</a></td>
                            </tr>
                        <?php
                        }
                        ?>
           
      </table>
    </div>
    </div>
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
