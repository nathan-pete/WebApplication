<?php
include "SideBar.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Home Page</title>
</head>
<body>    
    <div class="backgroundforadmin">
        <h1 class="TitleforAdminPage">Hello Admin!</h1>
   </div>
   
</body>
</html>
<?php
$_SESSION['administrator']= "hello admin";
?>

