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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
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
    include_once "header.html";
  ?>
  <div class="events-title">
    <h1 style="font-weight: 700; pointer-events: none;">Vote for a game</h1>
  </div>
  <div class="events-content">
    <div class="event-items">
      <div class="event-img">
        <img src="./assets/sumo.png" class="tweak" alt="Battle Bot - Sumo" height="110" width="135">
        <div class="event-text">
          <h3 class="event-h" style="padding-bottom:0.5%;">Sumo</h3>
          <p class=" event-p"></p>
        </div>
      </div>
<div class="container">
<?php 
            $query = "SELECT * FROM games";
            $result = mysqli_query($conn,$query);

            $count = mysqli_num_rows($result);
    ?>
  <div class="row">
    <div class="col-md-3 col-sm-3 col-xs-6"> <a href="votegame.php?name=sumo" class="btn btn-sm animated-button victoria-two">Vote</a></div>
  </div>
</div>
<?php
      if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
      }   

      if(isset($_GET['name'])) {
        if($_SERVER['REQUEST_METHOD']==='GET'){
          $name = $_GET['name'];

          $query = $conn ->prepare("SELECT `votes` FROM games WHERE name = ?");
          mysqli_stmt_bind_param( $query, 's', $name);
            
          $query->execute();
          $query->bind_result($amountOfVotes);
          $query->fetch();

          $game_details = mysqli_fetch_assoc($result);
          $calc_vote = $amountOfVotes + 1;
          mysqli_stmt_close($query);
      //var_dump( $amountOfVotes);
      //echo $calc_vote;
      //die();
?>
<?php
        }
      }
?>
<?php
      if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
      } 
      if(isset($_GET['name'])) {
        if($_SERVER['REQUEST_METHOD']==='GET'){
            $name = $_GET['name'];

        $update_query = mysqli_prepare($conn, "UPDATE games SET votes = ? WHERE `name`=?");
        mysqli_stmt_bind_param($update_query , 'is',$calc_vote, $name);
        mysqli_stmt_execute($update_query);
        mysqli_stmt_store_result($update_query);
       
        $update_query -> execute();
        $update_query -> fetch();

        $calc_vote = $amountOfVotes + 1;

     /*try{
       //do something
     }catch{
       echo mysqli_error($conn);
     }*/
?>
<?php
      }
    }
?>
<!-- /container --> 
<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">   <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method=get>
            value="Vote" type="submit" name="vote"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</form>
<h3>Votes: <?php echo $calc_vote; ?></h3>
    </div>

    <div class="event-items">
      <div class="event-img">
        <img src="./assets/line.png" class="tweak" alt="Battle Bot - Line Tracking" height="110" width="109">
        <div class="event-text">
          <h3 class="event-h" style="padding-bottom:0.5%;">Line Tracking</h3>
          <p class=" event-p"></p>
        </div>
      </div>
      <div class="container">
      <?php 
            $query = "SELECT * FROM games";
            $result = mysqli_query($conn,$query);

            $count = mysqli_num_rows($result);
    ?>
  <div class="row">
    <div class="col-md-3 col-sm-3 col-xs-6"> <a href="votegame.php?name=sumo" class="btn btn-sm animated-button victoria-two">Vote</a></div>
  </div>
</div>
<?php
      if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
      }   

      if(isset($_GET['name'])) {
        if($_SERVER['REQUEST_METHOD']==='GET'){
          $name = $_GET['name'];

          $query = $conn ->prepare("SELECT `votes` FROM games WHERE name = ?");
          mysqli_stmt_bind_param( $query, 's', $name);
            
          $query->execute();
          $query->bind_result($amountOfVotes);
          $query->fetch();

          $game_details = mysqli_fetch_assoc($result);
          $calc_vote = $amountOfVotes + 1;
          mysqli_stmt_close($query);
      //var_dump( $amountOfVotes);
      //echo $calc_vote;
      //die();
?>
<?php
        }
      }
?>
<?php
      if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
      } 
      if(isset($_GET['name'])) {
        if($_SERVER['REQUEST_METHOD']==='GET'){
            $name = $_GET['name'];

        $update_query = mysqli_prepare($conn, "UPDATE games SET votes = ? WHERE `name`=?");
        mysqli_stmt_bind_param($update_query , 'is',$calc_vote, $name);
        mysqli_stmt_execute($update_query);
        mysqli_stmt_store_result($update_query);
       
        $update_query -> execute();
        $update_query -> fetch();

        $calc_vote = $amountOfVotes + 1;

     /*try{
       //do something
     }catch{
       echo mysqli_error($conn);
     }*/
?>
<?php
      }
    }
?>
<!-- /container --> 
<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<h3>Votes: <?php echo $calc_vote; ?></h3>
    </div>
</div>
    <div class="event-items">
      <div class="event-img">
        <img src="./assets/pen.png" class="tweak" alt="Battle Bot - Figure Drawing" height="110" width="135">
        <div class="event-text">
          <h3 class="event-h" style="padding-bottom:0.5%;">Figure Drawing</h3>
          <p class=" event-p"></p>
        </div>
      </div>
      <div class="container">
      <?php 
            $query = "SELECT * FROM games";
            $result = mysqli_query($conn,$query);

            $count = mysqli_num_rows($result);
    ?>
  <div class="row">
    <div class="col-md-3 col-sm-3 col-xs-6"> <a href="votegame.php?name=sumo" class="btn btn-sm animated-button victoria-two">Vote</a></div>
  </div>
</div>
<?php
      if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
      }   

      if(isset($_GET['name'])) {
        if($_SERVER['REQUEST_METHOD']==='GET'){
          $name = $_GET['name'];

          $query = $conn ->prepare("SELECT `votes` FROM games WHERE name = ?");
          mysqli_stmt_bind_param( $query, 's', $name);
            
          $query->execute();
          $query->bind_result($amountOfVotes);
          $query->fetch();

          $game_details = mysqli_fetch_assoc($result);
          $calc_vote = $amountOfVotes + 1;
          mysqli_stmt_close($query);
      //var_dump( $amountOfVotes);
      //echo $calc_vote;
      //die();
?>
<?php
        }
      }
?>
<?php
      if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
      } 
      if(isset($_GET['name'])) {
        if($_SERVER['REQUEST_METHOD']==='GET'){
            $name = $_GET['name'];

        $update_query = mysqli_prepare($conn, "UPDATE games SET votes = ? WHERE `name`=?");
        mysqli_stmt_bind_param($update_query , 'is',$calc_vote, $name);
        mysqli_stmt_execute($update_query);
        mysqli_stmt_store_result($update_query);
       
        $update_query -> execute();
        $update_query -> fetch();

        $calc_vote = $amountOfVotes + 1;

     /*try{
       //do something
     }catch{
       echo mysqli_error($conn);
     }*/
?>
<?php
      }
    }
?>
<!-- /container --> 
<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<h3>Votes: <?php echo $calc_vote; ?></h3>
    </div>
</div>
    <div class="event-items">
      <div class="event-img">
        <img src="./assets/maze.png" class="tweak" alt="Battle Bot - Maze Race" height="110" width="135">
        <div class="event-text">
          <h3 class="event-h" style="padding-bottom:0.5%;">Maze Race</h3>
          <p class=" event-p"></p>
        </div>
      </div>
      <div class="container">
      <?php 
            $query = "SELECT * FROM games";
            $result = mysqli_query($conn,$query);

            $count = mysqli_num_rows($result);
    ?>
  <div class="row">
    <div class="col-md-3 col-sm-3 col-xs-6"> <a href="votegame.php?name=sumo" class="btn btn-sm animated-button victoria-two">Vote</a></div>
  </div>
</div>
<?php
      if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
      }   

      if(isset($_GET['name'])) {
        if($_SERVER['REQUEST_METHOD']==='GET'){
          $name = $_GET['name'];

          $query = $conn ->prepare("SELECT `votes` FROM games WHERE name = ?");
          mysqli_stmt_bind_param( $query, 's', $name);
            
          $query->execute();
          $query->bind_result($amountOfVotes);
          $query->fetch();

          $game_details = mysqli_fetch_assoc($result);
          $calc_vote = $amountOfVotes + 1;
          mysqli_stmt_close($query);
      //var_dump( $amountOfVotes);
      //echo $calc_vote;
      //die();
?>
<?php
        }
      }
?>
<?php
      if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
      } 
      if(isset($_GET['name'])) {
        if($_SERVER['REQUEST_METHOD']==='GET'){
            $name = $_GET['name'];

        $update_query = mysqli_prepare($conn, "UPDATE games SET votes = ? WHERE `name`=?");
        mysqli_stmt_bind_param($update_query , 'is',$calc_vote, $name);
        mysqli_stmt_execute($update_query);
        mysqli_stmt_store_result($update_query);
       
        $update_query -> execute();
        $update_query -> fetch();

        $calc_vote = $amountOfVotes + 1;

     /*try{
       //do something
     }catch{
       echo mysqli_error($conn);
     }*/
?>
<?php
      }
    }
?>
<!-- /container --> 
<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<h3>Votes: <?php echo $calc_vote; ?></h3>
    </div>
    </div>
    </div>
  </div>
</div>
<br>
<?php
  include_once "footer.html";
?>
</body>
</html>