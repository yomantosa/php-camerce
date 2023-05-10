<?php
include "connection.php";
if (isset($_POST[("submit")])) {
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $fileName = $_FILES['productimage']['name'];
    $tempName = $_FILES['productimage']['tmp_name'];
    function getName($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
     
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
     
        return $randomString;
    }
     


    $filePath = 'uploads/products/'.getName(10). $fileName;
    move_uploaded_file($tempName, $filePath);

    $query = "INSERT INTO tblproduct VALUES('','$productname','$price','$filePath','$detail')";
    mysqli_query($conn, $query);
    echo
        "<script> alert('added'); </script>";
}



?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form add Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Form add Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<form class="container" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="productname" class="form-label">productname</label>
        <input type="text" class="form-control" id="productname" name="productname">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">price</label>
        <input type="text" class="form-control" id="price" name="price">
    </div>
    <div class="mb-3">
        <label for="productimage" class="form-label">productimage</label>
        <input type="file" class="form-control" id="productimage" name="productimage" accept="image/*">
    </div>
    <div class="mb-3">
        <label for="detail" class="form-label">detail</label>
        <input type="text" class="form-control" id="detail" name="detail">
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>