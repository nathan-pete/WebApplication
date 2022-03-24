<script>
$function (){
    setInterval(function () {
        $.ajax({
            type: "GET",
            url: "point.php",
            success(function(data){
                $(".main").html(data);
            }
        });
},2000);
</script>

<?php

include "./connect.php";
session_start();

$_SESSION['userID'] = 11;

echo $_SESSION['userId'];


$userID = $_SESSION['userID'];

    if(isset($_GET['submitT'])) {

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
 
