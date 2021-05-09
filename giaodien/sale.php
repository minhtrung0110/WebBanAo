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
    //Lấy tất cả sản phẩm trong sale
    if(!isset($_GET['type']) && empty($_GET['type'])){
    $query1=" SELECT od.MA_CTGG,p.MA_SP,ctgg.PHAN_TRAM_GIAM_GIA,p.TEN_SP,p.HINH_ANH_URL,p.DON_GIA from sanpham as p inner join chitietgiamgia as od INNER JOIN chuongtrinhgiamgia as ctgg on p.MA_SP = od.MA_SP and ctgg.MA_CTGG=od.MA_CTGG  GROUP BY p.TEN_SP ORDER BY od.MA_CTGG ASC "; 
   
    }else if(isset($_GET['type'])){
        $id_CTGG=$_GET['type'];
        $query1=" SELECT od.MA_CTGG,p.MA_SP,ctgg.PHAN_TRAM_GIAM_GIA,p.TEN_SP,p.HINH_ANH_URL,p.DON_GIA from sanpham as p inner join chitietgiamgia as od INNER JOIN chuongtrinhgiamgia as ctgg on p.MA_SP = od.MA_SP and ctgg.MA_CTGG=od.MA_CTGG WHERE ctgg.MA_CTGG='$id_CTGG' GROUP BY p.TEN_SP ORDER BY od.MA_CTGG ASC "; 
    }
    $result =mysqli_query($connect,$query1);
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
    	<script>
			getresult("giaodien/getresult_sale.php<?php 
				$check=isset($_GET['type']);
				if($check){
					$type=$_GET['type'];
					echo "?type=$type";
				}
			?>");
		</script>
        <div id="pagination-result" class="col-md-12 col-sm-12 row product">
                <input type="hidden" name="rowcount" id="rowcount" /> 
        </div>
	</div>	
    
