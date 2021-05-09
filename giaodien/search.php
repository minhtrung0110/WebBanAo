<?php
    //Lấy tất cả sản phẩm
	if(isset($_POST['search_submit']) ){
        $tukhoa=$_POST['search_product']; 
		$query1=" SELECT * from sanpham WHERE TEN_SP LIKE '%$tukhoa%' GROUP BY TEN_SP ORDER BY DON_GIA ASC";
        $query2=" SELECT * from sanpham WHERE TEN_SP LIKE '%$tukhoa%' GROUP BY TEN_SP ORDER BY DON_GIA ASC";
    }
    $getAllProduct=mysqli_query($connect,$query1);
    $img="";$title_result="";
    if(mysqli_fetch_array(mysqli_query($connect,$query2))==null) { $img="./images/no-result.png";$title_result="KHÔNG TÌM THẤY SẢN PHẨM  ";}

   
?>
	<!-- top Products -->
<div class="ads-grid py-sm-5 py-4 all-product ">
            <div class="title_search ">
                <span class="keyword_search">TÌM KIẾM THEO TỪ KHOÁ:  <strong><?php echo $tukhoa ?></strong></span>
            </div>
            <h1 class="no_result_search" ><?php echo $title_result ?> </h1>
            <img class="no_result_search_img"  style="width: 50%;margin: 0 25%;"   src="<?php echo$img?>">
			<div class="row">
				<!-- product left -->
				<div class="col-md-12 col-sm-12 row product ">
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
                </div>
			
			
			</div>
		
	</div>
	<!-- //top products -->