<?php
	// Thiet Lap muoi Gio
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	
	$datemax=date_create(date('d-m-Y'));
	$datemin=date_create(date('d-m-Y'));
	date_modify($datemin,"-1 month");
	$min=date_format($datemin,'Y-m-d');
	$max=date_format($datemax,'Y-m-d');
	
	$query1="SELECT MA_PN FROM phieunhap WHERE NGAY_NHAP BETWEEN '".$min."' AND '".$max."' ORDER BY NGAY_NHAP DESC LIMIT 1  ";
	$getMaPN=mysqli_query($connect,$query1);
	$MaPN=mysqli_fetch_assoc($getMaPN);
	$query2="SELECT DISTINCT MA_SP FROM chitietphieunhap WHERE MA_PN ='".$MaPN['MA_PN']."' ORDER BY  MA_SP ASC";//DUNG TOI DAY
	$getMaSP=mysqli_query($connect,$query2);
	$ArrayMaSP=array();
	$i=0;
	while($row_MaSP=mysqli_fetch_array($getMaSP,1)){
		//$ArrayMaSP[$i++]=$MaSP['MA_SP'];
		//echo $MASP['MA_SP'];
		$ArrayMaSP[$i++]= $row_MaSP['MA_SP'];
	}
	$query3="SELECT DISTINCT TEN_SP FROM sanpham WHERE   MA_SP BETWEEN '".$ArrayMaSP['0']."' AND '".$ArrayMaSP[$i-1]."' ORDER BY  MA_SP DESC LIMIT 4 ";
   $result =mysqli_query($connect,$query3);
?>

<div class="container-fluid content-product">

<div class="container-fluid new-arrival">
		<p class="text-center title">SẢN PHẨM MỚI</p>
		<hr class="hr-arrival">
		<div class="row new-arrival-content " id="arrival">
        <?php
            while($row_new_product=mysqli_fetch_array($result)){
				$re_url=mysqli_query($connect,"SELECT HINH_ANH_URL FROM sanpham WHERE TEN_SP='".$row_new_product['TEN_SP']."'");
				$URL=mysqli_fetch_assoc($re_url);
				$re_dongia=mysqli_query($connect,"SELECT DON_GIA FROM sanpham WHERE TEN_SP='".$row_new_product['TEN_SP']."'");
				$DONGIA=mysqli_fetch_assoc($re_dongia);

		?>	
			<div class="col-md-3 col-sm-12   text-center new-arrival-product" >		

				<div class="  new-arrival-items">
					<img src="images/product-items/<?php echo $URL['HINH_ANH_URL'];?>" class="img-fluid img-new-arrival">
					<div class="overlay">
					<a class="info" href="product.html">Chi Tiết</a>
					</div>
															
				</div>
				<div class="new-arrival-infor"   >
						<?php  echo $row_new_product['TEN_SP']; ?>
						<p>
						<b class="price " style="color: red"><?php  echo $DONGIA['DON_GIA']; ?>đ</b>
					</p>		
					<div class= "row"  >	
					<button type="button" class="btn btn-outline-success col-md-7 col-sm-7" >Thêm Vào Giỏ </button>
					<button type="button" class="btn btn-outline-warning col-md-4 col-sm-4"  >Mua Ngay</button>
					</div>
				</div>	
				
			</div>
            <?php
              
			
            }
            ?>
		</div>
		
	</div>
		<br>

		<!--- the ảnh gi do-->
	<?php
	$query4="SELECT p.MA_SP,p.TEN_SP,SUM(od.SO_LUONG) AS TotalQuantity ,p.DON_GIA,p.HINH_ANH_URL 
	from sanpham as p inner join chitiethoadon as od on p.MA_SP = od.MA_SP 
	GROUP BY p.TEN_SP ORDER BY SUM(od.SO_LUONG) DESC LIMIT 6";
	$getBestSelling= mysqli_query($connect,$query4);

	?>
	<div class="container-fluid  top-sold row">
		<p class="text-center title ">SẢN PHẨM BÁN CHẠY</p>
		<hr class="hr-arrival">
		<br>
		<div class="col-md-1 col-sm-1"></div>
		<div class="col-md-10 col-sm-10 row top-sold-content " id="bestseller">
		<?php
            while($row_best_seller=mysqli_fetch_array($getBestSelling)){
				$best_url=mysqli_query($connect,"SELECT HINH_ANH_URL FROM sanpham WHERE TEN_SP='".$row_best_seller['TEN_SP']."'");
				$URL_best=mysqli_fetch_assoc($best_url);
				$best_dongia=mysqli_query($connect,"SELECT DON_GIA FROM sanpham WHERE TEN_SP='".$row_best_seller['TEN_SP']."'");
				$DONGIA_best=mysqli_fetch_assoc($best_dongia);

		?>	
			<div class="col-md-4 col-sm-12 text-center top-sold-product">
				<div class="  top-sold-items">
					<img src="images/product-items/<?php echo $URL_best['HINH_ANH_URL'] ?>" class="img-fluid img-top-sold">
					<div class="overlay">
					<a class="info" href="product.html">Chi Tiết</a>
					</div>
															
				</div>
				<div class="top-sold-infor">
					<?php echo $row_best_seller['TEN_SP'] ?>
						<p style="margin-bottom: 1ex;">
					
						<b class="price " style="color: red"><?php echo $DONGIA_best['DON_GIA']  ?> </b>
					</p>			
					<div class=" button">
						<button type="button" class="btn btn-outline-primary col-md-7 " style="float: left;"><a href="">Thêm Vào Giỏ Hàng</a> </button>
						<button type="button" class="btn btn-outline-warning col-md-4 ml-4" style="float: right;"><a href="">Mua Ngay</a> </button>
					</div>
					
				</div>	
			</div>
			<?php
			}
			?>
		</div>
		<div class="col-md-1 col-sm-1"></div>

			
		

		<button type="button" class="btn btn-outline-warning extendend"><a href="tops-product-index.html"> Xem Thêm</a> </button>

		<br>
	
	    </div>
    </div>