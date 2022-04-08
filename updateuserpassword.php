<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Customer Password Reset</h4>
                    </div>
                    <div class="card-body">

                        <form action="updateuserpassword.php" method="POST">

                            <div class="form-group mb-3"> 
                                <label for="">User ID</label>
                                <input type="text" name="Id" class="form-control">
                            </div>
                           
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="text" name="pwd" class="form-control">
                            </div>
                    
                            <div class="form-group mb-3">
                                <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                                <a href="admin.php" class="displaystylebutton">Back to Display</a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
//Updating Customers data
$conn = mysqli_connect("localhost", "root", "", "webapp");

if (isset($_POST['updatedata'])) {
    $id = $_POST['Id'];
    $pwd = $_POST['pwd'];
    $query = "UPDATE `users` SET `password`=?  WHERE userID=?";

    if ($statement = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param($statement, 'si', $pwd,$id);
        mysqli_stmt_execute($statement);

        $_SESSION['updatedata'] = "Data Updated Successfully";
        header("Location: admin.php");
    }
}

?>
