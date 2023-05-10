<?php
include "connection.php";

$id = $_GET['pid'];

if (isset($_POST[("submit")])) {

    $query = "delete from tblslideshow where pid = '$id'";
    mysqli_query($conn, $query);
    echo
        "<script> alert('deleted'); </script>";
}
?>

<?php
include "./database.php";
try {
    $sql = "SELECT * FROM tblslideshow WHERE ssid = $id";
    $result = $conn->query($sql);
} catch (Exception $e) {
    //echo "Error " . $e->getMessage();
    exit();
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
                    <h1 class="m-0">Form Update Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Form Update Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <table class="table">
    <thead>
            <tr>
                <th scope="col">SSID</th>
                <th scope="col">Slideshow Title</th>
                <th scope="col">Slideshow Detail</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->rowCount() > 0) : ?>
                <?php foreach ($result as $p) : ?>
                    <tr>
                        <th scope="row"><?= $p['ssid'] ?></th>
                        <td><?= $p['title'] ?></td>
                        <td><?= $p['detail'] ?></td>
                        <td><?= $p['ssimg'] ?></td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>

    <!-- /.content-header -->
<form class="container" method="post" enctype="multipart/form-data">
    <button type="submit" class="btn btn-primary" name="submit">Delete</button>
</form>
