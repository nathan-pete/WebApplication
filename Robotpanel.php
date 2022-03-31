<?php
include "Sidebar.php";
require_once("dbh.php");
$query = "SELECT * FROM `robots`";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styling.css">
    <title>View All Data</title>
</head>

<body class="backgroundforadmin">
    <h1 class="Titlepanel">Robot Panel</h1>
    <div class="containerusers">
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                    <table class="table table-bordered">
                        <tr class="userpanelspace">
                            <td class="td"> Robot Name </td>
                            <td class="td"> Serial Number </td>
                            <td class="td"> Robot Picture </td>
                            <td class="td"> Team Name </td>
                            <td class="td"> Points</td>
                            <td class="td"> Password</td>
                            <td class="td"> Mac Address</td>
                            <td class="td"> Ip Address</td>
                            <td class="td"> Edit Data </td>
                            <td class="td"> Delete </td>
                        </tr>

                        <?php

                        while ($row = mysqli_fetch_assoc($result)) {
                            $robotname = $row['robotName'];
                            $serielnum = $row['serielNum'];
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
                                <td class="td"><a href="#" class="td">Edit</a></td>
                                <td class="td"><a href="Userpanel.php?id=<?php echo $row['#']; ?>" class="td">Delete</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php   //selects Id from userId and deletes it
    include 'dbh.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM `user` WHERE userId = '$id'";
        $run = mysqli_query($conn, $query);
        if ($run) {
            header('location:Userpanel.php');
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
>>>>>>> c9b8c9a433916873af303092d9af82b4b5b4dadf
