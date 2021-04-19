<?php
    $query="SELECT TEN_SP,DON_GIA,HINH_ANH_URL FROM sanpham WHERE LOAI_SP='Tee'";
    $count=0;
    $result =mysqli_query($connect,$query);
?>

<div class="container-fluid content-product">

<div class="container-fluid new-arrival">
		<p class="text-center title">SẢN PHẨM MỚI</p>
		<hr class="hr-arrival">
		<div class="row new-arrival-content " id="arrival">
        <?php
            while($row_new_product=mysqli_fetch_array($result)){
                $count++;
		?>	
			<div class="col-md-3 col-sm-12   text-center new-arrival-product">		

				<div class="  new-arrival-items">
					<img src="images/products/new-arrival01.jpg" class="img-fluid img-new-arrival">
					<div class="overlay">
					<a class="info" href="product.html">Chi Tiết</a>
					</div>
															
				</div>
				<div class="new-arrival-infor"  style="float:left">
						<?php  echo $row_new_product['TEN_SP']; ?>
						<p>
					
						<b class="price " style="color: red;float:left"><?php  echo $row_new_product['DON_GIA']; ?>đ</b>
					</p>			

					<button type="button" class="btn btn-outline-warning" >Mua Ngay</button>

				</div>	
				
			</div>
            <?php
                if ($count==4) break;
            }
            ?>
		</div>
		
	</div>
		<br>

		<!--- the ảnh gi do-->
		
	<div class="container-fluid  top-sold row">
		<p class="text-center title ">SẢN PHẨM BÁN CHẠY</p>
		<hr class="hr-arrival">
		<br>
		<div class="col-md-1 col-sm-1"></div>
		<div class="col-md-10 col-sm-10 row top-sold-content " id="bestseller">
				
	<div class="col-md-4 col-sm-12 text-center top-sold-product">
				<div class="  top-sold-items">
					<img src="images/products/topsold01.jpg" class="img-fluid img-top-sold">
					<div class="overlay">
					<a class="info" href="product.html">Chi Tiết</a>
					</div>
															
				</div>
				<div class="top-sold-infor">
					BOBUI BIG-LOGO-FIRE YELLOW
						<p style="margin-bottom: 1ex;">
					
						<b class="price " style="color: red">550.000 đ</b>
					</p>			
					<div class=" button">
						<button type="button" class="btn btn-outline-primary col-md-7 " style="float: left;"><a href="">Thêm Vào Giỏ Hàng</a> </button>
						<button type="button" class="btn btn-outline-warning col-md-4 ml-4" style="float: right;"><a href="">Mua Ngay</a> </button>
					</div>
					
				</div>	
			</div>
		</div>
		<div class="col-md-1 col-sm-1"></div>

			
		

		<button type="button" class="btn btn-outline-warning extendend"><a href="tops-product-index.html"> Xem Thêm</a> </button>


		<br>

	
	    </div>
    </div>