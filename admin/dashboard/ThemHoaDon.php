

<form action="ThemHoaDon.php" method="get">

    <div id="dangki">
        <div style=" width: 500px;height:50px;text-align: center; ">
            <label>Thêm Hóa Đơn</label>
        </div>
        <div >
  	        <p>Mã Hóa Đơn</p>
  	        <input type="text" name="mhd" placeholder="Nhập Mã Hóa Đơn . . ." >
            <span style="color: red;position: absolute;left: 20px;top: 175px" id="errmssv"></span>
        </div>
        <div>
  	        <p>Mã Nhân Viên</p>
            <select name="manv">
                <option value="">--Chọn--</option>
                <?php
                    $option='';
                    $con = mysqli_connect("localhost", "root", "", "doanweb2");
                    $sql = "SELECT MA_NV from nhanvien";
                    mysqli_query($con, "SET NAMES 'utf8");
                    $result = mysqli_query($con, $sql);
                    if ($result->num_rows > 0) {
                        // output dữ liệu trên trang
                        while ($row = $result->fetch_assoc()) {
                        $option .= '<option value="'.$row["MA_NV"].'">'.$row["MA_NV"].'</option>';
                        }
                    }
                    echo $option;
                    mysqli_close($con);
                ?>
            </select>
	    </div>
        <div>
  	        <p>Mã Khách Hàng</p>
                <select name="makh">
                <option value="">--Chọn--</option>
                <?php
                    $option='';
                    $con = mysqli_connect("localhost", "root", "", "doanweb2");
                    $sql = "SELECT MA_KH from khachhang";
                    mysqli_query($con, "SET NAMES 'utf8");
                    $result = mysqli_query($con, $sql);
                    if ($result->num_rows > 0) {
                        // output dữ liệu trên trang
                        while ($row = $result->fetch_assoc()) {
                        $option .= '<option value="'.$row["MA_KH"].'">'.$row["MA_KH"].'</option>';
                        }
                    }
                    echo $option;
                    mysqli_close($con);
                ?>
                </select>
	    </div>
        <div>
  	        <p>Mã Giảm Giá</p>
            <input type="text" name="mgg" placeholder="Nhập Mã giảm giá. . .">
	    </div>
	    <div>
  	        <p>Địa Chỉ</p>
            <input type="text" name="dc" placeholder="Nhập địa chỉ . . .">
	    </div>
        <div>
  	        <p>Tình Trạng</p>
            <input type="text" name="tt" placeholder="-1: chưa xử lý; 0: đang xử lý; 1: đã xử lý...">
	    </div>
        <div>
  	        <p>Tiền Giảm GIá</p>
            <input type="text" name="tgg" placeholder="Nhập tiền giảm giá...">
	    </div>
        <div>
  	        <p>Tổng Tiền</p>
            <input type="text" readonly="true" name="tongtien" value="0">
	    </div>
        <div>
  	        <p>Ngày Lập</p>
            <input type="datetime-local" name="ngaylap" id="phone" placeholder="Nhập theo dạng: YYYY-MM-DD hh:mm:ss">
	    </div>
        <div>
            <input type="submit" name="" id="bt1" value="Thêm">
            <input type="button" value="Đóng" id="bt2" onclick=dongthemhoadon()>
        </div>
    </div>  
</form>
<script>
    function dongthemhoadon(){
        document.getElementById("dangki").style.display = "none";
    }
</script>
<?php
    $con = mysqli_connect("localhost", "root", "", "doanweb2");
    if(isset($_GET['mhd']) && isset($_GET['manv']) && isset($_GET['makh']) && isset($_GET['mgg']) && 
    isset($_GET['dc']) && isset($_GET['tt']) && isset($_GET['tgg']) && 
    isset($_GET['tongtien']) && isset($_GET['ngaylap'])){
        $MAHD=$_GET['mhd'];
        $MANV=$_GET['manv'];
        $MKH=$_GET['makh'];
        $MGG=$_GET['mgg'];
        $DC=$_GET['dc'];
        $TT=$_GET['tt'];
        $TGG=$_GET['tgg'];
        $TONG=$_GET['tongtien'];
        $NGAY=$_GET['ngaylap'];
        $con -> set_charset("utf8");
        mysqli_query($con, "SET NAMES 'utf8");
        $sql="INSERT INTO hoadon(MA_HD,MA_NV,MA_KH,MA_MGG,DIA_CHI,TINH_TRANG,TIEN_GIAM_GIA,TONG_TIEN,NGAY_LAP)
             VALUE('$MAHD','$MANV','$MKH','$MGG','$DC','$TT','$TGG','$TONG','$NGAY')";
        mysqli_query($con, $sql);
        header('location: index.php?manage=orders');
    }
?>
<style>
#dangki {
    display: block;
    width: 500px;
    height: 600px;
    position: absolute;
    top: 20px;
    left: 35%;
    color: #73879C;
    background: rgb(230, 228, 228);
    z-index: 500;
    overflow-y: auto;
}
#dangki label{
    font-size: 30px;
}
#dangki input
{
    border-radius: 5px;
    width: 450px;
    height: 40px;
    border: solid 2px;
}
#dangki input:active{
    border: solid 2px red;
}
#dangki div{
padding-left: 20px;
padding-bottom: 10px;
}
#bt1{
    margin-top: 30px;
    color: white;
    cursor: pointer;
    width: 450px;
    height: 40px;
    background-color:red; 
    text-align:center;
}
#bt1:hover{
    opacity: 0.7;
    border:ridge 1px #00BFFF;
}

#dangki p{
    font-size: 20px;
}
</style>