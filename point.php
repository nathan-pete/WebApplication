<?php
    session_start();

    include "./connect.php";

    //Set session on user id in login page
    $userID = $_GET['userID']; //change this $_SESSION['userID'];

    if(isset($_GET['userID'])) {

        $query = $conn->prepare("SELECT `token` FROM users WHERE userID = ?");

        if(!$query) {
            echo 'Prepare failed' . mysqli_error($conn);
        }

        $query->bind_param("i", $userID);

        if(!$query) {
            echo 'Binding failed' . mysqli_error($conn);
        }

        $query->execute();

        if(!$query) {
            echo 'Execute failed' . mysqli_error($conn);
        }

        $result = $query->get_result();

        $data = $result->fetch_all(MYSQLI_ASSOC);


        $query->close();


        if(isset($_GET['submitT'])) {
        
            $tokenPl = $_SESSION['token'] + 1;

            
            $pushT = $conn->prepare("UPDATE users SET token = ? WHERE userID = ?");

            if(!$pushT) {
                echo 'Prepare failed' . mysqli_error($conn);
            }
            
            $pushT->bind_param("ii", $tokenPl,$userID);

            if(!$pushT) {
                echo 'Binding failed' . mysqli_error($conn);
            }

            $pushT -> execute();
            $pushT->close();


        }
      
    }

?>



<h1>Test points</h1>

<?php 
    foreach($data as $row) {
        $_SESSION['token'] = $row['token'];
        echo 'Received tokens are :' . $row['token']; 
    }
?> 

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
    <input type="submit" name="submitT" value="Submit">
</form>