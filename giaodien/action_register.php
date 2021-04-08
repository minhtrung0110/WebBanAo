<?php
        
     function register() { 
         if(!empty($_POST)){
            $username =$_POST['username'];
            $password =$_POST['password'];
            $email =$_POST['email'];
         
        $connect =new mysqli("localhost","root","","threeclothing");
        $connect -> set_charset("utf8");
        //kiem tra ket noi
        if($connect->connect_error){
            var_dump($connect->connect_error);
            die();
        }

        //thuc hien truy van du lieu - chen du lieu vao database 2 bang taikhoan va khachhang
        $query="INSERT INTO taikhoan (EMAIL,TEN_DANG_NHAP,MAT_KHAU)
                VALUES('".$email."','".$username."','".$password."')";
        $checkemail="SELECT EMAIL from taikhoan WHERE EMAIL='".$email."' '";

       
        echo $query;
        $data=array();
        $data= mysqli_fetch_array(mysqli_query($connect,$checkemail));
         if($data == null){
             mysqli_query($connect,$query);
   // header("Location: giaodien/login.php");
         }
         else {
            echo "email đã tồn tại !! vui lòng chọn email khác";
            /// bắt sự kiện JS hiện thông báo như thế nào  ???

         }


        //dong kêt nối
         $connect->close();        
        }
    }
    register();
   
?>