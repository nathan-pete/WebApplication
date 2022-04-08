<?php
    require "connect.php";
    $delete_th = $_GET['IDFeedback'];
    $sql = "DELETE FROM feedback WHERE IDFeedback = $delete_th";

    if (mysqli_query($conn, $sql)) {

        echo "Record deleted successfully";
        header("location: feedback_overview.php");

    } 
    else {

        echo "Error deleting record: " . $conn->error;
    }
      
    mysqli_close($conn);



?>