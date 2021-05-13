

<form action="XuLySuaHoaDon.php" method="get">

    <div id="dangki">
        <div style="width: 500px;height:50px;text-align: center; ">
            <label>Sửa Hóa Đơn</label>
        </div>
        <div>
            <p>Mã Hóa Đơn</p>
            <input type="text" readonly="true" name="mahd" value="<?php 
                    $MAHD=$_GET['mahd'];
                    echo $MAHD;
                ?>">
        </div>
        <div>
          <p>Mã Nhân Viên<span style="color: red"></p>
            <select name="manv">
                <option value="<?php 
                    $MANV=$_GET['manv'];
                    echo $MANV;
                ?>"><?php 
                    $MANV=$_GET['manv'];
                    echo $MANV;
                ?> </option>
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
                ?>
            </select>
        </div>
        <div>
          <p>Mã Khách Hàng</p>
            <select name="makh">
                <option value="<?php 
                    $MAKH=$_GET['makh'];
                    echo $MAKH;
                ?>"><?php 
                    $MAKH=$_GET['makh'];
                    echo $MAKH;
                ?></option>
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
                ?>
            </select>
        </div>
        <div>
            <p>Mã Giảm Giá</p>
            <input type="text" name="mgg" value="<?php 
                    $MAGG=$_GET['mgg'];
                    echo $MAGG;
                ?>">
        </div>
        <div>
            <p>Địa Chỉ</p>
            <input type="text" name="dc" value="<?php 
                    $DC=$_GET['dc'];
                    echo $DC;
                ?>">
        </div>
        <div>
            <p>Tình Trạng</p>
            <input type="text" name="tt" value="<?php 
                    $TT=$_GET['tt'];
                    echo $TT;
                ?>">
        </div>
        <div>
            <p>Tiền Giảm GIá</p>
            <input type="text" name="tgg" value="<?php 
                    $TGG=$_GET['tgg'];
                    echo $TGG;
                ?>">
        </div>
        <div>
            <p>Ngày Lập</p>
            <input type="text" name="ngaylap" id="phone" value="<?php 
                    $Nl=$_GET['ngaylap'];
                    echo $Nl;
                ?>">
        </div>
        <div>
            <input type="submit" name="" id="bt1" value="Sửa">
            <input type="button" value="Đóng" id="bt2" onclick=dongthemhoadon()>
        </div>
    </div>  
</form>

<script>
function dongthemhoadon(){
    document.getElementById("dangki").style.display = "none";
}
</script>

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
    overflow-x: auto;
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

