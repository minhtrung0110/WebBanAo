<?php
$name=$_SESSION['customer_name'];
	$query1="SELECT * FROM khachhang WHERE TEN_KH='$name'";
	$result = mysqli_query($connect,$query1);
	$row_customer=mysqli_fetch_assoc($result);
	$id_customer=$row_customer['MA_KH'];
?>

		<div class="user-content row">
			<div class="side-menu col-md-3 sol-sm-12">
				<div class="username ">
					<i class="far fa-user-circle font " ></i>
					 Tài khoản của <br> <span  class="font" style="padding-left: 22%;"><?php echo $row_customer['TEN_KH']  ?></span>
				</div>
				<div class="submenu">
					<ul>
						<li class="subc font" onclick="">Thông tin chung</li>
						<li class="subc font" onclick="document.getElementById('diachi').style.display='block'">Sổ địa chỉ</li>
						<li class="subc font" onclick="document.getElementById('donhang').style.display='block'">Đơn hàng của tôi</li>
					</ul>
				</div>
			</div>
			<div class="information col-md-9 sol-sm-12">
				<div class="information-user">
					<h5 class="font title-infor" >THÔNG TIN CỦA TÔI </h5>
					<p class="font"><span class="font title-infor" >Họ Và Tên:</span> <?php echo $row_customer['TEN_KH']  ?></p>
					<p class="font"><span class="font title-infor " >Email:</span> <?php echo $row_customer['EMAIL']  ?></p>
					<p class="font"><span class="font title-infor " >Giới Tính:</span> <?php echo $row_customer['GIOI_TINH']  ?></p>
					<p class="font"><span class="font title-infor" >Điện Thoại:</span> <?php echo $row_customer['PHONE']  ?></p>
					<p class="font"><span class="font title-infor" >Địa Chỉ:</span> <?php echo $row_customer['DIA_CHI']  ?></p>
				</div>
				<br>
				<button type="button" class="btn btn-outline-primary font " onclick="document.getElementById('id01').style.display='block'">Cập Nhật Thông Tin Cá Nhân</button>
				
				<br>
				<div class="container-fluid content ">		
					<br>
					<div class="oder"  id="donhang" style="display: none;">
						<p class="font"  style="font-weight: bold; font-size: large;">Các Đơn Hàng Đã Đặt:</p>
						<table border="1px solid black" style="width: 100%; text-align: center;" >
							<tr>

								<th class="tr" style="width: 2%;" >STT</th>
								<th class="tr">Mã Đơn Hàng</th>
								<th class="tr">Ngày Đặt</th>
								<th class="tr">Tên Sản Phẩm</th>
								<th class="tr">Tổng Tiền</th>
								<th class="tr" style="width: 10%;">Trạng Thái Đơn Hàng</th>
							</tr>
							<tr>
								<td class="items">1</td>
								<td class="items"><a href="">4562345</a> </td>
								<td class="items">24/11/2020</td>
								<td class="items name-product">Áo Degey Ice Cream blue size:M </td>
								<td class="items">290.000</td>
								<td class="items">đã hoàn thành</td>
							</tr>
							<tr>
								<td class="items">2</td>
								<td class="items"><a href="">4562389</a></td>
								<td class="items">26/11/2020</td>
								<td class="items name-product">Áo Degey Buffterfly black size:M </td>
								<td class="items">320.000</td>
								<td class="items">chờ xử lý</td>
							</tr>
						</table>
					</div>
				</div>
			
			</div>
	
		</div>
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="./giaodien/action_user.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="input-content">
				<label for="fullname"><b>Họ và Tên:</b></label>
				<input class="login-input" type="text" placeholder="VD:Nguyễn Văn A" name="fullname" id="uname" required>

				<label for="psw"><b>Mật Khẩu:</b></label>
				<input class="login-input" type="text" placeholder="Nhập Mật Khẩu:" name="psw"  id="psw"required>

				<label for="email"><b>Email:</b></label>
				<input class="login-input" type="text" placeholder="Nhập Email:" name="email"  id="psw"required>

				<label for="phone"><b>Số Điện Thoại:</b></label>
				<input class="login-input" type="text" placeholder="Nhập Số Điện Thoại:" name="phone"  id="psw"required>

				<label for="gender"><b>Giới Tính:</b></label>
				<input class="login-input" type="text" placeholder="Nhập Giới Tính:" name="gender"  id="psw"required>

				<label for="address"><b>Địa Chỉ:</b></label>
				<input class="login-input" type="text" placeholder="Nhập Địa Chỉ:" name="address"  id="psw"required>
				
    </div>
	<div class="group-button row">
		<div class="col-md-2 col-sm-0"></div>
      <button type="button" class="btn btn-outline-danger col-md-3" onclick="document.getElementById('id01').style.display='none'">Huỷ</button>
	  <div class="col-md-2 col-sm-0"></div>
	  <button type="submit" class="btn btn-success col-md-3"  >Cập Nhật</button>
	  <div class="col-md-2 col-sm-0"></div>
	</div>
  </form>
</div>





 