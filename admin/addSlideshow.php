<?php
$page = "tblSlideshow.php";
if (isset($_GET['p'])) {
  $p = $_GET['p'];
  switch ($p) {
	case "insert": 
        $page = "index.php";
        break;

    case "update": 
        $page = "update.php";
        break;
      
    case "delete": 
        $page = "delete.php";
        break;
      
  }
}
?>
<!DOCTYPE html>
<html>

<?php include "components/head.php" ?>

<body>
<div class="wrapper">


	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="jquery-3.2.1.min.js"></script>

	<?php include "components/header.php" ?>
  	<?php include "components/sidebar.php" ?>

	<div><?php require "action/slideshow/".$page ?></div>
	

	

	<?php include "components/footer.php" ?>
</div>
<!-- ./wrapper -->


</body>
</html>