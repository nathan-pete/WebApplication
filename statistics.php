<?php
  include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./style/style.css">
  <link rel="icon" href="./assets/PBBwhite.png">

  <link href="http://designify.me/code-snippets/animated-buttons/css/btns.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <title>Battle Bot Events</title>
  <?php
    echo "
      <style>
        .header-style .nav .menu .events{
          color: #83c0ff;
        }
        .header-style .nav .menu .events:hover{
          color: #0386FF;
          text-decoration: none;
        }
      </style>";
  ?>
</head>
<body>
<div class="body">
  <?php 
    include_once "header.php";
  ?>
  <div id="profileCenterTitle">
    <h1>Your Visiting Statistics</h1>
    </div>
    <div class="space">
    </div>
    <?php
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
</div>
<div class="space">
    </div>
<br>
<br>
<br>
<?php
    include_once "footer.html";
  ?>
</body>
</html>