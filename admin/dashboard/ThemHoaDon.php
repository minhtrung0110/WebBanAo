

<form action="ThemHoaDon.php" method="get" id='dangki' >
    <div id="themhoadon">
        <div style="width: 500px;height:50px;text-align: center;line-height: 50px; ">
            <label>Thêm Hóa Đơn</label>
        </div>
        <div class="form-group" >
  	        <input type="hidden" name="mhd" id='mahd' placeholder="Nhập Mã Hóa Đơn . . ." >
            
        </div>
        <div class="form-group" >
  	        <label>Mã Nhân Viên</label>
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
            <span class="form-message" style="color:red"></span>
        </div>
        <div class="form-group" >
  	        <label>Mã Khách Hàng</label>
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
                <span class="form-message" style="color:red"></span>
        </div>
        <div class="form-group" >
  	        <label>Mã Giảm Giá</label>
            <input type="text" name="mgg" id='magg' placeholder="Nhập Mã giảm giá. . .">
            <span class="form-message" style="color:red"></span>
        </div>
	    <div class="form-group" >
  	        <label>Địa Chỉ</label>
            <input type="text" name="dc" id='diachi' placeholder="Nhập địa chỉ . . .">
            <span class="form-message" style="color:red"></span>
        </div>
        <div class="form-group" >
  	        <label>Tình Trạng</label>
            <input type="text" name="tt" id='tinhtrang' placeholder="-1: chưa xử lý; 0: đang xử lý; 1: đã xử lý...">
            <span class="form-message" style="color:red"></span>
        </div>
        <div class="form-group" >
  	        <p>Tiền Giảm GIá</p>
            <input type="text" name="tgg" id='tiengiamgia' placeholder="Nhập tiền giảm giá...">
            <span class="form-message" style="color:red"></span>
        </div>
        <div class="form-group" >
  	        <label>Tổng Tiền</label>
            <input type="text" readonly="true" id='tongtien' name="tongtien" value="0">
            <span class="form-message" style="color:red"></span>
        </div>
        <div class="form-group" >
  	        <label>Ngày Lập</label>
            <input type="datetime-local" name="ngaylap" id="ngaylap" placeholder="Nhập theo dạng: YYYY-MM-DD hh:mm:ss">
            <span class="form-message" style="color:red"></span>
        </div>
        <div class="form-group" >
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
        $sql="INSERT INTO hoadon(MA_NV,MA_KH,MA_MGG,DIA_CHI,TINH_TRANG,TIEN_GIAM_GIA,TONG_TIEN,NGAY_LAP)
             VALUE('$MANV','$MKH','$MGG','$DC','$TT','$TGG','$TONG','$NGAY')";
             echo $sql;
        mysqli_query($con, $sql);
        header('location: index.php?manage=orders');
    }
?>
<script>
      document.addEventListener('DOMContentLoaded', function () {
        Validator({
          form: '#dangki',
          formGroupSelector: '.form-group',
          errorSelector: '.form-message',
          rules: [
         
           Validator.isRequired('#tiengiamgia'),
           Validator.isRequired('#diachi'),
           Validator.isRequired('#tinhtrang'),
           Validator.isRequired('#ngaylap'),
           Validator.isRequired('#tongtien'),
            Validator.isNumber('#tongtien'),
            Validator.isNumber('#tiengiamgia'),
          ],
        });
      });

    
</script>

<style>
#themhoadon {
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
#themhoadon label{
    font-size: 30px;
}
#themhoadon input
{
    border-radius: 5px;
    width: 450px;
    height: 40px;
    border: solid 2px;
}
#themhoadon input:active{
    border: solid 2px red;
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
#themhoadon div{
padding-left: 20px;
padding-bottom: 10px;
}
#themhoadon p{
    font-size: 20px;
}
</style>