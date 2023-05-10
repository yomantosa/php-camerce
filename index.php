<!DOCTYPE html>

<?php
$page = "home.php";
$banner = "false";
$slideshow = "false";
if (isset($_GET['p'])) {
  $p = $_GET['p'];
  switch ($p) {
    case "shop": 
        $page = "shop.php";
        $banner = "false";
        $slideshow = "true";
        break;
      
    case "contact": 
        $page = "contact.php";
        $banner = "false";
        $slideshow = "false";
        break;
      
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
  <?php include "./components/slideshow.php" ?>
    <section>
      <div class="container">
        <div class="row">
          <?php require $page ?>
        </div>
      </div>
    </section>

  <?php require "components/footer.php" ?>

  <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>

</body>

</html>