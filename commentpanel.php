<?php
include "Sidebar.php";
require_once("connect.php");
$query = "SELECT * FROM `comments`";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <title>Comments</title>
</head>

<div class="streamContainer">
        <div class="body">
    <h1 class="Titlepanel">Comment Panel</h1>
    <div class="containerusers">
                    <table class="table">
                        <tr class="userpanelspace">
                            <td class="td"> User ID </td>
                            <td class="td"> Author</td>
                            <td class="td"> Message </td>
                            <td class="td"> Delete </td>
                        </tr>

                        <?php

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $UserID = $row['UserID'];
                            $message = $row['message'];
                        ?>
                            <tr class="userpanelspace">
                                <td class="td"><?php echo $UserID ?></td>
                                <td class="td"><?php echo $UserName ?></td>
                                <td class="td"><?php echo $message ?></td>
                                <td class="td"><a href="commentpanel.php?id=<?php echo $row['id']; ?>" class="td">Delete</a></td>
                            </tr>
                        <?php
                        }
                        ?>
             </table>
        </div>
    </div>
    <?php   //selects comment from message and deletes it
    include 'connect.php';
    if ($id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT)) {
        $query = "DELETE FROM `comments` WHERE id = ?";
        
         $stmt = mysqli_prepare($conn, $query);
         mysqli_stmt_bind_param($stmt, 'i', $id);
          if (mysqli_stmt_execute($stmt)) {

            echo "Record deleted successfully";
            header("location: commentpanel.php");
          }
        else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
