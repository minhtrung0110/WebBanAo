<?php
	$connect =new mysqli("localhost","root","","doanweb2");
	$connect -> set_charset("utf8");
?>
<style>
	#cart_container{
		width:80%;
		height:500px;
		background-color:white;
		box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		margin-left:10%;
		position:fixed;
		z-index:10;
		overflow:auto;
		display:none;
		top:150px
	}
	#titleCart{
		width:100%;	/*98.7%*/ 
		height:48px;
		line-height:48px;
		background-color:#4CAF50;
		color:white;
		border-bottom:solid 2px #000
	}
	#productCart{
		width:100%;
		height:400px;
		overflow:auto
	}
	#footerCart{
		width:100%;
		height:48px;
		line-height:48px;
		border-top:solid 2px #000
	}
	#footerCart button{
		float:right;
		margin-top:12px;
		background:none;
		border:solid 2px #000;
		color:#000;
		font-size:16px
	}
	.rowCart{
		width:100%;
		height:100px;
		background-color:none
	}
	.colCart1{
		width:40%;
		height:100px;
		line-height:100px;
		float:left;
	}
	.imgCart img{
		width:13%;
		height:60px;
		margin:20px 0 0 5%;
		float:left;
		border:solid 2px #000
	}
	.nameCart{
		width:79%;
		margin-left:3%;
		float:left;
	}
	.colCart2{
		width:10%;
		height:100px;
		line-height:100px;
		float:left;
		text-align:center;
	}
	.colCart3{
		width:12.5%;
		height:100px;
		float:left;
		text-align:center;
	}
	.colCart4{
		width:15%;
		height:100px;
		line-height:100px;
		float:left;
		text-align:center;
	}
	.colCart4 input[type=text]
	{
		overflow:hidden;
		position:relative;
		height:2.2rem;
		width:1.9rem;
		padding:0;
		text-align:center
	}
	.colCart5{
		width:12.5%;
		height:100px;
		float:left;
		text-align:center;
	}
	.colCart6{
		width:10%;
		height:100px;
		line-height:100px;
		float:left;
		text-align:center;
	}
	.colCart6 a{
		text-decoration:none;
		color:#000;
	}
	.removeP{
		width:30px;
		height:30px;
		line-height:30px;
		font-size:18px;
		margin-top:25px;
		display:inline-block;
		border:solid 2px #000;
		cursor:pointer;
	}
	.XSign{
		width:3%;
        height:15px;
		line-height:15px;
		text-align:center;
		position:absolute;
		margin:0 0 0 97%;
		cursor:pointer
    }
</style>
<?php
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	if(!empty($_POST["cart"])) {
		switch($_POST["cart"]) {
			case "add":
				if(!empty($_POST["quanlity"])) {
					$productByCode = $db_handle->runQuery("SELECT * FROM sanpham WHERE MA_SP='" . $_GET["product"] . "'");
					//Kiem tra cac san pham co giam gia hay ko
					$MA_SP=$_GET["product"];
					$getSale=mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM `chitietgiamgia` WHERE MA_SP='" . $MA_SP ."'"));
					$price=$productByCode[0]["DON_GIA"];
					if($getSale!=NULL){
						$getpercentSale=mysqli_fetch_assoc(mysqli_query($connect,"SELECT PHAN_TRAM_GIAM_GIA FROM chuongtrinhgiamgia WHERE MA_CTGG= '".$getSale['MA_CTGG']."' "));
						$price=$price - $price* $getpercentSale['PHAN_TRAM_GIAM_GIA'];
					}
					else
						$price=$productByCode[0]["DON_GIA"];
					$itemArray = array($productByCode[0]["MA_SP"]=>array('id'=>$MA_SP,'image'=>$productByCode[0]["HINH_ANH_URL"], 'name'=>$productByCode[0]["TEN_SP"], 'size'=>$_GET["size"], 'price'=>$price, 'quanlity'=>$_POST["quanlity"]));
					$check=0;
					
					if(!empty($_SESSION["cart_item"])) {
						if(in_array($productByCode[0]["MA_SP"],array_keys($_SESSION["cart_item"]))) {
							$check=1;
							foreach($_SESSION["cart_item"] as $k => $v) {
								if($productByCode[0]["MA_SP"] == $k) {
									if(empty($_SESSION["cart_item"][$k]["quanlity"])) {
										$_SESSION["cart_item"][$k]["quanlity"] = 0;
									}
									$_SESSION["cart_item"][$k]["quanlity"] += $_POST["quanlity"];
								}
							}
						} else {
							$_SESSION["cart_item"] += $itemArray;
						}
					} else {
						$_SESSION["cart_item"] = $itemArray;
					}
				}
			break;
			case "remove":
				if(!empty($_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
						if($_POST["product"] == $k)
							unset($_SESSION["cart_item"][$k]);				
						if(empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
					}
				}
			break;
			case "empty":
				unset($_SESSION["cart_item"]);
			break;	
	}
}
    $total_price = "";
	if(isset($_SESSION["cart_item"]))
		$total_price = 0;
?>
<script>
	function checkLogin(){
		var check=<?php
			if(isset($_SESSION['login'])){
				if($_SESSION['login']==true){
					if(isset($_SESSION["cart_item"]))
						echo 0;
					else
						echo 2;
				}
			}
			else echo 1;
		?>;
		switch(check){
			case 0:
				document.getElementById("delInfor_container").style.display="block";
				break;
			case 1:
				alert("Vui lòng đăng nhập");
				break;
			case 2:
				alert("Giỏ hàng rỗng");
				break;
		}
	}
	function hideCartContainer(){
		document.getElementById("cart_container").style.display="none";
	}
</script>
<div id="cart_container">
	<div class="XSign" id="XSign_cart" style="color:white; text-align:right" onclick="hideCartContainer()">x</div>
    <div id="titleCart">
        <div style="width:40%; float:left; text-align:center"><b>Sản phẩm</b></div>
        <div style="width:10%; float:left; text-align:center"><b>Size</b></div>
        <div style="width:12.5%; float:left; text-align:center"><b>Đơn giá</b></div>
        <div style="width:15%; float:left; text-align:center"><b>Số lượng</b></div>
        <div style="width:12.5%; float:left; text-align:center"><b>Thành tiền</b></div>
        <div style="width:10%; float:left"><b></b></div>
    </div>
    <div id="productCart">
    	<?php		
			if(isset($_SESSION["cart_item"]))
				foreach ($_SESSION["cart_item"] as $item){
					$item_price = $item["quanlity"]*$item["price"];
					$total_price += $item_price;
	
		?>
        <div class="rowCart">
        	<div class="colCart1">
            	<div class="imgCart"><img src="images/product-items/<?php echo $item["image"]; ?>" /></div>
                <div class="nameCart"><?php echo $item["name"]; ?></div>
            </div>
            <div class="colCart2"><?php echo $item["size"]; ?></div>
        	<div class="colCart3"><div style="margin-top:25px"><?php echo $item["price"]; ?></div><div>VNĐ</div></div>
            <div class="colCart4"><?php echo $item["quanlity"]; ?></div>
        	<div class="colCart5"><div style="margin-top:25px;"></div><?php echo $item_price; ?><div>VNĐ</div></div>
        	<div class="colCart6">
                <form action="<?php echo  $_SERVER['REQUEST_URI']; ?>" method="POST">
                	<input type="hidden" name="cart" value="remove">
                    <input type="hidden" name="product" value="<?php echo $item["id"] ?>" />
                    <input type="submit" class="removeP" value="X" />
                </form>
            </div>
        </div>
        <?php
				}
		?>
    </div>
    <div id="footerCart">
        <div style="width:50%; float:left">
            <div style="margin:0 1% 0 20%; float:left"><b>Tổng đơn: <?php if($total_price!="") echo "$total_price VNĐ"; else echo $total_price; ?></b></div>
            <div style="float:left" id="totalBill"></div>
        </div>     
        <div style="width:50%; float:left">
            <button style="margin-right:5%; height:25px; line-height:25px" onclick="checkLogin()">Đặt hàng</button>
            <form action="<?php echo  $_SERVER['REQUEST_URI']; ?>" method="POST">
            	<input type="hidden" name="cart" value="empty">
            	<button type="submit" style="margin-right:5%; height:25px; line-height:25px" >Làm trống</button>
            </form>
        </div>
    </div>
</div>
<script>
	if(<?php 
		if(isset($_POST["cart"]) && $_POST["cart"]!="add")
			echo 1; 
		else 
			echo 0; 
	?>==1)
		document.getElementById("cart_container").style.display="block";
	else
		document.getElementById("cart_container").style.display="none";
</script>