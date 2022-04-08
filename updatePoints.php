<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers Data</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    
</head>


<div class="streamContainer">
        <div class="body">
    
     
                        <h4 class="Titlepanel">Update Point of Robot</h4>
                        <form action="updatePoints.php" method="POST">

                        <div class="form-group mb-3">
                                <label class="titleforupdatepoints">Robot Mac</label>
                                <input type="text" name="mac" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Points</label>
                                <select name="points">
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="150">150</option>
                                <option value="200">200 </option>
                                <option value="250">250 </option>
                                <option value="300 ">300 </option>
                                </select>
                            </div>
                            <div class="submitforadminpanel">
                                <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                                <a href="admin.php" class="displaystylebutton">Back to Display</a>
                            </div>

                        </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
//Updating Point data
$conn = mysqli_connect("localhost", "root", "", "webapp");

if (isset($_POST['updatedata'])) {
    $mac = $_POST['mac'];
    $point = $_POST['points'];
    $query = "UPDATE `robots` SET `points`=`points`+ ?  WHERE mac=?";

    if ($statement = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param($statement, 'ii', $point,$mac);
        mysqli_stmt_execute($statement);

        $_SESSION['updatedata'] = "Data Updated Successfully";
        header("Location: admin.php");
    }
}

?>
