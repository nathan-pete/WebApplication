<?php
  include "connect.php";
?>

<?php
  if (isset($_GET['name'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $name = $_GET['name'];

      $query = "SELECT `votes` FROM games WHERE name = ?";
      if ($stmt = mysqli_prepare($conn, $query)) {

        if (mysqli_stmt_execute($stmt)) {

          mysqli_stmt_bind_result($stmt, $name, $picture, $votes);

          mysqli_stmt_store_result($stmt);

          if (mysqli_stmt_num_rows($stmt) === 0) {
            mysqli_stmt_close($stmt);
          } else {
            while (mysqli_stmt_fetch($stmt)) {
            }
            mysqli_stmt_close($stmt);
          }
        } else {
          echo "Error: " . mysqli_error($conn);
        }
      } else {
        echo "Error preparing: " . mysqli_error($conn);
      }
      /*$query = $conn->prepare("SELECT `votes` FROM games WHERE name = ?");
      mysqli_stmt_bind_param($query, 's', $name);
      $query->execute();

      $query->bind_result($amountOfVotes);
      $query->fetch();

      $calc_vote = $amountOfVotes + 1;
      mysqli_stmt_close($query);*/

      
      /*$update_query = mysqli_prepare($conn, "UPDATE games SET votes = ? WHERE `name`=?");
      mysqli_stmt_bind_param($update_query, 'is', $calc_vote, $name);

      mysqli_stmt_execute($update_query);
      $update_query->execute();*/


  $query = "UPDATE games SET votes = ? WHERE `name` = ?";

        if($statement = mysqli_prepare($conn, $query))
        {
            mysqli_stmt_bind_param( $statement, 'is', $votes, $name);
            mysqli_stmt_store_result($statement);
            
            if(mysqli_stmt_execute($statement)) {
                echo "Query executed";
            }
            else 
            {
                echo "Error executing query";
                die(mysqli_error($conn));
            }
                echo"<br>";
            }
            else{
                echo "Prepare error";
                die(mysqli_error($conn));
            }
          }
        }

  /*try{
   //do something
  }catch{
   echo mysqli_error($conn);
  }*/
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
    <h1>Vote the game</h1>
  </div>
  <?php

      $query = "SELECT `name`, `picture`, `votes` FROM games";
      if ($stmt = mysqli_prepare($conn, $query)) {

        if (mysqli_stmt_execute($stmt)) {

          mysqli_stmt_bind_result($stmt, $name, $picture, $votes);

          mysqli_stmt_store_result($stmt);

          if (mysqli_stmt_num_rows($stmt) === 0) {
            mysqli_stmt_close($stmt);
          } else {
            while (mysqli_stmt_fetch($stmt)) {
                echo '<div class="event-items">
                <div class="event-img">
                  <img class="voteimg" src=assets/' . $picture. '>
                  <div class="event-text">
                    <h3 class="event-h" style="padding-bottom:0.5%;">' . $name . '</h3>
                    <p class=" event-p"></p>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6"> <a href="votegame.php?name=' . $name . '" class="btn btn-sm animated-button victoria-two">Vote</a></div>
                </div>
                <div class="votetext">
                <h3>Votes: ' . $votes . '</h3> 
                  </div>
              </div>';
            }
            mysqli_stmt_close($stmt);
          }
        } else {
          echo "Error: " . mysqli_error($conn);
        }
      } else {
        echo "Error preparing: " . mysqli_error($conn);
      }
?>
  <!-- /container -->
  <!-- Bootstrap core JavaScript
      ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <br>
</div>
<?php
    include_once "footer.html";
  ?>
</body>
</html>