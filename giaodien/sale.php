<?php
    //Lấy tất cả sản phẩm trong sale
    if(!isset($_GET['type']) && empty($_GET['type'])){
    $query1=" SELECT od.MA_CTGG,p.MA_SP,p.TEN_SP,p.HINH_ANH_URL,p.DON_GIA from sanpham as p inner join chitietgiamgia as od on p.MA_SP = od.MA_SP  GROUP BY p.TEN_SP ORDER BY od.MA_CTGG ASC "; 
   $result =mysqli_query($connect,$query1);
    }
   
?>
	<!-- top Products -->
    <div class="col-md-12 col-sm-12 content  row " >
			<?php 
                while( $row_all_product_sale=mysqli_fetch_array($result) ){
                    $ID_SP=$row_all_product_sale['MA_SP'];
                    $MA_CTGG=$row_all_product_sale['MA_CTGG'];
                    $getSP="SELECT DON_GIA,TEN_SP,HINH_ANH_URL FROM sanpham WHERE MA_SP='$ID_SP' GROUP BY TEN_SP";
                    $giamgia="SELECT PHAN_TRAM_GIAM_GIA FROM chuongtrinhgiamgia WHERE MA_CTGG= '$MA_CTGG' ";
                    
                    $product_sale=mysqli_fetch_assoc(mysqli_query($connect,$getSP));
                    $tien=mysqli_fetch_assoc(mysqli_query($connect,$giamgia));
                    $giamoi=$product_sale['DON_GIA'] - $product_sale['DON_GIA'] * $tien['PHAN_TRAM_GIAM_GIA'];
                    

            ?>
            <div class="col-md-4 col-sm-12 text-center top-sold-product">
                <div class="  top-sold-items"> 
                    <div class="product-sale">
                        <span class="badge badge-pill badge-danger" style="font-size: 1.3em;font-weight: bold; float:left; margin-top:6px;margin-left:5px "><?php echo $tien['PHAN_TRAM_GIAM_GIA']; ?></span> 
                        <img src="./images/product-items/<?php echo $product_sale['HINH_ANH_URL']; ?>"class="img-fluid img-top-sold" style="height:410px">
                    </div> 

                     <div class="overlay">
                        <a class="info" href="">Chi Tiết</a>
                    </div>

                   
                        <div class="top-sold-infor"><?php echo $product_sale['TEN_SP']; ?><p style="margin-bottom: 1ex;">
                            <b class="price " style="color: red"><?php echo $giamoi ?></b>
                            <em  style="margin-left:2ex">Giá gốc: <span style="text-decoration: line-through;color: #aaa;font-size: 18px; "><?php echo $product_sale['DON_GIA']; ?></span></em>
                            </p>
                        </div>
                        <div class=" button">
                            <button type="button" class="btn btn-outline-primary col-md-7 " style="float: left;"><a>Thêm Vào Giỏ Hàng</a> </button> 
                            <button type="button" class="btn btn-outline-warning col-md-4 " style="float: right;"><a>Mua Ngay</a> </button> 
                        </div> 
             </div>

            </div> 
           
     
        <?php
                }
        ?>

        
     </div>
				
    
