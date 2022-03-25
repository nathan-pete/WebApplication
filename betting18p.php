<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="stylesheet" type="text/css" href="./style/style.css"> -->
		<title>Bets</title>
	</head>
	<body>
        <div class="body">
            <form method="POST" autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <?php
                  include "connect.php";
                  //pull from db into drop down all robot names
                  echo "<label for='name'>Robot Name</label><br>";
                  echo "<select name='name' value='Robot Name'>";
                  echo "<option selected></option>";
                  $sql = "SELECT robotName FROM robots";
                    if ($stmt = mysqli_prepare($conn, $sql)) { //database parses, compiles, and performs query optimization and stores w/o executing
                      if (mysqli_stmt_execute($stmt)) { //execute the statement
                        $result =  mysqli_stmt_get_result($stmt); //get result
                        foreach ($result as $row){
                          echo "<option value=$row[robotName]>$row[robotName]</option>";
                          /* Option values are added by looping through the array */
                        }
                      } else {
                          echo "Error executing: " . mysqli_error($conn);
                      }
                    } else {
                        echo "Error preparing: " . mysqli_error($conn);
                    }
                  echo "</select>";
                  mysqli_stmt_close($stmt);
                ?>
            </form>
        </div>
	</body>
</html>