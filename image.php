<?php 
include "connect.php";
?>
<?php 
        $query = $conn->prepare("SELECT `robotPicture` FROM robots WHERE name = ? AND robotPicture IS NOT NULL");
        mysqli_stmt_bind_param($stmt, 's', $_SESSION['sessionID']);
    
        $query->execute();
        $query->bind_result($robotPicture);
    
        $result = $query->get_result();
        $query->fetch();
    
                if (mysqli_stmt_num_rows($stmt) > 0) {
                    while ($stmt->fetch()) {}
                } else {
                    $robotPicture = "profile-default.jpg";
                }
                echo $robotPicture['robotPicture']; 
?>