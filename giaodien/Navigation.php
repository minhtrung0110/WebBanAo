<?php 
                  $getLoaiSP=mysqli_query($connect,"SELECT DISTINCT LOAI_SP FROM sanpham;");
                  //$countLoai=mysqli_fetch_row($connect,"SELECT DISTINCT LOAI_SP FROM sanpham;");
                  $getLoaiSPSale=mysqli_query($connect,"SELECT DISTINCT LOAI_SP FROM sanpham;");// Dòng này khi co giam gia se lấy ở đó
?>
<nav class="navbar navbar-expand-lg navbar-light menu " id="navbar">

		<img src="" class="navbar-brand img-fluid  ">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon" ></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link active" href="index.html" style="color: #fff">TRANG CHỦ <span class="sr-only">(current)</span></a>
                </li>
               
                <li class="nav-item dropdown fullmenu" >
                <a class="nav-link " onclick="" id="navbarDropdown">
                SẢN PHẨM
                </a>
				        <div class="dropdown-content" id="product">
                <?php
                  $i=1;
                  while ($row_category= mysqli_fetch_array($getLoaiSP)){
                ?>
                    <a class="dropdown-item " href="index.php?id=<?php echo 'cate_product_'.$i  ?>"><i class="fas fa-circle"></i><?php echo $row_category['LOAI_SP'] ?></a> 
                <?php
                $i++;
                  }
                ?>
                </div>
                
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link"  id="navbarDropdown" onclick="document.getElementById('sale').style.display='block'">
                    KHUYẾN MÃI
                </a>
                <div class="dropdown-content" id="sale">
                <?php
                  $i=1;
                  while ($sale_category= mysqli_fetch_array($getLoaiSPSale)){
                ?>
                    <a class="dropdown-item " href="index.php?id=<?php echo 'cate_sale_'.$i  ?>"><i class="fas fa-circle"></i><?php echo $sale_category['LOAI_SP'] ?></a> 
                <?php
                $i++;
                  }
                ?>
                </div>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">TIN TỨC</a>
                </li>
		    </ul>
			  
		  <button class="btn btn-outline-success my-2 my-sm-0 openBtn  " id="navbarDropdown" type="submit" onclick="openSearch()"><i class="fa fa-search"></i></button>
		  <div class="nav-item icon" style="margin-right: 5ex;">
			  <a  class="icon-button" href="#"><i class="fas fa-cart-plus"></i></a>
			  
		  </div>
			  </div>
		  

	</nav>
      <!--Search-->
      <div id="myOverlay" class="overlaysearch">
			<span class="closebtn" onclick="closeSearch()" title="Đóng Tìm Kiếm">×</span>
			<div class="overlay-content">
			  <form action="#">
				<input type="text" style="font-weight: bold; color: #333;" placeholder="Tìm Kiếm..." name="search">
				<button type="submit"><i class="fa fa-search  text-light"></i></button>
			  </form>
			</div>
		  </div>	