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
<?php include_once "header.html"; ?>

<div class="controlRobotContainer">
    <div class ="controlRobottitle"> 
        <h1 class="title_color">Control A Robot</h1>
    </div>
    <div class="controlRobotvideo">
        <iframe width="800vw" height="450vh" src="https://www.youtube.com/embed/7u5DiF--sLg"></iframe>    
    </div>
        <h1 class="title_chat">Chat</h1>
    <div id="robotcontainer">
      
        <div id ="chat_box">
            <div class="chat_data">
                <span class="chat_text">Kaiser: </span>
                <span class="chat_text_message">How are you?</span>
                <span class="chat_text_time">12:30</span>
            </div>
        </div>   

      <form class="robotchat" method="post" action="controlRobot.php">
        <input class="robot_text" type="text" name="name" placeholder="enter name"/>
        <textarea class="robot_message" name = "enter message" placeholder="enter message"></textarea>
        <input class="robot_submit" type="submit" name="submit" value = "Send it"/>
      </form>  
    </div>    
</div>

<?php include_once "footer.html"; ?>
</body>
</html>