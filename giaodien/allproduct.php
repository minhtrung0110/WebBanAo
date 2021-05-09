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

				<div id="pagination-result" class="col-md-9 col-sm-12 row product ">
                			<input type="hidden" name="rowcount" id="rowcount" />
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
