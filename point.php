<?php
define("INTERVAL", 5 ); // every 5 seconds

function runIt() { // Your function to run every 5 seconds
    echo "something\n";
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
        echo 'Received tokens are :' . $_SESSION['token']
        ; 
    }
?> 

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
    <input type="submit" name="submitT" value="Submit">
</form>
}

<?php
function start() {
    $active = true;
    $nextTime   = microtime(true) + INTERVAL; // Set initial delay

    while($active) {
        usleep(1000); // optional, if you want to be considerate

        if (microtime(true) >= $nextTime) {
            runIt();
            $nextTime = microtime(true) + INTERVAL;
        }

        // Do other stuff (you can have as many other timers as you want)           

        $active = !checkForStopFlag();
    }
}

start();
?>


    