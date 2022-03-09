/*<?php
session_start();
$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./style/style.css">
  <link rel="icon" href="./assets/PBBwhite.png">
  <title>Dashboard</title>
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
  <a href="../"<button class="btn btn-dark text-lightgrey px-3"><Back></button></a>
  <a href = ".php"><Logout</button></a>
  <h1 class="">Voting System</h1>
  <?php 
  if(isset($_SESSION['groups'])){
    $groups = $_SESSION['groups'];
    for($i=0;$i<count($groups);$i++){
  ?>

  <?php
  echo $groups[$i]['votes']?>
    }
  }
   

</body>
</html>
*/
<?php 
session_start();
include('connect.php');

$votes = $_POST['votes'];
$totalvotes = $votes + 1;

$userid = $_SESSION['userid']

$updatevotes = mysqli_query($conn, "update usertable set votes =$totalvotes where id  = $userid");

$updatestatus = mysqli_query($conn, "update usertable set status = 1  where id  = $userid");

if($updatevotes  nad $updatestatus){
    $_SESSSION['status'] = 1;
    echo '<script>
    alert("Voting successful");
    window.location = ../code/voting.php;

    </script>'
}else{
  echo '<script>
  alert ("Techical error !! Vote after sometime");
  window.location="..//;

  </script>'
}

?>