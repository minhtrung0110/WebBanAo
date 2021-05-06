<?php
    //Lấy tất cả sản phẩm trong sale
    if(!isset($_GET['type']) && empty($_GET['type'])){
    $query1=" SELECT od.MA_CTGG,p.MA_SP,ctgg.PHAN_TRAM_GIAM_GIA,p.TEN_SP,p.HINH_ANH_URL,p.DON_GIA from sanpham as p inner join chitietgiamgia as od INNER JOIN chuongtrinhgiamgia as ctgg on p.MA_SP = od.MA_SP and ctgg.MA_CTGG=od.MA_CTGG  GROUP BY p.TEN_SP ORDER BY od.MA_CTGG ASC "; 
   
    }else if(isset($_GET['type'])){
        $id_CTGG=$_GET['type'];
        $query1=" SELECT od.MA_CTGG,p.MA_SP,ctgg.PHAN_TRAM_GIAM_GIA,p.TEN_SP,p.HINH_ANH_URL,p.DON_GIA from sanpham as p inner join chitietgiamgia as od INNER JOIN chuongtrinhgiamgia as ctgg on p.MA_SP = od.MA_SP and ctgg.MA_CTGG=od.MA_CTGG WHERE ctgg.MA_CTGG='$id_CTGG' GROUP BY p.TEN_SP ORDER BY od.MA_CTGG ASC "; 
    }
    $result =mysqli_query($connect,$query1);
?>
	<!-- top Products -->
    <div class="ads-grid py-sm-5 py-4 all-product ">
    <div class="col-md-12 col-sm-12 row product  " >
			<?php 
                while( $row_all_product_sale=mysqli_fetch_array($result) ){
                    $MA_CTGG=$row_all_product_sale['MA_CTGG'];
                    $MA_SP=$row_all_product_sale['MA_SP'];
                    $TEN_SP=$row_all_product_sale['TEN_SP'];
                    $URL=$row_all_product_sale['HINH_ANH_URL'];
                    $giamoi=$row_all_product_sale['DON_GIA'] - $row_all_product_sale['DON_GIA']*$row_all_product_sale['PHAN_TRAM_GIAM_GIA'];             

            ?>
            <div class="col-md-4 col-sm-12 text-center product-content">
                
                  
                    <div class="  product-about">
                        <div class="percent-sale">-<?php echo $row_all_product_sale['PHAN_TRAM_GIAM_GIA']*100; ?>%</div>
                        <img src="images/product-items/<?php echo  $URL ?>" class="img-fluid img-top-sold">
                        <div class="overlay">
                        <a class="info" href="index.php?quanly=detail&id=<?php echo $product_sale['MA_SP'] ?>&sale=<?php echo $MA_CTGG ?>">Chi Tiết</a>
                        </div>
                                                                
                    </div> 
                    <div class="product-infor">
                        <?php echo $TEN_SP; ?>
                            <p style="margin-bottom: 1ex; color: red;font-weight:bold">
                            <?php echo number_format($giamoi) ?>VNĐ
                            <em  style="margin-left:2ex;font-weight:bold">Giá gốc: <span style="text-decoration: line-through;color: #aaa;font-size: 18px; ">
                            <?php echo number_format($row_all_product_sale['DON_GIA']); ?>VNĐ</span></em>
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
    
