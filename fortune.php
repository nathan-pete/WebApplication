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
    <h1>Try your Luck!</h1>
    </div>
    <div class="space">
    </div>
    <?php
           if($_POST['submit'])
           {
               $min = 0;
               $max = 100;
               $n = rand($min,$max);
               echo "You win:" . $n . "points!";
           }
           //
       ?>
       <form action = "" method = "POST">
           <input type = "submit" name = "submit">
       </form> 
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