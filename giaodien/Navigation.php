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
                    <a class="dropdown-item " href="#"><i class="fas fa-circle"></i>Hoodie</a> 
                    <a class="dropdown-item" href="#"><i class="fas fa-circle"></i>Tee</a>
                    <a class="dropdown-item " href="#"><i class="fas fa-circle"></i>Hoodie</a> 
                    <a class="dropdown-item" href="#"><i class="fas fa-circle"></i>Tee</a>
                
                
                </div>
                
                </li>
            
            
                <li class="nav-item dropdown">
                <a class="nav-link"  id="navbarDropdown" onclick="document.getElementById('sale').style.display='block'">
                    KHUYẾN MÃI
                </a>
                <div class="dropdown-content" id="sale">
                    <a class="dropdown-item " href="#"><i class="fas fa-circle"></i>Hoodie</a> 
                    <a class="dropdown-item" href="#"><i class="fas fa-circle"></i>Tee</a>
                    <a class="dropdown-item " href="#"><i class="fas fa-circle"></i>Hoodie</a> 
                    <a class="dropdown-item" href="#"><i class="fas fa-circle"></i>Tee</a>
                
                
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