<?php
include "./database.php";
$i=1;
try {
    $sql = "SELECT * FROM tblproduct";
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
                    <h1 class="m-0">Table Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Table Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <table class="table">
        <thead>
            <tr>
                <th scope="col">PID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->rowCount() > 0) : ?>
                <?php foreach ($result as $p) : ?>
                    <tr>
                        <th scope="row"><?= $i++?></th>
                        <td><?= $p['pName'] ?></td>
                        <td><?= $p['price'] ?></td>
                        <td><?= $p['description'] ?></td>
                        <td><?= $p['img'] ?></td>
                        <td>
                            <a href="addProduct.php?p=update&pid=<?= $p['pid'] ?>" class="btn btn-primary">Update</a>
                            <a href="addProduct.php?p=delete&pid=<?= $p['pid'] ?>" class="btn btn-primary">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
    
    <a href="addProduct.php?p=insert&pid=<?= $p['pid'] ?>" class="btn btn-primary">Insert Product</a>


</div>