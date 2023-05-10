<?php

$mysqli = new mysqli("localhost", "root", "", "mvc_db");

// Check connection
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	exit();
}

$sql = "SELECT * FROM tblslideshow";
$result = mysqli_query($mysqli, $sql);
$num = mysqli_num_rows($result);

?>

<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php for ($i = 0; $i < $num; $i++) { ?>
							<li data-target="#slider-carousel" data-slide-to="<?php $i ?>"
								class="<?php ($i == 0) ? "active" : "" ?>"></li>
						<?php } ?>
					</ol>

					<div class="carousel-inner">
						<?php $i=1; 
							while ($row=mysqli_fetch_array($result)) { ?>
							<div class="item <?= ($i == 1) ? "active" : "" ?>">

								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>
										<?= $row['title'] ?>
									</h2>
									<p>
										<?= $row['detail'] ?>
									</p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="./admin/<?= $row['ssimg']; ?>" class="girl img-responsive" alt="" />
								</div>


							</div>
						<?php 
						$i++;
					} ?>
					</div>
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>

			</div>
		</div>
	</div>
</section><!--/slider-->