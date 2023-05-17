<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>

<?php
require 'connection/config.php';
if (!empty($_SESSION["id"])) {
    header("Location: index.php");
}
if (isset($_POST["submit"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row['password']) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        } else {
            echo
                "<script> alert('Wrong Password'); </script>";
        }
    } else {
        echo
            "<script> alert('User Not Registered'); </script>";
    }
}
?>

<body>


    <form class="container frm-container" action="" method="post" autocomplete="off">
        <div class="container mb-3 col-4">
            <h2>Login</h2>
        </div>
        <div class="container mb-3 col-4">
            <label for="usernameemail" class="form-label">Email address</label>
            <input type="text" class="form-control" name="usernameemail" id="usernameemail" required value=""
                aria-describedby="emailHelp">
        </div>
        <div class="container mb-3 col-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required value="">
        </div>
        <div class="container mb-3 form-check col-4 ">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label container" for="exampleCheck1">Remember me</label>
        </div>
        <div class="container mb-3 col-4 ">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="container mb-3 col-4 justify-content-end">
            <label for="exampleCheck1"><a href="forgotpass.php">Forgor Password</a></label>
            <label for="exampleCheck1"><a>|</a></label>
            <label for="exampleCheck1"><a href="register.php">Register an Account</a></label>
        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>