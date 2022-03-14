<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./style/style.css">
  <link rel="icon" href="./assets/PBBwhite.png">
  <title>Battle Bot Events</title>
</head>
<body>
<?php include_once "header.html"; ?>
<!-- Control Robot page -->
<div class="controlRobotContainer">
  <div class="controlRobottitle">
    <h1 class="title_color">Control A Robot</h1>
  </div>
  <div class="controlRobotvideo">
    <iframe width="800vw" height="450vh" src="https://www.youtube.com/embed/7u5DiF--sLg"></iframe>
  </div>
  <h1 class="title_chat">Chat</h1>
  <div id="robotcontainer">

    <div id="chat_box">
      <div class="chat_data">
        <span class="chat_text">Kaiser: </span>
        <span class="chat_text_message">How are you?</span>
        <span class="chat_text_time">12:30</span>
      </div>
    </div>

    <form class="robotchat" method="post" action="controlRobot.php">
      <input class="robot_text" type="text" name="name" placeholder="enter name"/>
      <textarea class="robot_message" name="enter message" placeholder="enter message"></textarea>
      <input class="robot_submit" type="submit" name="submit" value="Send it"/>
    </form>
  </div>
  <h1 class="title_remote">Remote</h1>
  <div id="remote_box">
    <div class="button_up">
      <input type="image" src="./assets/up.png" name="up" width="50" height="48" alt="up"/>
    </div>
    <div class="button_down">
      <input type="image" src="./assets/down.png" name="down" width="50" height="48" alt="up"/>
    </div>
    <div class="button_left">
      <input class="button_left" type="image" src="./assets/left.png" name="left" width="50" height="48" alt="up"/>
    </div>
    <div class="button_right">
      <input class="button_right" type="image" src="./assets/right.png" name="right" width="50" height="48" alt="up"/>
    </div>
  </div>
</div>

<?php include_once "footer.html"; ?>
</body>
</html>