<?php
include "Sidebar.php";
require_once("dbh.php");
$query = "SELECT * FROM `users`";
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
    <h1 class="Titlepanel">User Panel</h1>
    <div class="containerusers">
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                    <table class="table table-bordered">
                        <tr>
                            <td class="td"> User ID </td>
                            <td class="td"> User Name </td>
                            <td class="td"> User FirstName </td>
                            <td class="td"> User LastName </td>
                            <td class="td"> Points </td>
                            <td class="td"> User Email </td>
                            <td class="td"> Password</td>
                            <td class="td"> Profile Picture</td>
                            <td class="td"> Status Account</td>
                            <td class="td"> User Date of Birth</td>
                            <td class="td"> Votes</td>
                            <td class="td"> Edit Data </td>
                            <td class="td"> Delete </td>
                        </tr>

                        <?php

                        while ($row = mysqli_fetch_assoc($result)) {
                            $UserID = $row['userID'];
                            $UserName = $row['userName'];
                            $FirstName = $row['firstName'];
                            $LastName = $row['lastName'];
                            $point = $row['points'];
                            $UserEmail = $row['email'];
                            $pwd = $row['password'];
                            $pic = $row['profilePic'];
                            $status = $row['status'];
                            $UserDate = $row['DoB'];
                            $votes = $row['vote'];
                            

                        ?>
                            <tr>
                                <td class="td"><?php echo $UserID ?></td>
                                <td class="td"><?php echo $UserName ?></td>
                                <td class="td"><?php echo $FirstName ?></td>
                                <td class="td"><?php echo $LastName ?></td>
                                <td class="td"><?php echo $point ?></td>
                                <td class="td"><?php echo $UserEmail ?></td>
                                <td class="td"><?php echo $pwd ?></td>
                                <td class="td"><?php echo $pic ?></td>
                                <td class="td"><?php echo $status ?></td>
                                <td class="td"><?php echo $UserDate ?></td>
                                <td class="td"><?php echo $votes ?></td>
                                <td class="td"><a href="updateUser.php" class="td">Edit</a></td>
                                <td class="td"><a href="Userpaneladmin.php?id=<?php echo $row['userID']; ?>" class="td">Delete</a></td>
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
    require 'dbh.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM `users` WHERE userID = '$id'";
        $run = mysqli_query($conn, $query);
        if ($run) {
            header('location:Userpaneladmin.php');
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>

</body>
</html>
>>>>>>> c9b8c9a433916873af303092d9af82b4b5b4dadf:Userpaneladmin.php
