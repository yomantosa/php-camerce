<?php
include "connection/config.php";

function addCart($productName, $p_price, $p_img) {
	include "connection/config.php";

	$sql = "INSERT INTO `tblcart` (`cid`, `pname`, `price`, `qty`, `img`) VALUES ('', '$productName', '$p_price', '1', '$p_img')";
	mysqli_query($conn, $sql);
	echo
     "<script> alert('added to cart'); </script>";

}

if (isset($_GET['add']) == 1){
	addCart($_GET['pn'],$_GET['pp'],$_GET['pi']);
}



// if (isset($_POST[("submit")])) {
//     $productname = $_POST['productname'];
//     $price = $_POST['price'];
//     $detail = $_POST['detail'];
    
//     function getName($n) {
//         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//         $randomString = '';
     
//         for ($i = 0; $i < $n; $i++) {
//             $index = rand(0, strlen($characters) - 1);
//             $randomString .= $characters[$index];
//         }
     
//         return $randomString;
//     }
     


//     $filePath = 'uploads/products/'.getName(10). $fileName;
//     move_uploaded_file($tempName, $filePath);

//     $query = "INSERT INTO tblproduct VALUES('','$productname','$price','$filePath','$detail')";
//     mysqli_query($conn, $query);
//     echo
//         "<script> alert('added'); </script>";
// }

// ?>

<section>
	<div class="container">
		<div class="row">
			
			<div class="col-sm-12 padding-right">

				<?php 
					
					include "connection/database.php";
					try {
					
						$sql = "SELECT * FROM tblproduct";
						$result = $conn->query($sql);
					} catch (Exception $e) {
						echo "Error " . $e->getMessage();
						exit();
					}					
				
				?>
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Features Items</h2>
					<?php if ($result->rowCount() > 0): ?>
							<?php foreach ($result as $p): ?>
					<div class="col-sm-3">
						
								<div class="product-image-wrapper">

									<div class="single-products">
										<div class="productinfo text-center">
										<?= $p['img'] ?>
											<img src="./admin/<?=$p['img'];?>" alt="" />
											<h2>$
												<?= $p['price'] ?>
											</h2>
											<p>
												<?= $p['pName'] ?>
											</p>
											<a href="index.php?add=1&pn=<?= $p['pName'] ?>&pp=<?= $p['price'] ?>&pi=<?= $p['img'] ?>" class="btn btn-default add-to-cart" onclick="addCart(<?= $p['pName'] ?>,)" ><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
									</div>



								</div>

							
					</div>
					<?php endforeach ?>
						<?php endif ?>
				</div><!--features_items-->


			</div>
		</div>
	</div>
</section>