<?php
    require "connect.php";
    $delete_th = $_GET['IDContact'];
    $sql = "DELETE FROM contact_admin WHERE IDContact = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, 'i', $delete_th);
        if (mysqli_stmt_execute($stmt)) {
          if (mysqli_query($conn, $stmt)) {

            echo "Record deleted successfully";
            header("location: feedback_overview.php");
    
        } 
        else {
    
            echo "Error deleting record: " . $conn->error;
        }
        } else {
          echo "Error deleting record: " . mysqli_error($conn);
        }
      } else {
        echo "Error preparing: " . mysqli_error($conn);
      }
    //   mysqli_stmt_close($stmt);
    //   mysqli_close($conn);
    
?>