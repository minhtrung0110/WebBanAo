<header>
		<div class="row">
			<div class=" col-md-5 col-sm-0" >
				<h5 style="font-style: italic;font-weight: bold;color: #ff0000;">Hotline: 0707624367</h5>
			</div>
			<div class="Logo-Brand col-md-2 col-sm-5" >
				<img src="">
			</div>
			<div class=" col-md-2 col-sm-0" ></div>
			<div class="Account col-md-3 col-sm-5" >
			<button class="login btn btn-outline-success"   ><a  class="login" style="text-decoration: none; color: green;font-weight:bold;"href='giaodien/login.php'>
			<?php if ($_SESSION["login"]==true)
				 echo"Kính Chào Quý Khách"; 
				else echo "Đăng Nhập";
			?></a></button>
			<button class="btn btn-outline-danger register" ><a class="register" style="text-decoration: none; color: red;font-weight:bold;" href='giaodien/register.php'>Đăng Ký Tài Khoản</a> </button>
			
			</div>
			
		</div>
		
		
	</header>