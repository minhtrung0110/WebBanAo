<?php
    //Lấy tất cả sản phẩm
	if(!isset($_GET['type']) && empty($_GET['type'])){
		$query1=" SELECT * from sanpham GROUP BY TEN_SP ORDER BY DON_GIA ASC";	   
		}else if(isset($_GET['type']) ){// lay theo loai
			$id_loai=$_GET['type'];
			$query1=" SELECT * from sanpham WHERE LOAI_SP='$id_loai' GROUP BY TEN_SP ORDER BY DON_GIA ASC"; 
		}
    $getAllProduct=mysqli_query($connect,$query1);
    // Xu Lý Số Liệu HIện Thị Cho Danh Mục//
    $querySize="SELECT DISTINCT KICH_THUOC  FROM `sanpham` ";
    $queryLoai="SELECT DISTINCT LOAI_SP  FROM `sanpham` ";
    $getSize=mysqli_query($connect,$querySize);
    $getLoai=mysqli_query($connect,$queryLoai);
?>
	<!-- top Products -->
<div class="ads-grid py-sm-5 py-4 all-product ">
			<div class="row">
				<!-- product left -->
				<div class="col-md-9 col-sm-12 row product ">
                    <?php
                        while($row_all_product=mysqli_fetch_array($getAllProduct)) {
							$MA_SP=$row_all_product['MA_SP'];
							$nameproduct=$row_all_product['TEN_SP'];
                            $price=$row_all_product['DON_GIA'];
                            $url=$row_all_product['HINH_ANH_URL'];
								//Kiem tra cac san pham co giam gia hay ko
							$getSale=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `chitietgiamgia` WHERE MA_SP='$MA_SP'"));
							$idsale="";$notificationfoot="";$notificationhead="";$notificationpercent="";
							if($getSale!=null){
								$getpercentSale=mysqli_fetch_assoc(mysqli_query($connect,"SELECT PHAN_TRAM_GIAM_GIA FROM chuongtrinhgiamgia WHERE MA_CTGG= '".$getSale['MA_CTGG']."' "));
								$price=$price - $price* $getpercentSale['PHAN_TRAM_GIAM_GIA'];
								$idsale=$getSale['MA_CTGG'];
								//Hien BadGe thong bao % giam gia
								$notificationhead= '<span class="badge badge-pill badge-danger" 
								style="font-size: 1.3em;font-weight: bold; float:left; margin-top:6px;margin-left:5px ">-';
								 $notificationfoot='%</span> ';
								 $notificationpercent=$getpercentSale['PHAN_TRAM_GIAM_GIA']*100;

							}
                            
                    ?>
                    <div class="col-md-4 col-sm-12 text-center product-content ">
                    <div class="  product-about">
						<?php  echo $notificationhead; echo $notificationpercent; echo $notificationfoot; ?>
                        <img src="images/product-items/<?php echo $url ?>" class="img-fluid img-top-sold">
                        <div class="overlay">
                        <a class="info" href="index.php?quanly=detail&id=<?php echo $row_all_product['MA_SP'] ?>&sale=<?php echo $idsale ?>">Chi Tiết</a>
                        </div>
                                                                
                    </div>
                    <div class="product-infor">
                        <?php echo $nameproduct ?>
                            <p style="margin-bottom: 1ex;">
							
                            <b class="price " style="color: red"><?php echo number_format($price) ?> VNĐ</b>
                        </p>			
                        <div class=" product-button">
                            <button type="button" class="btn btn-outline-primary col-md-7 " style="float: left;">Thêm Vào Giỏ Hàng</button>
                            <button type="button" class="btn btn-outline-warning col-md-4 ml-4" style="float: right;">Mua Ngay</button>
                        </div>
                        
                    </div>	
			        </div>
                    <?php
                        }

                    ?>
                </div>
				<!-- product right -->
				<div class="col-md-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Search Here..</h3>
							<form action="#" method="post">
								<input type="search" placeholder="Product name..." name="search" required="">
								<input type="submit" value=" ">
							</form>
						</div>
						<!-- price -->
						<div class="range border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Khoảng Giá</h3>
							<div class="w3l-range">
								<ul>
									<li>
										<a href="#">Under $1,000</a>
									</li>
									<li class="my-1">
										<a href="#">$1,000 - $5,000</a>
									</li>
									<li>
										<a href="#">$5,000 - $10,000</a>
									</li>
									<li class="my-1">
										<a href="#">$10,000 - $20,000</a>
									</li>
									<li>
										<a href="#">$20,000 $30,000</a>
									</li>
									<li class="mt-1">
										<a href="#">Over $30,000</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //price -->
						<!-- discounts 
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Giảm Giá</h3>
							<ul>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">5% or More</span>
								</li>
							
							</ul>
						</div>
						 //discounts -->
						<!-- reviews -->
					
						<!-- electronics -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Loại Sản Phẩm</h3>
							<ul>
                                <?php
                                    while($row_type_product=mysqli_fetch_array($getLoai)){ 
                                ?>
								<li>
									<input type="checkbox" class="checked">
									<span class="span"><?php echo $row_type_product['LOAI_SP']  ?></span>
								</li>
                                <?php
                                    }
                                ?>							
							</ul>
						</div>
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Kích Thước</h3>
							<ul>
                                <?php
                                    while($row_size_product=mysqli_fetch_array($getSize)){ 
                                ?>
								<li>
									<input type="checkbox" class="checked">
									<span class="span"><?php echo $row_size_product['KICH_THUOC']  ?></span>
								</li>
                                <?php
                                    }
                                ?>							
							</ul>
						</div>
					
						<!-- arrivals -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">New Arrivals</h3>
							<ul>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Last 30 days</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Last 90 days</span>
								</li>
							</ul>
						</div>
						<!-- //arrivals -->
					
					</div>
					<!-- //product right -->
				</div>
			</div>
		
	</div>
	<!-- //top products -->