<?php
    require "connect.php";
    $delete_th = $_GET['IDContact'];
    $sql = "DELETE FROM contact_admin WHERE IDContact = $delete_th";

    if ($conn->query($sql) === TRUE) {

        echo "Record deleted successfully";
        header("location: contact_admin_overview.php");

    } 
    else {

        echo "Error deleting record: " . $conn->error;
    }
      
    $conn->close();



?>