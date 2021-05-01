
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Online Login Form Responsive Widget Template :: w3layouts</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Online Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
<!-- //online-fonts -->
</head>
<body>
<!-- main -->
<?php
session_start();
$mess_error="";
    if(isset($_POST['login-admin']) && !empty($_POST['login-admin']) ){
        $name=$_POST['name'];
        $password=$_POST['password'];
       // $password=md5($password);
        include("../db/MySQLConnect.php");
        $query="SELECT TEN_DANG_NHAP,MAT_KHAU FROM `taikhoan` WHERE MA_GROUP_QUYEN=2 OR MA_GROUP_QUYEN=1 GROUP BY TEN_DANG_NHAP";
        $result=mysqli_query($connect,$query);
        $check=false;
        while($data=mysqli_fetch_array($result) ){
                if($data['TEN_DANG_NHAP']==$name && $data['MAT_KHAU']==$password) {$check=true; $name=$data['TEN_DANG_NHAP'];}
        }        
        if( $check==true ){
			$_SESSION['admin_name']=$name;
			$_SESSION['admin_login']=true;
        header("Location:./dashboard/index.php");

		}
        else  {
			$mess_error="TÊN ĐĂNG NHẬP HOẶC MẬT KHẨU NHẬP SAI!!";
			$_SESSION['admin_login']=false;
		}
    }


?>
<div class="center-container">
	<!--header-->
	<div class="header-w3l">
		<h1>ĐĂNG NHẬP QUẢN TRỊ HỆ THỐNG</h1>
	</div>
	<!--//header-->
	<div class="main-content-agile">
		<div class="sub-main-w3">	
			<div class="wthree-pro">
				<h2>KÍNH CHÀO BẠN !</h2>
			</div>
			<form action="" method="post">
				<div class="pom-agile">
					<input placeholder="Nhập Người Dùng" name="name" class="user" type="text" required="">
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
				</div>
				<div class="pom-agile">
					<input  placeholder="Nhập Mật Khẩu" name="password" class="pass" type="password" required="">
					<span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
				</div>
				<div class="sub-w3l">
					<div class="right-w3l">
						<input type="submit" name="login-admin" value="Đăng Nhập">
                       
					</div>
                    <span style="font-weight:bold;font-size:18px;color:#ff0000"><?php echo $mess_error  ?></span>
				</div>
			</form>
		</div>
	</div>
	<!--//main-->
	
</div>
</body>
</html>