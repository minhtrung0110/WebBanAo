<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Three Clothing</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="index.css">

	
</head>
<body>
<div class="container-fluid index " id="index" >
     <!--HEADER-->
    <?php require("giaodien/header.php"); ?>
	 <!--NAVIGATION-->
	<?php require("giaodien/Navigation.php"); ?>
	
				


    <!--CONTENT-->
    <div class="container-fluid content">
        <!--BANNER-->
        <?php require("giaodien/slideshow_banner.php"); ?>
	



    </div>


    <!--FOOTER-->
    <?php require("giaodien/footer.php"); ?>

</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/slide.js"></script>
<script src="style.js"></script>
<script src="js/index.js"></script>

</body>

</html>
