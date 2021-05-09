<style>
html{
	scroll-behavior: smooth;
}
.link{
	padding: 10px 15px;
	background: transparent;
	border:#bccfd8 1px solid;
	border-left:0px;
	cursor:pointer;
	color:#607d8b
}
.disabled{
	cursor:not-allowed;
	color: #bccfd8;
}
.current{
	background: #bccfd8;
}
.first{
	border-left:#bccfd8 1px solid;
}
#pagination{
	margin-top: 20px;

	padding-top: 30px;
	border-top: #F0F0F0 1px solid;
}
#pagination a{
	text-decoration:none;
}
#paginationWrapper{
	width:100%;
	text-align:center
}
.dotSign{
	padding:10px 13px;
	background:none;
	border-right: #bccfd8 1px solid;
}
</style>
<?php
    // Xu Lý Số Liệu HIện Thị Cho Danh Mục//
    $querySize="SELECT DISTINCT KICH_THUOC  FROM `sanpham` ";
    $queryLoai="SELECT DISTINCT LOAI_SP  FROM `sanpham` ";
    $getSize=mysqli_query($connect,$querySize);
    $getLoai=mysqli_query($connect,$queryLoai);
?>
<script>
function getresult(url) {
	$.ajax({
		url: url,
		type: "GET",
		data:  {rowcount:$("#rowcount").val()},
		success: function(data){
			$("#pagination-result").html(data);
		}        
   });
}
</script>
	<!-- top Products -->
<div class="ads-grid py-sm-5 py-4 all-product ">
			<div class="row">
            	<script>
					getresult("giaodien/getresult.php<?php 
						$check=isset($_GET['type']);
						if($check){
							$type=$_GET['type'];
							echo "?type=$type";
						}
					?>");
				</script>
				<!-- product left -->
<<<<<<< HEAD
				<div id="pagination-result" class="col-md-9 col-sm-12 row product ">
                	<input type="hidden" name="rowcount" id="rowcount" />
=======
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
								$notificationhead= '  <div class="percent-sale">-';
								 $notificationfoot='%</div> ';
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
>>>>>>> 6bcf28f1e932c529ac29d6a13ca3d6e05bbe1714
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