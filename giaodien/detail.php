<script>
	var selectedSize=null
	function adjustQuanlity(obj){
		var op=obj.value;
		var txQuanlity=document.getElementById("txQuanlity_detail");
		if(op=='+'){
			if(txQuanlity.value<20)
				txQuanlity.value++;
		}
		else
			if(txQuanlity.value>1)
				txQuanlity.value--;
	}
	function validateQuanlity(obj){
		if(obj.value>20)
			obj.value=20;
		if(obj.value<1)
			obj.value=1;				
	}
	var selectedSize;
	function selectSize(obj){
		selectedSize=obj.value;
	}
	function changeFocus(size){
		if(size.value=='S'){
			document.getElementById("btSizeS_detail").style.backgroundColor="#343a40";
			document.getElementById("btSizeS_detail").style.color="#FFF"
			document.getElementById("btSizeM_detail").style.backgroundColor="";
			document.getElementById("btSizeM_detail").style.color="#343a40"
			document.getElementById("btSizeL_detail").style.backgroundColor="";
			document.getElementById("btSizeL_detail").style.color="#343a40"
		}
		if(size.value=='M'){
			document.getElementById("btSizeS_detail").style.backgroundColor="";
			document.getElementById("btSizeS_detail").style.color="#343a40"
			document.getElementById("btSizeM_detail").style.backgroundColor="#343a40";
			document.getElementById("btSizeM_detail").style.color="#FFF"
			document.getElementById("btSizeL_detail").style.backgroundColor="";
			document.getElementById("btSizeL_detail").style.color="#343a40"
		}
		if(size.value=="L"){
		document.getElementById("btSizeS_detail").style.backgroundColor="";
		document.getElementById("btSizeS_detail").style.color="#343a40"
		document.getElementById("btSizeM_detail").style.backgroundColor="";
		document.getElementById("btSizeM_detail").style.color="#343a40"
		document.getElementById("btSizeL_detail").style.backgroundColor="#343a40";
		document.getElementById("btSizeL_detail").style.color="#FFF"
		}
	}
</script>
<?php
if(isset($_GET['id']) ) $id=$_GET['id'];
$getdetail="SELECT * FROM sanpham WHERE MA_SP=$id ";
$resultDetail=mysqli_query($connect,$getdetail);
$row_product_detail=mysqli_fetch_assoc($resultDetail);
$tensp=$row_product_detail['TEN_SP'];
$percentSale=0;
if(isset($_GET['sale']) && !empty($_GET['sale']) ){
	$IDsale=$_GET['sale'];
	$getSale=mysqli_fetch_assoc(mysqli_query($connect,"SELECT PHAN_TRAM_GIAM_GIA FROM chuongtrinhgiamgia WHERE MA_CTGG= '$IDsale' "));
	$percentSale=$getSale['PHAN_TRAM_GIAM_GIA'];
}
$price =$row_product_detail['DON_GIA']-$row_product_detail['DON_GIA']*$percentSale;
$getTbSize="SELECT KICH_THUOC,SO_LUONG FROM sanpham WHERE TEN_SP='".$tensp."'";
$resultTbSize=mysqli_query($connect,$getTbSize);
/*Kiem tra còn hàng hay không*/
$sum=0;
$resultTbGia=mysqli_query($connect,$getTbSize);
while($array_Gia=mysqli_fetch_array($resultTbGia)){
	$size=$array_Gia['KICH_THUOC'];
	$quanlityOfSize["$size"]=$array_Gia['SO_LUONG'];
	$disableSize["$size"]="";
	if($quanlityOfSize["$size"]==0)
		$disableSize["$size"]="disabled";
    $sum+=$array_Gia['SO_LUONG'];
}
$disable="";$notification="";
if ( $sum > 0)  $checksoluong="Còn Hàng"; else {$checksoluong="Hết Hàng";$disable="disabled"; $notification="Sản Phẩm Đã Hết! Xin Quý Khách Vui Lòng Chọn Sản Phẩm Khác !";}

?>
<script>
	function checkQuanlity(){
		if(selectedSize==null){
			alert("Vui lòng chọn size");
			return 0;
		}
		var quanlityInput=document.getElementById("txQuanlity_detail").value;
		switch(selectedSize){
			case 'S':
				if(quanlityInput><?php echo $quanlityOfSize["S"] ?>)
					alert("Size này chỉ còn <?php echo $quanlityOfSize["S"] ?> sản phẩm");
				break;
			case 'M':
				if(quanlityInput><?php echo $quanlityOfSize["M"] ?>)
					alert("Size này chỉ còn <?php echo $quanlityOfSize["M"] ?> sản phẩm");
				break;
			case 'L':
				if(quanlityInput><?php echo $quanlityOfSize["L"] ?>)
					alert("Size này chỉ còn <?php echo $quanlityOfSize["L"] ?> sản phẩm");
				break;
		}
	}
</script>
<div  class="detail">
	<div style="margin: 30px 0;" class="row chitiet">
		<div class="col-md-6 col-sm-12 images" style="padding-right: 5ex;">
			<div class="wrap"  style="padding-right: 5ex;">
				<img id="myImgDetail" class="item img-fluid" src="images/product-items/<?php  echo $row_product_detail['HINH_ANH_URL'] ?>" id="img-product-detail" >
				<strong>Phóng To:</strong>
                <div id="myResultIMGDetail" class="img-zoom-result"></div>	
			</div>


				
		</div>
		<div class="col-md-6 col-sm-12" style="padding-right: 6ex;">
				<div class="text-center titleproduct"><?php  echo $row_product_detail['TEN_SP'] ?></div>
				<div class="price-chitiet">
					<span>Giá bán:</span>
					<strong  style="color: red;font-size: 29px" > <?php  echo number_format($price) ?> VNĐ</strong>
					
				</div>
				<div class="possibility-chitiet">
					<span style="    color: #5F4C0B;font-weight: bold;">Tình trạng:</span>
					<strong class="warn" ><?php echo $checksoluong ?></strong>( Còn: <?php echo $sum ?> sản phẩm ) 
				</div>
				<hr style=" boder: 2ex solid rgb(19, 17, 17); margin: 2ex 3px;">
				<div class="details">
					<span style="text-decoration: underline;">Điểm nổi bật</span>
					<p > <?php echo $row_product_detail['MO_TA'] ?> </p>
				</div>	
				<div class="table-guidesize">
						<button class="select-size btn btn-outline-success"  onclick="document.getElementById('table-size').style.display='block'" style="width:auto;font-weight: bold;">Bảng Hướng Dẫn Chọn Size</button>
					
				</div>
				<form id="detailForm">
                    <div class="btn-size_chitiet">
                            <h4 class="ega-swatch__heading font-weight-bold">KÍCH THƯỚC</h4>
                            <div class="size-chitiet">
                           
                            <?php
                            while($array_Size=mysqli_fetch_array($resultTbSize)){
                                $size=$array_Size['KICH_THUOC']
                            ?>
                            <button type="button" <?php echo $disableSize["$size"] ?> class="btn-chitiet btn-outline-dark" id="btSize<?php echo $size ?>_detail" onclick="changeFocus(this); selectSize(this)" value="<?php echo $size ?>" >
                                <?php  echo $array_Size['KICH_THUOC']?>
                            </button>
                            <?php } ?>
                                
                            </div>
                        </div>
                    <div class="qty-chitiet">
                        <label class="qty-name font-weight-bold">SỐ LƯỢNG: </label>
                        <div  class="buttons_added">
                            <input style="cursor: pointer;" class="minus is-form" type="button" value="-" onclick="adjustQuanlity(this)">
                            <input aria-label="quantity" id="txQuanlity_detail" class="input-qty" min="1" max="20" name="" type="number" value="1" onchange="validateQuanlity(this)">
                            <input style="cursor: pointer;" class="plus is-form" type="button" value="+" onclick="adjustQuanlity(this)">
                        </div>
                    </div>
                </form>
				<div class=" button-chitiet row">
					<button type="button" <?php echo $disable ?> class="btn btn-outline-primary col-md-4  col-sm-12" value="add" style="float: left;" onclick="checkQuanlity()"><a  style="    font-weight: bold;text-decoration: none;color: #3B0B39"> Thêm Vào Giỏ Hàng</a> </button>
					<button type="button" <?php echo $disable ?> class="btn btn-outline-warning col-md-4 col-sm-12 ml-4" value="buy" onclick="checkQuanlity()"><a  style="    font-weight: bold;text-decoration: none;color: #3B0B39">Mua Ngay</a> </button>
				</div>
                        </br></br>
                <span class="sold-out" ><?php echo $notification ?> </span>
                
			</div> 
				
			 
		</div>
		<div class="table-size" id="table-size" style="display: none;">
			<div  class="table-size-content table-responsive-lg">
				<span onclick="document.getElementById('table-size').style.display='none'" class=" close-table-size" title="Đóng">&times;</span>
				<h4>BẢNG HƯỚNG DẪN CHỌN SIZE</h4>
		
			<table class="table table-bordered ">
				
			  <tr class="header" >
				<th>Kích Thước</th>
                <th>S</th>
                <th>M</th>
                <th>L</th>
                <th>XL</th>
			  </tr>
				
				<tbody>
			  <tr>
				<td>Chiều cao(cm)</td>
				<td>150-155</td>
				<td>155-163</td>
				<td>160-165</td>
				<td>162-166</td>
			  </tr>
			  <tr>
				<td>Cân nặng(kg)</td>
				<td>41-46 </td>
				<td>47-52 </td>
				<td>53-58 </td>
				<td>59-64 </td>
			  </tr>
			  <tr>
				<td>Vòng ngực(cm)</td>
				<td>79-82</td>
				<td>82-87</td>
				<td>88-94</td>
				<td>94-99</td>
			  </tr>
			  <tr>
				<td>Vòng mông(cm)</td>
				<td>88-90</td>
				<td>90-94</td>
				<td>94-98</td>
				<td>98-102</td>
			  </tr>
				</tbody>
				  </table>
				  <br>
			</div>
		</div>			
	</div>