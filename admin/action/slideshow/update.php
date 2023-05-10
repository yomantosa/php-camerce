<?php
include "connection.php";

$id = $_GET['pid'];

if (isset($_POST[("submit")])) {
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $fileName = $_FILES['productimage']['name'];
    $tempName = $_FILES['productimage']['tmp_name'];
    function getName($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }



    $filePath = 'uploads/slideshow/' . getName(10) . $fileName;
    move_uploaded_file($tempName, $filePath);

    $query = "UPDATE `tblslideshow` SET `title`='$title',`detail`='$detail',`ssimg`='$filePath' WHERE `ssid` = $id  ";

    mysqli_query($conn, $query);
    echo
        "<script> alert('Updated'); </script>";
}
?>

<?php
include "./database.php";
try {
    $sql = "SELECT * FROM tblslideshow WHERE ssid = $id";
    $result = $conn->query($sql);
} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- /.content-header -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form add Slideshow</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Form add Slideshow</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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
            <?php if ($result->rowCount() > 0): ?>
                <?php foreach ($result as $p): ?>
                    <tr>
                        <th scope="row">
                            <?= $p['ssid'] ?>
                        </th>
                        <td>
                            <?= $p['title'] ?>
                        </td>
                        <td>
                            <?= $p['detail'] ?>
                        </td>
                        <td>
                            <?= $p['ssimg'] ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>


    <form class="container" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="detail" class="form-label">detail</label>
            <input type="text" class="form-control" id="detail" name="detail">
        </div>
        <div class="mb-3">
            <label for="productimage" class="form-label">Slideshow Image</label>
            <input type="file" class="form-control" id="productimage" name="productimage" accept="image/*">
        </div>


        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
</div>