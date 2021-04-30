<?php
session_start();
include("db/MySQLConnect.php");
if(isset($_SESSION['login'])) $checklogin = $_SESSION['login'];

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
    <link rel="stylesheet" type="text/css" href="css/index_product.css">
    <link rel="stylesheet" type="text/css" href="css/user.css">
    <link rel="stylesheet" type="text/css" href="css/allproduct.css">

	
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
        <?php 
        if(!isset($_GET['id'])){
         require("giaodien/slideshow_banner.php"); 
        #Product in INDEX.PHP
         require("giaodien/index_product.php"); }
         else if($_GET['id']=='user'){
             require("giaodien/user.php");
         }
         else if($_GET['id']=='product'){
             require("giaodien/allproduct.php");
         }
        
        ?>
	



    </div>


    <!--FOOTER-->
    <?php require("giaodien/footer.php");  ?>

</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/slide.js"></script>
<!-- thong bao trang thai dang nhap-->
<script>
var login = "<?php echo $checklogin; ?>" ;
if(login==0){
    alert("Đăng Nhập Thất Bại!Vui lòng nhập đúng Mật Khẩu. Nếu bạn chưa có Tài Khoản Vui Lòng Đăng Ký Tài Khoản?");

}else{
    alert("Đăng Nhập Thành Công !!!")};
</script>

</body>

</html>
<?php

?>
