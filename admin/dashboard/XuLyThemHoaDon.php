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
        echo $sql;
        header('location: index.php?manage=orders');
    }
?>