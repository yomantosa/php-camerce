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
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user VALUES('','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>

<body>

    <form class="container frm-container"  action="" method="post" autocomplete="off">
        <div class="container mb-3 col-4">
            <h2>Register</h2>
        </div>
        
        <div class="container mb-3 col-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id = "username" aria-describedby="emailHelp">
        </div>
        </div>
        <div class="container mb-3 col-4">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control"  name="email" id = "email" required value="" aria-describedby="emailHelp">
        </div>
        <div class="container mb-3 col-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id = "password" required value="">
        </div>
        <div class="container mb-3 col-4">
            <label for="confirmpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control"name="confirmpassword" id = "confirmpassword" required value="">
        </div>
        <div class="container mb-3 col-4 ">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="container mb-3 col-4 ">
            <label class="" for="exampleCheck1"><a href="login.php">Login</a></label>
        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>