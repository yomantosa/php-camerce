<?php
include "connection/database.php";
try {

	$sql = "SELECT * FROM tblcart";
	$result = $conn->query($sql);
} catch (Exception $e) {
	echo "Error " . $e->getMessage();
	exit();
}

function update($action, $qty, $cid)
{

	include "connection/config.php";

	$p = $_GET['action'];
	switch ($p) {
		case "plus":
			$q = $qty + 1;
			$query = "UPDATE `tblcart` SET `qty` = '$q' WHERE `tblcart`.`cid` = $cid  ";

			mysqli_query($conn, $query);
			echo
				"<script> alert('Updated'); </script>";
			break;

		case "minus":
			$q = $qty - 1;
			if ($q == 0) {
				remove($cid);
			} else {
				$query = "UPDATE `tblcart` SET `qty` = '$q' WHERE `tblcart`.`cid` = $cid  ";

				mysqli_query($conn, $query);
				echo
					"<script> alert('Updated'); </script>";
			}

			break;
	}
}

function remove($cid)
{
	include "connection/config.php";

	try {
		$sql = "DELETE FROM tblcart WHERE `tblcart`.`cid` = $cid";
		$result = $conn->query($sql);
	} catch (Exception $e) {
		echo "Error " . $e->getMessage();
		exit();
	}

}

function removeAll(){
	include "connection/config.php";

	try {
		$sql = "DELETE * FROM tblcart";
		$result = $conn->query($sql);
	} catch (Exception $e) {
		echo "Error " . $e->getMessage();
		exit();
	}
}



if (isset($_GET['action'])) {
	if ($_GET['action'] == 1) {
		//update qty
		update($_GET['a'], $_GET['qty'], $_GET['cid']);
	} else if ($_GET['action'] == 2) {
		//delete 1
		remove($_GET['cid']);
	} else if ($_GET['action'] == 3) {
		removeAll();
	}
}

?>



<html>

<?php include "components/head.php" ?>

<?php
require 'connection/config.php';
if (!empty($_SESSION["id"])) {
	$id = $_SESSION["id"];
	$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
} else {
}
?>

<body>

	<?php include "./components/header.php" ?>
	<?php include "./components/menu.php" ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php if ($result->rowCount() > 0): ?>
							<?php foreach ($result as $p): ?>
								<tr>
									<td class="cart_product">
										<a href=""><img src="./admin/<?= $p['img']; ?>" alt=""></a>
									</td>
									<td class="cart_description">
										<h4><a href="">
												<?= $p['pname'] ?>
											</a></h4>
									</td>
									<td class="cart_price">
										<p>$
											<?= $p['price'] ?>
										</p>
									</td>
									<td class="cart_quantity">
										<div class="cart_quantity_button">
											<a class="cart_quantity_up"
												href="cart.php?action=1&a=plus&qty=<?= $p['qty'] ?>&cid=<?= $p['cid'] ?>"> +
											</a>
											<input class="cart_quantity_input" type="text" name="quantity" value="1"
												autocomplete="off" size="2">
											<a class="cart_quantity_up"
												href="cart.php?action=1&a=minus&qty=<?= $p['qty'] ?>&cid=<?= $p['cid'] ?>"> -
											</a>
										</div>
									</td>



									<td class="cart_total">
										<p class="cart_total_price">$<?= $p['qty']*$p['price'] ?></p>
									</td>
									<td class="cart_delete">
										<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
									</td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->


	<?php require "components/footer.php" ?>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>

</body>

</html>