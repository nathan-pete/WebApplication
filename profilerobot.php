<?php 
  include "connect.php";
?>
<?php 
     if($_SERVER['REQUEST_METHOD'] === 'GET') {
        if(isset($_GET['name'])) {
          $name = $_GET['name'];

          $info  = $conn -> prepare("SELECT * FROM robots WHERE robotName = ?");

          if(!$info) {
            die('Prepare failed' . mysqli_error($conn));
          }

          $info -> bind_param("s", $name);

          if(!$info) {
            die('Binding failed' . mysqli_error($conn));
          }

          $info -> execute();

          if(!$info) {
            die('Execute failed' . mysqli_error($conn));
          }

          $result = $info->get_result();

          $infoR = $result -> fetch_all(MYSQLI_ASSOC);

          $info -> close();
          $conn -> close();
        }
     }
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./style/style.css">
  <link rel="icon" href="./assets/PBBwhite.png">
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
    <h1>Robot <br> Profile</h1>
  </div>
  <div class="space">
  </div>
  <div class="squarecolor">
  <div class="overall">
    <div class="squarecolorsmall">
    <?php

          if(isset($name)){
            if($infoR) {
              foreach($infoR as $robot) {
                echo $robot['robotName'];
              }
            }   
          }
    ?>
      </div>
      <div class = "squarecolorsmall">
          <?php
                if(isset($name)){
                  if($infoR) {
                    foreach($infoR as $robot) {
                      echo $robot['serialNum'];
                    }
                  }  
                }
              ?>
          </div>
          <div class = "squarecolorsmall">
          <?php
                if(isset($name)){
                  if($infoR) {
                    foreach($infoR as $robot) {
                      echo $robot['sound'];
                    }
                  }  
                }               
              ?>
          </div>
              </div>
          <div class = "overall2"> 
          <div class = "squarecolorbig">
          <?php
            if(isset($name)){
              if($infoR) {
               foreach($infoR as $robot) {
                 echo $robot['robotPicture'];
               }
             }  
           } 
            ?>
          </div>
      </div>
      </div>
</body>
</html>