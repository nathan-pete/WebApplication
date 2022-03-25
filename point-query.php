<?php
include "./connect.php";
$token = $_POST["token"];
$userID = $_POST["userId"];
$pushT = $conn->prepare("UPDATE users SET token = ? WHERE userID = ?");
        
if(!$pushT) {
    echo 'Prepare failed' . mysqli_error($conn);
}

$pushT->bind_param("ii", $token ,$userID);

if(!$pushT) {
    echo 'Binding failed' . mysqli_error($conn);
}

$pushT -> execute();
$pushT->close();


?>