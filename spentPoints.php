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
<form action="action.php" method="POST">
 <input type="submit" name="smile" value = "smile - 10p" />
 <input type="submit" name="laugh" value = "laugh - 20p"/>
 <input type="submit" name="angry" value = "angry - 30p"/>
</form>
<?php 
    session_start();
    $_SESSION['userId'];
    $_SESSION['points'] = 0;
    include "./connect.php";

    if(isset($_GET['submitT'])) {

        if(isset($userID)) {

            $query = $conn->prepare("SELECT `points` FROM users WHERE userID = ?");
    
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

        $info = $conn->prepare("SELECT * FROM users WHERE point = ?");

        if (!$info) {
          echo 'Prepare failed' . mysqli_error($conn);
        }

        $date = $_POST['smile'];
        if(isset($_POST['submit']))
        {
            $smile = $conn->prepare("SELECT * FROM points WHERE name = ?");
            if (!$smile) {
                echo 'Prepare failed' . mysqli_error($conn);
              }
            $smile ->bind_param("s", $name);
  
            if (!$smile) {
                echo 'Binding failed' . mysqli_error($conn);
              }

            $smile->execute();
  
            $result1 = $smile->get_result();
        
            $smileR = $result->fetch_all(MYSQLI_ASSOC);
        
            $smile->close();
      
        }else{
            echo 'Кнопка пока не нажата'; $bam=FALSE;}
?>
        
        $info->bind_param("i", $points);
  
        if (!$info) {
          echo 'Binding failed' . mysqli_error($conn);
        }
  
        $info->execute();
  
        $result = $info->get_result();
  
        $infoR = $result->fetch_all(MYSQLI_ASSOC);
  
        $info->close();
      }
    }

 
 
 elseif(todays_points < 5)
     addPoint($user)
 
 
 
 function resetPoints($user)
     UPDATE todays_points to zero;
 
 function addPoint($user)
     ADD one to total points
     ADD one to todays points
     UPDATE last_point to current times
?>
    </body>
</html>