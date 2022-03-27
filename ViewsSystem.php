<?php
include "connect.php";

$visitCounter = 0;  // 0 only when there is not cookies

if(isset($_COOKIE['visitCounter'])){
    $visitCounter = $_COOKIE['visitCounter'];
    $visitCounter ++; //if the cookie is assigned to a variable, we + 1
}

if(isset($_COOKIE['lastVisit'])){
    $lastVisit = $_COOKIE['lastVisit'];
}

setcookie('visitCounter', $visitCounter+1,  time()+3600);

setcookie('lastVisit', date("d-m-Y H:i:s"),  time()+3600);

if($visitCounter == 0){
    echo "Welcome to the page, we are glad to see you!";
} else {

echo "This is visit number ".$visitCounter;
echo '<br>';
echo "Last time, you were here ".$lastVisit;
}
?>

