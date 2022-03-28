<?php
    require "connect.php";
    $delete_th = $_GET['IDFeedback'];
    $sql = "DELETE FROM feedback WHERE IDFeedback = $delete_th";

    if ($conn->query($sql) === TRUE) {

        echo "Record deleted successfully";
        header("location: feedback_overview.php");

    } 
    else {

        echo "Error deleting record: " . $conn->error;
    }
      
    $conn->close();



?>