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

                <?php
                if (isset($_SESSION['status'])) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Data of Customers</h4>
                    </div>
                    <div class="card-body">

                        <form action="updateUser.php" method="POST">

                            <div class="form-group mb-3">
                                <label for="">User ID</label>
                                <input type="text" name="Id" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for=""> User Name</label>
                                <input type="text" name="Name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Points</label>
                                <input type="number" name="points" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" name="Email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="text" name="pwd" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Profile Picture</label>
                                <input type="file" name="profilepic" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Status Account</label>
                                <input type="text" name="stats" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Date of Birth</label>
                                <input type="date" name="Dob" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Votes</label>
                                <input type="text" name="vote" class="form-control">
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
    $username =$_POST['Name'];
    $email = $_POST['Email'];
    $point =$_POST['points'];
    $Dob = $_POST['Dob'];
    $pwd = $_POST['pwd'];
    $pic = $_POST['profilepic'];
    $stats = $_POST['stats'];
    $votes = $_POST['vote'];

    $query = "UPDATE `users` SET userName =? , email=?, points=? ,DoB=?, `password`=? , profilePic=? , `status`=?, vote=? WHERE userID=?";

    if ($statement = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param($statement, 'ssiisssii',$username , $email, $point, $Dob, $pwd,$pic ,$stats,$votes, $id);
        mysqli_stmt_execute($statement);

        $_SESSION['updatedata'] = "Data Updated Successfully";
        header("Location: admin.php");
    }
}

?>