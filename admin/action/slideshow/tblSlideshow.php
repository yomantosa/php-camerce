<?php
include "./database.php";
$i=1;
try {
    $sql = "SELECT * FROM tblslideshow";
    $result = $conn->query($sql);
} catch (Exception $e) {
    //echo "Error " . $e->getMessage();
    exit();
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Table Slideshow</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Table Slideshow</li>
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
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->rowCount() > 0) : ?>
                <?php foreach ($result as $p) : ?>
                    <tr>
                        <th scope="row"><?= $i++?></th>
                        <td><?= $p['title'] ?></td>
                        <td><?= $p['detail'] ?></td>
                        <td><?= $p['ssimg'] ?></td>
                        <td>
                        
                            <a href="addSlideshow.php?p=update&pid=<?= $p['ssid'] ?>" class="btn btn-primary">Update</a>
                            <a href="addSlideshow.php?p=delete&pid=<?= $p['ssid'] ?>" class="btn btn-primary">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
    
    <a href="addSlideshow.php?p=insert&pid=<?= $p['ssid'] ?>" class="btn btn-primary">Insert Slideshow</a>


</div>