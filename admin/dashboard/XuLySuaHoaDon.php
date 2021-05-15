<?php
    $con = mysqli_connect("localhost", "root", "", "doanweb2");
    if(isset($_GET['mahd']) && isset($_GET['manv']) && isset($_GET['makh']) && isset($_GET['mgg']) && 
        isset($_GET['dc']) && isset($_GET['tt']) && isset($_GET['tgg']) && isset($_GET['ngaylap'])){
        $MAHD=$_GET['mahd'];
        $MANV=$_GET['manv'];
        $MKH=$_GET['makh'];
        $MGG=$_GET['mgg'];
        $DC=$_GET['dc'];
        $TT=$_GET['tt'];
        $TGG=$_GET['tgg'];
        $NGAY=$_GET['ngaylap'];
        $con -> set_charset("utf8");
        mysqli_query($con, "SET NAMES 'utf8");
        $sql="UPDATE hoadon SET MA_NV = '$MANV', MA_KH = '$MKH',MA_MGG='$MGG',
                    DIA_CHI='$DC',TINH_TRANG='$TT',TIEN_GIAM_GIA='$TGG',NGAY_LAP='$NGAY'
                WHERE MA_HD = '$MAHD'";
        mysqli_query($con, $sql);
        echo $sql;
    }
    header('location: index.php?manage=orders&');
?>